<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Text;
use Cake\Utility\Security;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\Mailer\TransportFactory;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->allowUnauthenticated(['add', 'login', 'edit', 'forgotPassword', 'resetPassword']);
    }
    public function initialize() {
        parent::initialize();
    }
    public function login()
    {
        $this->viewBuilder()->setLayout('');
        
        $result = $this->Authentication->getResult();

        // regardless of POST or GET, redirect if user is logged in
        if ($result->isValid()) {
            $authService = $this->Authentication->getAuthenticationService();

            // Assuming you are using the `Password` identifier.
            if ($authService->identifiers()->get('Password')->needsPasswordRehash()) {
                // Rehash happens on save.
                $user = $this->Users->get($this->Authentication->getIdentityData('id'));
                $user->password = $this->request->getData('password');
                $this->Users->save($user);
            }
            // regardless of POST or GET, redirect if user is logged in
            
                $redirect = $this->request->getQuery(
                    'redirect',
                    ['controller' => 'Users', 'action' => 'home']
                );
                return $this->redirect($redirect);   
        }
        if ($this->request->is(['post']) && !$result->isValid()) {
            $this->Flash->error('Usuario y/o contraseña incorrecta.');
        }
    }
    public function forgotPassword()
    {
        $this->viewBuilder()->setLayout('');
        if ($this->request->is('post')) {
            if (!empty($this->request->getData())) {
                $email = $this->request->getData('email');
                $user = $this->Users->findByEmail($email)->first();
                if (!empty($user))
                {
                    $password = sha1(Text::uuid());
                    $password_token = Security::hash($password, 'sha256', true);
                    $hashval = sha1($user->dni . rand(0, 100));
                    $user->password_reset_token = $password_token;
                    $user->hashval = $hashval;
                    $reset_token_link = Router::url(['controller' => 'Users', 'action' => 'resetPassword'], TRUE) . '/' . $password_token . '#' . $hashval;
                    $emaildata = [$user->email, $reset_token_link];
                    TransportFactory::setConfig('gmail', [
                      'host' => 'ssl://smtp.gmail.com', //servidor smtp con encriptacion ssl
                      'port' => 465, //puerto de conexion
                      'username' => 'riafo2019@gmail.com', 
                      'password' => 'Sis26250591', //contrasena
                      
                      //Establecemos que vamos a utilizar el envio de correo por smtp
                      'className' => 'Smtp', 
                    ]); 
                    /*fin configuracion de smtp*/
                    
                    
                    /*enviando el correo*/
                    $correo = new Email(); //instancia de correo
                    $correo
                      ->setTransport('gmail') //nombre del configTrasnport que acabamos de configurar
                      ->setEmailFormat('html') //formato de correo
                      ->setTo($user->email) //correo para
                      ->setFrom('riafo2019@gmail.com') //correo de
                      ->setSubject('Gestionar contraseña RIAFO'); //asunto
                    if($correo->send($reset_token_link)) {
                        $this->Users->save($user);
                        $this->Flash->success("Se ha enviado un link a su correo. Verifique su casilla.");
                    }
                } else {
                    $this->Flash->error("El correo ingresado no se encuentra. Verifique el correo utilizado en Moodle.");
                }
            }
        }
    }

    public function resetPassword($token = null) {
        $this->viewBuilder()->setLayout('');
        if (!empty($token)) {

            $user = $this->Users->findByPasswordResetToken($token)->first();
            if ($user) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    debug($this->request->getData());
                    $user = $this->Users->patchEntity($user, $this->request->getData());
                    $hashval_new = sha1($user->username . rand(0, 100));
                    $user->password_reset_token = $hashval_new;
                    if ($this->Users->save($user)) {
                        $this->Flash->success("Contraseña restablecida con éxito");
                        return $this->redirect(['controller' => 'MdlCourse', 'action' => 'index']);
                    }
                }
            } else {
                $this->Flash->error('Expiro tu token.');
            }
        } else {
            $this->Flash->error('Error al reiniciar la contraseña.');
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function logout()
    {
        return $this->redirect($this->Authentication->logout());
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                // 'filename' => 'User_' . $id . '.pdf'
            ]
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function home () {

    }
    public function error() {
        
    }
}
