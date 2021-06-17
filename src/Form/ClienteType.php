<?php

namespace App\Form;

use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\NotNull;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, [
                'required' => false
                ,'constraints' => [
                    new NotBlank([
                        'message' => 'Preencha o campo nome'
                    ])
                ]
            ])
            ->add('dt_nasc', BirthdayType::class, [
                'label' => 'Data de Nascimento'
                ,'required' => false
                ,'format' => 'dd MM yyyy'
                ,'placeholder' => [
                    'year' => 'Ano', 'month' => 'Mês', 'day' => 'Dia',
                ]
                ,'years'  =>range(1970, 2020)
                ,'invalid_message' => 'Data está incorreta'
                ,'constraints' => [
                    new NotBlank(['message'=>'Preencha a data de nascimento'])
                ]
            ])
            ->add('sexo', ChoiceType::class, [
                'choices'  => [
                    '-' => null,
                    'Masculino' => 1,
                    'Feminino' => 2,
                ]
                ,'required' => false
                ,'constraints' => [
                    new NotBlank([
                        'message' => 'Preencha o campo sexo'
                    ])
                ]
            ])
            ->add('cep')
            ->add('rua')
            ->add('numero', IntegerType::class, [
                'label' => 'Número'
                ,'required' => false
            ])
            ->add('complemento')
            ->add('bairro')
            ->add('cidade')
            
            ->add('uf', ChoiceType::class, [
                'label' => 'Estado'
                ,'choices'  => [
                    '-' => null,
                    'AC' => 'AC'
                    ,'AL' => 'AL'
                    ,'AP' => 'AP'
                    ,'AM' => 'AM'
                    ,'BA' => 'BA'
                    ,'CE' => 'CE'
                    ,'DF' => 'DF'
                    ,'ES' => 'ES'
                    ,'GO' => 'GO'
                    ,'MA' => 'MA'
                    ,'MT' => 'MT'
                    ,'MS' => 'MS'
                    ,'MG' => 'MG'
                    ,'PA' => 'PA'
                    ,'PB' => 'PB'
                    ,'PR' => 'PR'
                    ,'PE' => 'PE'
                    ,'PI' => 'PI'
                    ,'RJ' => 'RJ'
                    ,'RN' => 'RN'
                    ,'RS' => 'RS'
                    ,'RO' => 'RO'
                    ,'RR' => 'RR'
                    ,'SC' => 'SC'
                    ,'SP' => 'SP'
                    ,'SE' => 'SE'
                    ,'TO' => 'TO'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
