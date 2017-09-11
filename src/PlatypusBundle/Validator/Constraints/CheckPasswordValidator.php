<?php

namespace PlatypusBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\HttpFoundation\RequestStack;

class CheckPasswordValidator extends ConstraintValidator {

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
        $route = $this->requestStack->getCurrentRequest()->attributes->get('_route');

        if ($route == 'platypus_register') {
            $this->validateRegister($constraint);
        }
        if ($route == 'platypus_adminuseredit') {
            $this->validateAdminEdit($constraint);
        }
    }

    public function validateAdminEdit($constraint) {
        $formEntries = $this->requestStack->getCurrentRequest()->request->all();
        $firstpassword = $formEntries["platypusbundle_user"]['plainPassword'];
        $secondpassword = $formEntries["platypusbundle_user"]['passwordConfirm'];

        if (!strlen($firstpassword) && !strlen($secondpassword)) {
            return;
        }
        if ($firstpassword != $secondpassword) {
            $this->context->addViolation($constraint->messageMatch);
            return;
        }

    }

    public function validateRegister($constraint) {
        $formEntries = $this->requestStack->getCurrentRequest()->request->all();
        $firstpassword = $formEntries["platypusbundle_user"]['plainPassword'];
        $secondpassword = $formEntries["platypusbundle_user"]['passwordConfirm'];

        /* echo "<pre>";
          //echo '$firstpassword '.strlen($firstpassword).'<br />';
          //echo '$secondpassword '.strlen($secondpassword).'<br />';
          echo rand();
          echo "</pre>"; */

        if (!strlen($firstpassword) && !strlen($secondpassword)) {
            $this->context->addViolation($constraint->emptyMessage);
            return;
        }
        if (!empty($firstpassword) && empty($secondpassword)) {
            $this->context->addViolation($constraint->messageRepeatPassword);
            return;
        }
        if ($firstpassword != $secondpassword) {
            $this->context->addViolation($constraint->messageMatch);
            return;
        }
        if (strlen($firstpassword) < 2 || strlen($secondpassword) < 2) {
            $this->context->addViolation($constraint->minMessage);
            return;
        }
        if (strlen($firstpassword) > 50 || strlen($secondpassword) > 50) {
            $this->context->addViolation($constraint->maxMessage);
            return;
        }
    }

}
