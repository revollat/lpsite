<?php
namespace Lpimash\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Form\Extension\Core\Type;

class Contact extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('email', Type\EmailType::class, array(
                'label' => 'Votre adresse',
                'attr' => array(
                    'placeholder' => 'Ex : jeandupont@xyzmail.fr',
                    'class' => 'test'
                ),
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'le champ "email" ne doit par être vide'
                    )),
                    new Assert\Email(array(
                        'message' => 'L\'adresse email n\'est pas correcte'
                    ))
                )
            ))
            
            ->add('sujet', Type\ChoiceType::class, array(
                'choices'   => array(
                    'à propos du design du site'    => 'à propos du design du site',
                    'proposition de travail'        => 'proposition de travail',
                    'me passer le bonjour !'        => 'me passer le bonjour !',
                ),
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'Merci de choisir un sujet'
                    )),
                ),
            ))
            
            ->add('message', Type\TextareaType::class, array(
                'constraints' => array(
                    new Assert\NotBlank(array(
                        'message' => 'Merci de mettre un message'
                    )),
                ),
            ))
            
            ->add('valider', Type\SubmitType::class)
            ->getForm();

    }

}