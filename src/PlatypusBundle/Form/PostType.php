<?php

namespace PlatypusBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostType extends AbstractType {

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('title', TextType::class, array('attr' => array(
                        'placeholder' => 'Write your title', 'maxlength'=>'255'),
                        'label_attr' => array('class' => 'sr-only')
                ))
                ->add('content', TextareaType::class, array('attr' => array(
                        'placeholder' => 'Write content (255 characters max)',
                        'rows' => '5','cols' => '5', 'maxlength'=>'255'),
                        'label_attr' => array('class' => 'sr-only'),
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'PlatypusBundle\Entity\Post'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix() {
        return 'platypusbundle_post';
    }

}
