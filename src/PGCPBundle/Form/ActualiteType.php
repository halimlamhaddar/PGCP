<?php

namespace PGCPBundle\Form;

use PGCPBundle\Entity\Actualite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActualiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class)
            ->add('contenu',TextareaType::class)
            ->add('date',DateTimeType::class)
            ->add('avis',ChoiceType::class,[
                'choices'=>[
                    'Etudiants'=> 'Etudiants',
                    'Professeurs'=> 'Professeurs',

                ]
            ])
            ->add('image', FileType::class, array('label' => 'Image (JPG,JPEG file)'))
            ->add('submit',SubmitType::class)
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Actualite::class,
        ));

    }

    public function getName()
    {
        return 'pgcpbundle_actualite_type';
    }
}
