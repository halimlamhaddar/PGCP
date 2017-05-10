<?php

namespace PGCPBundle\Form;

use PGCPBundle\Entity\Cours;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('intitule',TextType::class)
            ->add('description',TextareaType::class)
            ->add('objectifs',TextareaType::class)
            ->add('lien',FileType::class)
            ->add('submit',SubmitType::class,[
                'label'=>'Créer le cours'
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Cours::class,
        ));

    }

    public function getName()
    {
        return 'pgcpbundle_cours_type';
    }
}
