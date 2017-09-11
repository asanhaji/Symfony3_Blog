<?php

namespace PlatypusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Validator\Constraints\Length;

class AdminUserEdit extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('firstName', TextType::class, array('attr' => array(
                        'placeholder' => 'Write user\'s first name'),
                        'label_attr' => array('class' => 'edit_label')
                ))
                ->add('lastName', TextType::class, array('attr' => array(
                        'placeholder' => 'Write user\'s last name'),
                        'label_attr' => array('class' => 'edit_label')
                ))
                ->add('email', EmailType::class, array('attr' => array(
                        'placeholder' => 'Write user\'s email'),
                        'label_attr' => array('class' => 'edit_label')
                ))
                ->add('username', TextType::class, array('attr' => array(
                        'placeholder' => 'Write user\'s username'),
                        'label_attr' => array('class' => 'edit_label')
                ))
                ->add('roles', CollectionType::class, array(
                    'entry_type' => ChoiceType::class,
                    'label_attr' => array('class' => 'edit_label'),
                    'entry_options' => array(
                        'attr' => array('class' => 'form-control'),
                        'choices' => array(
                            'Blogger' => 'ROLE_BLOGGER',
                            'Admin' => 'ROLE_ADMIN',
                        ),
                        'label_attr' => array('class' => 'sr-only'),
                    ),
                ))
                 ->add('plainPassword', PasswordType::class, array('attr' => array(
                        'placeholder' => 'Write user\'s password', 'required' => false),
                    'required' => false,
                     'label' => 'password',
                    'label_attr' => array('class' => 'edit_label')
                ))
                ->add('passwordConfirm', PasswordType::class, array('attr' => array(
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
