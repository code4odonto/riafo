<?php
namespace App\Policy;
    
use App\Model\Entity\Request;
use Authorization\IdentityInterface;
use Authorization\Policy\RequestPolicyInterface;
use Cake\Http\ServerRequest;

/**
 * Request policy
 */
class RequestPolicy implements RequestPolicyInterface
{
    /**
     * Method to check if the request can be accessed
     *
     * @param \Authorization\IdentityInterface|null Identity
     * @param \Cake\Http\ServerRequest $request Server Request
     * @return bool
     */
    public function canAccess($identity, ServerRequest $request)
    {
        if ($request->getParam('plugin') === 'DebugKit') {
            return true;
        }
        if ($request->getParam('controller') === 'Users'
        
            && ($request->getParam('action') === 'login'
            || $request->getParam('action') === 'logout'
            || $request->getParam('action') === 'error'
            || $request->getParam('action') === 'home'
            || $request->getParam('action') === 'forgotPassword'
            || $request->getParam('action') === 'resetPassword')
        ) {
            return true;
        }
        if (isset($identity)) {
            if ($identity->rol === 'alumno') {
                if ($request->getParam('controller') === 'MdlUser'

                    && ($request->getParam('action') === 'view')
                ) {
                    return true;
                }
            }
            if ($identity->rol === 'docente') {
                if ($request->getParam('controller') === 'MdlCourse'
                   || $request->getParam('controller') === 'MdlUser'
                   || $request->getParam('controller') === 'MdlGroups'
                    && ($request->getParam('action') === 'view'
                    || $request->getParam('action') === 'index')
                ) {
                    return true;
                }
            }
            if ($identity->rol === 'admin') {
                return true;
            }
        }
        return false;
    }
}
