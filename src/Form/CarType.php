<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-27
	 * Time: 21:26
	 */

	namespace App\Form;


	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;


	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\Form\Extension\Core\Type\DateType;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;

	use App\Entity\Color;
	use App\Entity\Model;
	use App\Entity\BodyType;
	use App\Entity\DriveType;
	use App\Entity\FuelType;
	use App\Entity\Transmission;

	class CarType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options){
			$builder
				->setMethod("GET")
				->add("vin", TextType::class)

				->add("modelId", EntityType::class,
					array(
						"class" => Model::class,
						"choice_label" => "model",
					))
				->add("bodyTypeId", EntityType::class,
					array(
						"class" => BodyType::class,
						"choice_label" => "bodyType",
					))
				->add("colorId", EntityType::class,
					array(
						"class" => Color::class,
						"choice_label" => "color",
					))
				->add("driveTypeId", EntityType::class,
					array(
						"class" => DriveType::class,
						"choice_label" => "driveType",
					))
				->add("fuelTypeId", EntityType::class,
					array(
						"class" => FuelType::class,
						"choice_label" => "fuelType",
					))
				->add("transmissionId", EntityType::class,
					array(
						"class" => Transmission::class,
						"choice_label" => "transmission",
					))

				->add("buildDate", DateType::class, array(
					'html5' => true,
					'widget' => 'choice',
					'format' => 'yyyy-MM-dd',
				))
				->add("modelYear", DateType::class, array(
					'html5' => true,
					'widget' => 'choice',
					'format' => 'yyyy-MM-dd',
				))
				->add('save', SubmitType::class, array('label' => 'Edit Car'))
				->getForm();


		}

		public function configureOptions(OptionsResolver $resolver)
		{
		}

	}