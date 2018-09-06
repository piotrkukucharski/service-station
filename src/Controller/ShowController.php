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
		 * @Route("/show/make",name="showMake")
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
		 * @Route("/show/model",name="showModel")
		 */
		public function showModel(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Model::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id',array('makeId','make'),'model'),
			));
		}
		/**
		 * @Route("/show/client",name="showClient")
		 */
		public function showClient(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Client::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id','firstName','lastName',),
				'moreDetails'=>'showMoreDetailClient',

			));
		}

		/**
		 * @Route("/show/car",name="showCar")
		 */
		public function showCar(EntityManagerInterface $entityManager){
			$repository = $entityManager->getRepository(Car::class);
			$entities=$repository->findAll();
			return $this->render('show.html.twig', array(
				'entities'=>$entities,
				'columns'=>array('id',array("modelId","makeId","make"),array("modelId","model"),'vin','buildDate',
					'modelYear'),
				'moreDetails'=>'showMoreDetailCar',
			));
		}



	}