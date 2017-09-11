<?php

namespace PlatypusBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CheckPassword extends Constraint {

    public $messageMatch = "Passwords doesn't match";
    public $messageRepeatPassword = "Please repeat your password";
    public $emptyMessage = "Your password connot be empty";
    public $minMessage = "Your password must be at least 2 characters long";
    public $maxMessage = "Your password cannot be longer than 50 characters";

    public function validatedBy() {
        return 'validatorCheckPassword';
    }
    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }

}
