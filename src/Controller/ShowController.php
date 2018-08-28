<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-23
	 * Time: 11:31
	 */

	namespace App\Controller;


	use Doctrine\ORM\EntityManagerInterface;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;


	use App\Entity\Color;
	use App\Entity\Make;
	use App\Entity\Model;
	use App\Entity\Car;
	use App\Entity\Client;

	class ShowController extends AbstractController
	{
		/**
		 * @Route("/show/color")
		 */
		public function showColor(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Color::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id','color'),
			));
		}

		/**
		 * @Route("/show/make")
		 */
		public function showMake(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Make::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id','make'),
			));
		}
		/**
		 * @Route("/show/model")
		 */
		public function showModel(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Model::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id','model'),
			));
		}
		/**
		 * @Route("/show/client")
		 */
		public function showClient(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Client::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('firstName','lastName',),
				'moreDetails'=>'showMoreDetailClient',

			));
		}

		/**
		 * @Route("/show/car")
		 */
		public function showCar(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Car::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id','vin','buildDate',
					'modelYear'),
			));
		}



	}