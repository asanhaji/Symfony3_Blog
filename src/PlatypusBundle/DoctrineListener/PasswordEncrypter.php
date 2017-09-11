<?php

namespace PlatypusBundle\DoctrineListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;
use PlatypusBundle\Entity\User;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class PasswordEncrypter {

    private $encoderFactory;

    public function __construct(EncoderFactoryInterface $encoderFactory) {
        $this->encoderFactory = $encoderFactory;
    }

    public function prePersist(LifecycleEventArgs $args) {
        $user = $args->getEntity();

        if (!$user instanceof User || empty($user->getPlainPassword())) {
            return;
        }

        $encoder = $this->encoderFactory->getEncoder($user);
        $password = $encoder->encodePassword($user->getPlainPassword(), $user->getSalt());
        $user->setPassword($password);
    }

    public function postPersist(LifecycleEventArgs $args) {
        $user = $args->getEntity();
        if (!$user instanceof User) {
            return;
        }
        if (filter_var($user->getEmail(), FILTER_VALIDATE_EMAIL) === FALSE) {
            $args->getEntityManager()->remove($args->getEntity());
            $args->getEntityManager()->flush();
        }
    }

}
