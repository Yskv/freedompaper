<?php

namespace App\Form;

use App\Entity\Categoriy;
use App\Entity\Item;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => "Nom de l'item",
                'required' => true,
                'attr' => [
                    'placeholder' => "entrez le nom de l'item",
                ],    
            ])
            ->add('description', TextareaType::class, [
                'label' => "Description de l'item",
                'required' => false,
                'attr' => [
                    'placeholder' => "Vous pouvez ajouter une description",
                    "rows" => 4,
                ],
            ])
            ->add('Category', EntityType::class, [
                'label' => "Choisir la categorie",
                "placeholder" => "-- Choisir une catégorie --",
                "class" => Categoriy::class,
                "choice_label" => "title",
                "required" => true,
            ]);
            //DateTimeType
            //DateType
            //CheckboxType
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);
    }
}
