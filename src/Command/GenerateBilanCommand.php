<?php

namespace App\Command;

use App\Service\BilanCityGenerator;
use App\Service\ListCitiesFromCsv;
use Gotenberg\Gotenberg;
use Gotenberg\Stream;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Twig\Environment;

#[AsCommand(
    name: 'app:generate-bilan',
    description: 'Génère la série de bilan',
)]
class GenerateBilanCommand extends Command
{
    public function __construct(
        private Environment $environment,
        private ParameterBagInterface $parameterBag,
        private BilanCityGenerator $bilanCityGenerator,
        private ListCitiesFromCsv $listCitiesFromCsv,
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('city', InputArgument::OPTIONAL, 'ville à générer')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if ($input->getArgument('city')) {
            $city = $input->getArgument('city');
            $this->generatePDFOf($city);

            return Command::SUCCESS;
        }

        $cities = $this->listCitiesFromCsv->getCities();
        foreach ($cities as $city) {
            $io->info(sprintf('Génération de %s', $city));
            $this->generatePDFOf($city);
        }

        return Command::SUCCESS;
    }

    private function generatePDFOf(string $city): void
    {
        $apiUrl = 'http://localhost:3000/';

        $bilanCity = $this->bilanCityGenerator->loadBilanCity($city);
        Gotenberg::save(
            Gotenberg::chromium($apiUrl)
                ->pdf()
                ->outputFilename('bilan' . $bilanCity->city)
                ->html(
                    Stream::string('content', $this->environment->render('bilan/index.html.twig', [
                        'data' => $bilanCity,
                        'averages' => $this->bilanCityGenerator->getAverages(),
                    ])),
                )
            ,
            $this->parameterBag->get('kernel.project_dir') . '/generate-bilan'
        );
    }
}
