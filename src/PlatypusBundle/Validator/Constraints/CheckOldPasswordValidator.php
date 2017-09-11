<?php

namespace PlatypusBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\HttpFoundation\RequestStack;

class CheckOldPasswordValidator extends ConstraintValidator {

    private $encoderFactory;
    private $requestStack;
    private $tokenStorage;

    /**
     * @InjectParams({
     *     "encoderFactory"  = @Inject("security.encoder_factory"),
     *     "securityContext" = @Inject("security.context")
     * })
     *
     * @param EncoderFactoryInterface  $encoderFactory
     * @param TokenStorage $tokenStorage
     */
    public function __construct(EncoderFactoryInterface $encoderFactory, TokenStorage $tokenStorage, RequestStack $requestStack) {
        $this->encoderFactory = $encoderFactory;
        $this->tokenStorage = $tokenStorage;
        $this->requestStack = $requestStack;
    }

    public function validate($value, Constraint $constraint) {
        if (empty($value))
            return;
        $currentUser = $this->tokenStorage->getToken()->getUser();
        $encoder = $this->encoderFactory->getEncoder($currentUser);
        $isValid = $encoder->isPasswordValid(
                $currentUser->getPassword(), $value, null
        );
        if (!$isValid) {
            $this->context->addViolation($constraint->message);
            return;
        }
        $formEntries = $this->requestStack->getCurrentRequest()->request->all();
        $firstpassword = $formEntries["platypusbundle_user"]['newPassword'];
        $secondpassword = $formEntries["platypusbundle_user"]['newPasswordConfirm'];
        if (empty($firstpassword) || empty($secondpassword)) {
            $this->context->addViolation($constraint->messageNewPassword);
        }
    }

}
