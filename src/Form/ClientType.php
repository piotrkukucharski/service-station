<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-27
	 * Time: 21:55
	 */

	namespace App\Form;


	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;


	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;


	class ClientType extends AbstractType
	{
		public function buildForm(FormBuilderInterface $builder, array $options){
			$builder
				->setMethod("GET")
				->add("firstName", TextType::class)
				->add("lastName", TextType::class)
				->add('save', SubmitType::class, array('label' => 'Add Client'))
				->getForm();
		}

		public function configureOptions(OptionsResolver $resolver)
		{
		}

	}