<?php
namespace App\Policy;

use App\Model\Entity\MdlGroup;
use Authorization\IdentityInterface;

/**
 * MdlGroups policy
 */
class MdlGroupPolicy
{
    /**
     * Check if $user can create MdlGroups
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroups $mdlGroups
     * @return bool
     */
    public function canCreate(IdentityInterface $user, MdlGroup $mdlGroups)
    {
    }

    /**
     * Check if $user can update MdlGroups
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroups $mdlGroups
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, MdlGroups $mdlGroups)
    {
    }

    /**
     * Check if $user can delete MdlGroups
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroups $mdlGroups
     * @return bool
     */
    public function canDelete(IdentityInterface $user, MdlGroups $mdlGroups)
    {
    }

    /**
     * Check if $user can view MdlGroups
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\MdlGroups $mdlGroups
     * @return bool
     */
    public function canView(IdentityInterface $user, MdlGroups $mdlGroups)
    {
        $miembros = $mdlGroups->extract('mdl_user');
        debug($miembros);
        return $mdlGroups->id == $mdlGroups->id;
    }
}
