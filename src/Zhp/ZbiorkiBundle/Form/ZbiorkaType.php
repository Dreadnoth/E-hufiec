<?php
/**
 * Created by PhpStorm.
 * User: dreadnoth
 * Date: 02.09.17
 * Time: 15:58
 */

namespace Zhp\ZbiorkiBundle\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ZbiorkaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nazwa', TextType::class, array('label' => 'Nazwa'))
            ->add('czasTrwaniaOd', DateTimeType::class, array('label' => 'Zbiórka od'))
            ->add('czasTrwaniaDo', DateTimeType::class, array('label' => 'Zbiórka do'))
            ->add('jednostka', EntityType::class, array(
                'class' => 'ZhpBackendBundle:Jednostka',
                'choice_label' => 'nazwa'
            ))
            ->add('miejsce', TextareaType::class, array('label' => 'Miejsce przeprowadzenia zbiórki'))
            ->add('liczbaOsob', IntegerType::class, array('label' => 'Planowana ilość osób biorących udział w zbiórce'))
            ->add('operatorJakoOpiekun', CheckboxType::class, array('mapped' => false, 'required' => false,'label' => 'Jestem osobą odpowiedzialną za zbiórkę'))
            ->add('imieOsobyOdpowiedzialnej', TextType::class, array('mapped' => false, 'label' => 'Imię osoby odpowiedzialnej'))
            ->add('nazwiskoOsobyOdpowiedzialnej', TextType::class, array('mapped' => false, 'label' => 'Nazwisko osoby odpowiedzialnej'))
            ->add('telefonOsobyOdpowiedzialnej', TextType::class, array('mapped' => false, 'label' => 'Telefon osoby odpowiedzialnej'))
            ->add('uwagi', TextareaType::class, array('label' => 'Uwagi'))
            ->add('zapisz', SubmitType::class, array('label' => 'Zapisz'));
    }

}