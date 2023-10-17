<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class TaskType extends AbstractType
{
    /**
     * Builds the form.
     *
     * @param FormBuilderInterface $formBuilder The form builder
     * @param array<string, mixed> $options     an array of options
     *
     * @phpcsSuppress SlevomatCodingStandard.Functions.UnusedParameter
     */
    public function buildForm(
        FormBuilderInterface $formBuilder,
        array $options
    ): void {
        $formBuilder
            ->add(
                'title',
                TextType::class,
                [
                    'label' => 'Title',
                    'required' => false,
                    'empty_data' => '',
                ]
            )
            ->add(
                'content',
                TextareaType::class,
                [
                    'label' => 'Content',
                    'required' => false,
                    'empty_data' => '',
                ]
            )
            // ->add('author') ===> must be the user authenticated
        ;
    }

    public function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver->setDefaults(
            ['data_class' => Task::class]
        );
    }
}
