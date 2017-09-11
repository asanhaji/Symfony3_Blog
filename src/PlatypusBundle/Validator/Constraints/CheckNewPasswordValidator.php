<?php

namespace PlatypusBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\HttpFoundation\RequestStack;

class CheckNewPasswordValidator extends ConstraintValidator {

    private $encoderFactory;
    private $tokenStorage;
    private $requestStack;

    /**
     * @InjectParams({
     *     "encoderFactory"  = @Inject("security.encoder_factory"),
     *     "securityContext" = @Inject("security.context")
     * })
     *
     * @param EncoderFactoryInterface  $encoderFactory
     * @param TokenStorage $tokenStorage
     */
    public function __construct(TokenStorage $tokenStorage, RequestStack $requestStack) {
        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack;
    }

    public function validate($value, Constraint $constraint) {
        if (empty($value))
            return;
        $currentUser = $this->tokenStorage->getToken()->getUser();
        $formEntries = $this->requestStack->getCurrentRequest()->request->all();
   
        $firstpassword = $formEntries["platypusbundle_user"]['newPassword'];
        $secondpassword = $formEntries["platypusbundle_user"]['newPasswordConfirm'];

        if($firstpassword != $secondpassword){
            $this->context->addViolation($constraint->messageMatchPassword);
            return;
        }
        if (empty($currentUser->getOldPassword()) || $currentUser->getOldPassword() == "") {
            $this->context->addViolation($constraint->messageOldPassword);
        }
    }
}
