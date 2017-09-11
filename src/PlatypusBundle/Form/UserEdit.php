<?php

namespace PlatypusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserEdit extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firstName', TextType::class, array('attr' => array(
                        'placeholder' => 'Write your first name'),
                    'label_attr' => array('class' => 'edit_label')
                ))
                ->add('lastName', TextType::class, array('attr' => array(
                        'placeholder' => 'Write your last name'),
                    'label_attr' => array('class' => 'edit_label')
                ))
                ->add('email', EmailType::class, array('attr' => array(
                        'placeholder' => 'Write your email'),
                    'label_attr' => array('class' => 'edit_label')
                ))
                ->add('username', TextType::class, array('attr' => array(
                        'placeholder' => 'Write your username'),
                    'label_attr' => array('class' => 'edit_label')
                ))
                ->add('oldPassword', PasswordType::class, array('attr' => array(
                        'placeholder' => 'Write your old password'),
                    'required' => false,
                    'label_attr' => array('class' => 'edit_label'),
                    'label_attr' => array('class' => 'sr-only')
                ))
                ->add('newPassword', PasswordType::class, array('attr' => array(
                        'placeholder' => 'Write your new password', 'required' => false),
                    'required' => false,
                    'label_attr' => array('class' => 'edit_label'),
                    'label_attr' => array('class' => 'sr-only')
                ))
                ->add('newPasswordConfirm', PasswordType::class, array('attr' => array(
                        'placeholder' => 'Confirm password', 'required' => false),
                    'required' => false,
                    'label_attr' => array('class' => 'edit_label'),
                    'label_attr' => array('class' => 'sr-only')
                ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'PlatypusBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'platypusbundle_user';
    }

}
