<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-27
	 * Time: 18:57
	 */

	namespace App\Controller;


	use App\Form\CarType;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;
	use Symfony\Component\HttpFoundation\Request;




	use Doctrine\ORM\EntityManagerInterface;

	use App\Entity\Car;
	use App\Entity\Client;
	use App\Entity\Color;
	use App\Entity\Make;
	use App\Entity\Model;



	class editController extends AbstractController
	{
		/**
		 * @Route("/edit/car/{slug}",name="editCar")
		 */
		public function editCar(EntityManagerInterface $entityManager,$slug,Request $request){
			$repository = $entityManager->getRepository(Car::class);
			/** @var Client $entities */
			$entities=$repository->findOneBy(['id'=>$slug]);
			if (!$entities) {
				throw $this->createNotFoundException(sprintf('No Client for slug "%s"', $slug));
			}
			$form=$this->createForm(CarType::class,$entities);

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

			return $this->render('add.html.twig', array(
				'form' => $form->createView(),
			));
		}

		/**
		 * @Route("/edit/client/{slug}",name="editClient")
		 */
		public function editClient(EntityManagerInterface $entityManager,$slug,Request $request){
			return $this->render('add.html.twig', array(
				'form' => $form->createView(),
			));
		}
	}