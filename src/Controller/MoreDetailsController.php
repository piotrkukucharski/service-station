<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-27
	 * Time: 13:45
	 */

	namespace App\Controller;

	use App\Entity\History;
	use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Form\Extension\Core\Type\DateType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Component\Routing\Annotation\Route;

	use Doctrine\ORM\EntityManagerInterface;

	use App\Entity\Car;
	use App\Entity\Client;



	class MoreDetailsController extends AbstractController
	{
		/**
		 * @Route("/client/{slug}",name="showMoreDetailClient")
		 */
		public function showMoreDetailClient(EntityManagerInterface $entityManager,$slug,Request $request){
			$repository = $entityManager->getRepository(Client::class);
			/** @var Client $entities */
			$entities=$repository->findOneBy(['id'=>$slug]);
			if (!$entities) {
				throw $this->createNotFoundException(sprintf('No Client for slug "%s"', $slug));
			}


			$history=new History();
			$history->setClient($entities);

			$formHistory=$this->createFormBuilder($history)
				->setMethod("GET")
				->add("car", EntityType::class,array(
					"class" => Car::class,
					"choice_label" => "vin",
					"choices"=>$entities->getCars(),
				))
				->add("description", TextType::class)
				->add("dateTime", DateType::class)
				->add('save', SubmitType::class, array('label' => 'Description'))
				->getForm();

			$formHistory->handleRequest($request);
			if(($formHistory->isSubmitted() && $formHistory->isValid())|| false
			){
				if ($formHistory->isSubmitted() && $formHistory->isValid()){
					$history=$formHistory->getData();
					$entityManager->persist($history);
					try {
						$entityManager->flush();

					} catch (UniqueConstraintViolationException $e) {
						var_dump($e->getMessage());
					} catch (\InvalidArgumentException $e) {
						var_dump($history);
					}
				}
				return $this->redirectToRoute('showMoreDetailClient',array('slug'=>$slug));
			}


			return $this->render("showMore/showMoreClient.html.twig",array(
				"formHistory"=>$formHistory->createView(),
				"entities"=>$entities,
				"phoneNumbers"=>$entities->getPhoneNumbers(),
				"cars"=>$entities->getCars(),
				"histories"=>$entities->getHistories(),
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