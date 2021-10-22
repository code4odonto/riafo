<?php
namespace App\Policy;

use App\Model\Entity\MdlCourse;
use Authorization\IdentityInterface;
use Authorization\Policy\BeforePolicyInterface;

/**
 * MdlCourse policy
 */
class MdlCoursePolicy implements BeforePolicyInterface
{
    public function canIndex(IdentityInterface $user)
    {
        if($user->rol == 'admin') {
            return true;
        }
    }
}
