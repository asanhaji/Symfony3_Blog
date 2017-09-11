<?php

namespace PlatypusBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CheckNewPassword extends Constraint {

    public $messageOldPassword = "Please fill in your old password";
    public $messageMatchPassword = "Passwords doesn't match";

    public function validatedBy() {
        return 'validatorCheckNewPassword';
    }

}
