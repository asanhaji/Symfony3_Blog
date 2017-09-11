<?php

namespace PlatypusBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CheckOldPassword extends Constraint {

    public $message = "Invalid password";
    public $messageNewPassword = "Please fill in a new password";

    public function validatedBy() {
        return 'validatorCheckOldPassword';
    }

}
