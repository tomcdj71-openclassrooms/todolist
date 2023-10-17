<?php

declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class UserType extends AbstractType
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
        $this->addUsernameField($formBuilder);
        $this->addPasswordField($formBuilder);
        $this->addRolesField($formBuilder);
        $this->addEmailField($formBuilder);
    }

    private function addUsernameField(FormBuilderInterface $formBuilder): void
    {
        $formBuilder->add(
            'username',
            TextType::class,
            [
                'label' => "Nom d'utilisateur",
            ]
        );
    }

    private function addPasswordField(FormBuilderInterface $formBuilder): void
    {
        $formBuilder->add(
            'password',
            RepeatedType::class,
            [
                'type' => PasswordType::class,
                'invalid_message' => 'Les deux mots de passe doivent correspondre.',
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Tapez le mot de passe à nouveau'],
            ]
        );
    }

    private function addRolesField(FormBuilderInterface $formBuilder): void
    {
        $formBuilder->add(
            'roles',
            ChoiceType::class,
            [
                'choices' => [
                    'Utilisateur' => 'ROLE_USER',
                    'Administrateur' => 'ROLE_ADMIN',
                ],
                'label' => 'Choisissez un rôle',
                'required' => true,
                'multiple' => false,
            ]
        );
        $this->addRolesTransformer($formBuilder);
    }

    private function addEmailField(FormBuilderInterface $formBuilder): void
    {
        $formBuilder->add(
            'email',
            EmailType::class,
            [
                'label' => 'Adresse email',
            ]
        );
    }

    private function addRolesTransformer(FormBuilderInterface $formBuilder): void
    {
        $formBuilder->get('roles')
            ->addModelTransformer(
                new CallbackTransformer(
                    static function ($rolesArray) {
                        // Check if $rolesArray is null or not an array
                        // transforms $rolesArray to string
                        return null !== $rolesArray && is_array($rolesArray)
                            ?
                            ([] !== $rolesArray ? $rolesArray[0] : null)
                            :
                            null;
                    },
                    static function ($rolesString): array {
                        // Check if $rolesString is null and transform to array
                        return null !== $rolesString ? [$rolesString] : [];
                    }
                )
            );
    }
}
