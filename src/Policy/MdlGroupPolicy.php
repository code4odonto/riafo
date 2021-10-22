<?php
namespace App\Policy;

use App\Model\Entity\MdlGroup;
use Authorization\IdentityInterface;
use Cake\Collection\Collection;

/**
 * MdlGroup policy
 */
class MdlGroupPolicy
{
    /**
     * Check if $user can create MdlGroup
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroup $mdlGroup
     * @return bool
     */
    public function canCreate(IdentityInterface $user, MdlGroup $mdlGroup)
    {
    }

    /**
     * Check if $user can update MdlGroup
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroup $mdlGroup
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, MdlGroup $mdlGroup)
    {
    }

    /**
     * Check if $user can delete MdlGroup
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroup $mdlGroup
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MdlGroup $mdlGroup)
    {
    }

    /**
     * Check if $user can view MdlGroup
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroup $mdlGroup
     * @return bool
     */
    public function canView(IdentityInterface $user, MdlGroup $mdlGroup)
    {
        if ($user->rol == 'admin') {
            return true;
        }
        $tiene = false;
        foreach($mdlGroup->mdl_user as $u) {
            if($u->id == $user->id) {
                $tiene = true;
            }
        }
        return $tiene;
    }
}
