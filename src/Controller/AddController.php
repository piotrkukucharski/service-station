<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-21
	 * Time: 11:08
	 */

	namespace App\Controller;




	use App\Form\CarType;
	use App\Form\ClientType;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Bundle\FrameworkBundle\Controller\RedirectController;
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;

	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;

	use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
	use Symfony\Component\PropertyAccess\Exception\InvalidArgumentException;

	use App\Entity\Car;
	use App\Entity\Color;
	use App\Entity\Make;
	use App\Entity\Model;
	use App\Entity\Client;

	class AddController extends AbstractController
	{
		/**
		 * @Route("/add/color",name="addColor")
		 */
		public function addColor(Request $request)
		{

			$color = new Color();
			$form = $this->createFormBuilder($color)
				->setMethod("GET")
				->add("color", TextType::class)
				->add('save', SubmitType::class, array('label' => 'Add Color'))
				->getForm();

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$color = $form->getData();
				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($color);
				try {
					$entityManager->flush();
				} catch (UniqueConstraintViolationException $e) {
					var_dump($e->getMessage());
				}
				return $this->redirectToRoute('addColor');


			}
			return $this->render('form.html.twig', array(
				'form' => $form->createView(),
			));
		}

		/**
		 * @Route("/add/make",name="addMake")
		 */
		public function addMake(Request $request)
		{

			$make = new Make();
			$form = $this->createFormBuilder($make)
				->setMethod("GET")
				->add("make", TextType::class)
				->add('save', SubmitType::class, array('label' => 'Add Make'))
				->getForm();

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$make = $form->getData();
				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($make);
				try {
					$entityManager->flush();
				} catch (UniqueConstraintViolationException $e) {
					var_dump($e->getMessage());
				}
				return $this->redirectToRoute('addMake');
			}
			return $this->render('form.html.twig', array(
				'form' => $form->createView(),
			));
		}

		/**
		 * @Route("/add/model",name="addModel")
		 */
		public function addModel(Request $request)
		{
			$model = new Model();
			$form = $this->createFormBuilder($model)
				->setMethod("GET")
				->add('makeId', EntityType::class,
					array(
						"class" => Make::class,
						"choice_label" => "make",
					))
				->add("model", TextType::class)
				->add('save', SubmitType::class, array('label' => 'Add Model'))
				->getForm();

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$model = $form->getData();
				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($model);
				try {
					$entityManager->flush();
				} catch (UniqueConstraintViolationException $e) {
					var_dump($e->getMessage());
				} catch (InvalidArgumentException $e) {
					var_dump($model);
				}
				return $this->redirectToRoute('addModel');

			}
			return $this->render('form.html.twig', array(
				'form' => $form->createView(),
			));
		}

		/**
		 * @Route("/add/client",name="addClient")
		 */
		public function addClient(Request $request)
		{
			$client = new Client();
			$form = $this->createForm(ClientType::class,$client);

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$client = $form->getData();
				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($client);
				try {
					$entityManager->flush();
				} catch (UniqueConstraintViolationException $e) {
					var_dump($e->getMessage());
				} catch (InvalidArgumentException $e) {
					var_dump($client);
				}
				return $this->redirectToRoute('addClient');

			}
			return $this->render('form.html.twig', array(
				'form' => $form->createView(),
			));
		}

		/**
		 * @Route("/add/car",name="addCar")
		 */
		public function addCar(Request $request)
		{
			$car = new Car();
			$form = $this->createForm(CarType::class,$car);

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$car = $form->getData();
				$entityManager = $this->getDoctrine()->getManager();
				$entityManager->persist($car);
				try {
					$entityManager->flush();
				} catch (UniqueConstraintViolationException $e) {
					var_dump($e->getMessage());
				} catch (InvalidArgumentException $e) {
					var_dump($car);
				}
				return $this->redirectToRoute('addCar');


			}
			return $this->render('form.html.twig', array(
				'form' => $form->createView(),
			));
		}

		/**
		 * @Route("/add/owner",name="addOwner")
		 */
		public function addOwner(Request $request)
		{
			$form = $this->createFormBuilder()
				->setMethod("GET")
				->add("idClient", EntityType::class,array(
					"class" => Client::class,
					"choice_label" => "id",
				))
				->add("vin", EntityType::class,array(
					"class" => Car::class,
					"choice_label" => "vin",
				))
				->add('save', SubmitType::class, array('label' => 'Car for Owner'))
				->getForm();

			$form->handleRequest($request);
			if ($form->isSubmitted() && $form->isValid()) {
				$entityManager = $this->getDoctrine()->getManager();
				$client=$form->getData()['idClient'];
				$car=$form->getData()['idCar'];
				$client->addCar($car);
				$entityManager->persist($client);
				$entityManager->flush();

				return $this->redirectToRoute('addOwner');

			}
			return $this->render('form.html.twig', array(
				'form' => $form->createView(),
			));
		}



	}