<?php
	/**
	 * Created by PhpStorm.
	 * User: Dell
	 * Date: 2018-08-28
	 * Time: 10:45
	 */

	namespace App\Command;

	use Symfony\Component\Console\Command\Command;

	use Doctrine\ORM\EntityManagerInterface;

	use Symfony\Component\Console\Input\InputInterface;
	use Symfony\Component\Console\Output\OutputInterface;
	use Symfony\Component\Console\Input\InputArgument;
	use Symfony\Component\Console\Helper\ProgressBar;

	use Faker\Factory;


	use App\Entity\Client;
	use App\Entity\Car;
	use App\Entity\PhoneNumber;
	use App\Entity\Color;
	use App\Entity\Model;
	use App\Entity\BodyType;
	use App\Entity\DriveType;
	use App\Entity\FuelType;
	use App\Entity\Transmission;
	use App\Entity\History;




	class CreateClientsCommand extends Command
	{
		private $em;
		private $faker;
		public function __construct(?string $name = null, EntityManagerInterface $em)
		{
			// best practices recommend to call the parent constructor first and
			// then set your own properties. That wouldn't work in this case
			// because configure() needs the properties set in this constructor


			parent::__construct($name);
			$this->em = $em;
			$this->faker = Factory::create("pl_PL");
		}

		public function configure()
		{
			$this
				// the name of the command (the part after "bin/console")
				->setName('app:create-FakeClients')

				// the short description shown while running "php bin/console list"
				->setDescription('Creates a new FakeClients.')

				// the full command description shown when running the command with
				// the "--help" option
				->setHelp('This command allows you to create a user...')

				->addArgument('howMany', InputArgument::REQUIRED, 'How Many new Fake Clients with car you want');
		}

		public function execute(InputInterface $input, OutputInterface $output)
		{
			$output->writeln([
				'FakeClient Creator',
				'==================',
				'',
			]);

			$progressBar = new ProgressBar($output, $input->getArgument('howMany'));
			$progressBar->setFormat('very_verbose');

			$progressBar->start();
			$i = 0;
			while ($i++ < $input->getArgument('howMany')) {
				$this->fakeClientGenerator();
				$progressBar->advance();
			}

			$progressBar->finish();
		}


		private function fakeClientGenerator(){
			$client = new Client();
			$client->setFirstName($this->faker->firstName);
			$client->setLastName($this->faker->lastName);
			$this->em->persist($client);

			$phone=new PhoneNumber();
			$phone->setNumber($this->faker->phoneNumber);
			$phone->setClientId($client);
			$this->em->persist($phone);

			while(rand(0,100)>95){
				$phone=new PhoneNumber();
				$phone->setNumber($this->faker->phoneNumber);
				$phone->setClientId($client);
				$this->em->persist($phone);
			}
			$this->em->persist($client);

			$car=$this->generateCar();
			$client->addCar($car);
			for($i=rand(1,20);$i>0;--$i){
				$this->generateHistory($client,$car);
			}
			while(rand(0,100)>85){
				$car=$this->generateCar();
				$client->addCar($car);
				for($i=rand(1,20);$i>0;--$i){
					$this->generateHistory($client,$car);
				}
			}
			$this->em->persist($client);
			$this->em->flush();
		}

		private function generateCar(){
			$car=new Car();
			$car->setVin(rand(pow(10,17),pow(10,18)-9));
			$car->setModelId($this->getModel());
			$car->setBodyTypeId($this->getBodyType());
			$car->setColorId($this->getColor());
			$car->setDriveTypeId($this->getDriveType());
			$car->setFuelTypeId($this->getFuelTyp());
			$car->setTransmissionId($this->getTransmission());
			$car->setBuildDate($this->faker->dateTime());
			$car->setModelYear($this->faker->dateTime());
			$this->em->persist($car);
			$this->em->flush();
			return $car;
		}

		private function generateHistory($client,$car){
			$history=new History();
			$history->setCar($car);
			$history->setClient($client);
			$history->setDateTime($this->faker->dateTime());
			$history->setDescription($this->faker->text(100));
			$this->em->persist($history);
			$this->em->flush();
		}

		private function getModel(){
			$randomNumber=rand(1,627);
			$repository = $this->em->getRepository(Model::class);
			$entities=$repository->find($randomNumber);
			return $entities;
		}

		private function getBodyType(){
			$randomNumber=rand(1,16);
			$repository = $this->em->getRepository(BodyType::class);
			$entities=$repository->find($randomNumber);
			return $entities;
		}

		private function getColor(){
			$randomNumber=rand(1,6);
			$repository = $this->em->getRepository(Color::class);
			$entities=$repository->find($randomNumber);
			return $entities;
		}

		private function getDriveType(){
			$randomNumber=rand(1,3);
			$repository = $this->em->getRepository(DriveType::class);
			$entities=$repository->find($randomNumber);
			return $entities;
		}

		private function getFuelTyp(){
			$randomNumber=rand(1,6);
			$repository = $this->em->getRepository(FuelType::class);
			$entities=$repository->find($randomNumber);
			return $entities;
		}

		private function getTransmission(){
			$randomNumber=rand(1,2);
			$repository = $this->em->getRepository(Transmission::class);
			$entities=$repository->find($randomNumber);
			return $entities;
		}

	}