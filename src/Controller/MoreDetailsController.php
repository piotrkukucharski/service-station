<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-27
	 * Time: 13:45
	 */

	namespace App\Controller;

	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;

	use Doctrine\ORM\EntityManagerInterface;

	use App\Entity\Car;
	use App\Entity\Client;



	class MoreDetailsController extends AbstractController
	{
		/**
		 * @Route("/client/{slug}",name="showMoreDetailClient")
		 */
		public function showMoreDetailClient(EntityManagerInterface $entityManager,$slug){
			$repository = $entityManager->getRepository(Client::class);
			/** @var Client $entities */
			$entities=$repository->findOneBy(['id'=>$slug]);
			if (!$entities) {
				throw $this->createNotFoundException(sprintf('No Client for slug "%s"', $slug));
			}
			return $this->render("showMore/showMoreClient.html.twig",array(
				"entities"=>$entities,
				"phoneNumbers"=>$entities->getPhoneNumbers(),
				"cars"=>$entities->getCars(),
				"moreDetails"=>"showMoreDetailCar",
				"edit"=>"editCar",
				"columnsCar"=>array(
					'vin'=>"vin",
					'modelId'=>"model",
					'driveTypeId'=>"driveType",
					'fuelTypeId'=>"fuelType",
					'transmissionId'=>"transmission",
					'colorId'=>"color",
					'buildDate'=>"buildDate",
					'modelYear'=>"modelYear",
				),
			));
		}


		/**
		 * @Route("/car/{slug}",name="showMoreDetailCar")
		 */
		public function showMoreDetailCar(EntityManagerInterface $entityManager,$slug){
			$repository = $entityManager->getRepository(Car::class);
			/** @var Car $entities */
			$entities=$repository->findOneBy(['id'=>$slug]);
			if (!$entities) {
				throw $this->createNotFoundException(sprintf('No Client for slug "%s"', $slug));
			}
			dump($entities);die();
		}
	}