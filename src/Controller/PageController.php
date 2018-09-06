<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-21
	 * Time: 10:58
	 */

	namespace App\Controller;

	use Symfony\Component\Form\Extension\Core\Type\TextType;
	use Symfony\Component\Form\Extension\Core\Type\SubmitType;


	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\HttpFoundation\Response;

	class PageController extends AbstractController
	{
		public function homePage(){
			return $this->render("base.html.twig");
		}

		public function addPage(){
			return $this->render("add.html.twig");
		}

		public function showPage(){
			return$this->render("show.html.twig");
		}

	}