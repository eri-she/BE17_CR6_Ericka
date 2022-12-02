<?php
namespace App\Form;

use App\Entity\Name;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, ["attr"=>["placeholder"=>"Event Title", "class"=>"form-control mb-2"]])
            ->add('date', DateType::class,["attr"=>["class"=>"form-control mb-2"]])
            ->add('type', ChoiceType::class, [
    'choices'  => [
        'Musical' => "musical",
        'Opera' => "opera",
        'Ballet' => "ballet",
    ],"attr"=> ["class"=>"form-check"]])
            ->add('save', SubmitType::class, ["attr"=>["class"=>"btn btn-primary mt-2 mb-2"]])
        ;
    }
     public function configureOptions(OptionsResolver $resolver): void
  {
      $resolver->setDefaults([
          'data_class' => Name::class,
      ]);
  }
}