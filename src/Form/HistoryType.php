<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-28
	 * Time: 20:13
	 */

	namespace App\Form;

	use App\Entity\Car;
	use App\Entity\Client;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;


	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\DateType;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;



	class HistoryType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options){
			$builder
				->setMethod("GET")
				->add("client", EntityType::class,
					array(
						"class" => Client::class,
						"choice_label" => "id",
					))
				->add("car", EntityType::class,
					array(
						"class" => Car::class,
						"choice_label" => "id",
					))
				->add("description", TextType::class)
				->add("dateTime", DateType::class)
				->add('save', SubmitType::class, array('label' => 'History'))
				->getForm();
		}

		public function configureOptions(OptionsResolver $resolver)
		{
		}


	}