<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.3.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App;

use Cake\Core\Configure;
use Cake\Core\Exception\MissingPluginException;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;
use Authentication\AuthenticationService;
use Authentication\AuthenticationServiceProviderInterface;
use Authentication\Middleware\AuthenticationMiddleware;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Cake\Routing\Router;
use Authorization\AuthorizationService;
use Authorization\AuthorizationServiceProviderInterface;
use Authorization\Middleware\AuthorizationMiddleware;
use Authorization\Middleware\RequestAuthorizationMiddleware;
use Authorization\Policy\OrmResolver;
use App\Policy\RequestPolicy;
use Authorization\Policy\MapResolver;
use Authorization\Policy\ResolverCollection;
use Cake\Http\ServerRequest;
use Authorization\Exception\ForbiddenException;


/**
 * Application setup class.
 *
 * This defines the bootstrapping logic and middleware layers you
 * want to use in your application.
 */
class Application extends BaseApplication implements AuthenticationServiceProviderInterface, AuthorizationServiceProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function bootstrap() 
    {
        

        $this->addPlugin('CakePdf', ['bootstrap' => true]);

        $this->addPlugin('Authentication');
        $this->addPlugin('Authorization');

        
        // Call parent to load bootstrap from files.
        parent::bootstrap();
        $this->addPlugin('Search');
        if (PHP_SAPI === 'cli') {
            try {
                $this->addPlugin('Bake');
            } catch (MissingPluginException $e) {
                // Do not halt if the plugin is missing
            }

            $this->addPlugin('Migrations');
        }
        Configure::write('CakePdf', [
            'engine' => [
                'className' => 'CakePdf.WkHtmlToPdf',
                'binary' => '/usr/local/bin/wkhtmltopdf',
                'options' => [
                    'print-media-type' => false,
                    'outline' => true,
                    'dpi' => 96
                ],
            ],
            'download' => false
        ]);
        /*
         * Only try to load DebugKit in development mode
         * Debug Kit should not be installed on a production system
         */
        if (Configure::read('debug')) {
            $this->addPlugin(\DebugKit\Plugin::class);
        }
    }

    /**
     * Returns a service provider instance.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param \Psr\Http\Message\ResponseInterface $response Response
     * @return \Authentication\AuthenticationServiceInterface
     */
    public function getAuthenticationService(ServerRequestInterface $request, ResponseInterface $response)
    {
        $service = new AuthenticationService();

        $fields = [
            'username' => 'dni',
            'password' => 'password'
        ];

        // Load identifiers
        $service->loadIdentifier('Authentication.Password', [
            'resolver' => [
                'className' => 'Authentication.Orm',
                'userModel' => 'Users'
            ],
            'fields' => [
                'username' => 'dni',
                'password' => 'password',
            ]
        ]);

        // Load the authenticators, you want session first
        $service->loadAuthenticator('Authentication.Session');
        $service->loadAuthenticator('Authentication.Form', [
            'fields' => $fields,
            'loginUrl' => Router::url(['_name' => 'login'])
        ]);

        return $service;
    }

    public function getAuthorizationService(ServerRequestInterface $request, ResponseInterface $response)
    {
        $resolver = new OrmResolver();
        $mapResolver = new MapResolver();
        $mapResolver->map(ServerRequest::class, RequestPolicy::class);
        return new AuthorizationService(new ResolverCollection([$resolver, $mapResolver]));
    }

    /**
     * Setup the middleware queue your application will use.
     *
     * @param \Cake\Http\MiddlewareQueue $middlewareQueue The middleware queue to setup.
     * @return \Cake\Http\MiddlewareQueue The updated middleware queue.
     */
    public function middleware($middlewareQueue)
    {
        $authentication = new AuthenticationMiddleware($this, [
            'unauthenticatedRedirect' => Router::url(['_name' => 'login']),
            'queryParam' => 'redirect',
        ]);

        // Add the middleware to the middleware queue
       
        $middlewareQueue
            // Catch any exceptions in the lower layers,
            // and make an error page/response
            ->add(new ErrorHandlerMiddleware(null, Configure::read('Error')))

            // Handle plugin/theme assets like CakePHP normally does.
            ->add(new AssetMiddleware([
                'cacheTime' => Configure::read('Asset.cacheTime')
            ]))

            // Add routing middleware.
            // Routes collection cache enabled by default, to disable route caching
            // pass null as cacheConfig, example: `new RoutingMiddleware($this)`
            // you might want to disable this cache in case your routing is extremely simple
            ->add(new RoutingMiddleware($this))
            // ->add(\Ajax\Middleware\AjaxMiddleware::class)
            // ->add(new AjaxMiddleware(['viewClass' => 'MyAjax']));
            ->add($authentication);

        $middlewareQueue->add(new AuthorizationMiddleware($this, [
            'unauthorizedHandler' => [
                'className' => 'Authorization.Redirect',
                'url' => Router::url(['controller' => 'Users', 'action' => 'error']),
                'queryParam' => 'CakeRedirect',
                'exceptions' => [
                    MissingIdentityException::class,
                    ForbiddenException::class,
                    
                ],
            ],
        ]));
        $middlewareQueue->add(new RequestAuthorizationMiddleware());     

        return $middlewareQueue;
    }
}
