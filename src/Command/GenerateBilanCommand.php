<?php

namespace App\Command;

use App\Service\BilanCityGenerator;
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
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
//            ->addArgument('fichier', InputArgument::REQUIRED, 'Fichier csv de Data')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $dates = [
            'dateExtract' => new \DateTime('2024-05-15'),
            'dateRetourMax' => new \DateTime('2024-05-01'),
        ];

        $bilanCity = $this->bilanCityGenerator->loadBilanCity('Bordeaux');
        $apiUrl = 'http://localhost:3000/';

        Gotenberg::save(
            Gotenberg::chromium($apiUrl)
                ->pdf()
                ->outputFilename('bilan'.$bilanCity->city)
                ->html(
                    Stream::string('content', $this->environment->render('bilan/index.html.twig', [
                        'data' => $bilanCity,
                    ])),
                )
            ,
            $this->parameterBag->get('kernel.project_dir').'/generate-bilan'
        );

//        $csv = $input->getArgument('fichier');
//        if (($handle = fopen($csv, "r")) !== FALSE) {
//            $header = fgetcsv($handle, 1000, ",");
//            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                $dataCombine = array_combine($header, $data);
//                Gotenberg::save(
//                    Gotenberg::chromium($apiUrl)
//                        ->pdf()
//                        ->outputFilename($dataCombine['cityName'])
//                        ->html(
//                            Stream::string('content', $this->environment->render('letter/index.html.twig', [
//                                'data' => array_merge(
//                                    $dates,
//                                    $dataCombine
//                                )
//                            ])),
//                        )
//                    ,
//                    $this->parameterBag->get('kernel.project_dir').'/generate-letter'
//                );
//            }
//        }

        return Command::SUCCESS;
    }
}
