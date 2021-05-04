<?php

namespace App\Form;

use App\Entity\LigneDuPagnier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneDuPagnierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantiter')
            ->add('prix_unitaire')
            ->add('id_panier')
            ->add('id_produit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneDuPagnier::class,
        ]);
    }
}
