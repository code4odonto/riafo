<?php
namespace App\Policy;

use App\Model\Entity\MdlUser;
use Authorization\IdentityInterface;

/**
 * MdlUser policy
 */
class MdlUserPolicy
{
    /**
     * Check if $user can create MdlUser
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlUser $mdlUser
     * @return bool
     */
    public function canCreate(IdentityInterface $user, MdlUser $mdlUser)
    {
    }

    /**
     * Check if $user can update MdlUser
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlUser $mdlUser
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, MdlUser $mdlUser)
    {
    }

    /**
     * Check if $user can delete MdlUser
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlUser $mdlUser
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MdlUser $mdlUser)
    {
    }

    /**
     * Check if $user can view MdlUser
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlUser $mdlUser
     * @return bool
     */
    public function canView(IdentityInterface $user, MdlUser $mdlUser)
    {
        if ($user->rol === 'admin') {
            return true;
        }
        return $user->id == $mdlUser->id;
    }
}
