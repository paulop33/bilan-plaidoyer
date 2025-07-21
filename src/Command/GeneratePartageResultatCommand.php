<?php

namespace App\Command;

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
    name: 'app:generate-partage-resultat-letter',
    description: 'Génère la série de lettre pour le partage de résultat',
)]
class GeneratePartageResultatCommand extends Command
{
    private Environment $environment;
    private ParameterBagInterface $parameterBag;

    public function __construct(Environment $environment, ParameterBagInterface $parameterBag)
    {
        parent::__construct();
        $this->environment = $environment;
        $this->parameterBag = $parameterBag;
    }

    protected function configure(): void
    {
        $this
            ->addArgument('fichier', InputArgument::REQUIRED, 'Fichier csv de Data')
//            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $dates = [];

        $apiUrl = 'http://localhost:3000/';

        $csv = $input->getArgument('fichier');
        if (($handle = fopen($csv, "r")) !== FALSE) {
            $header = fgetcsv($handle, 1000, ",");
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $dataCombine = array_combine($header, $data);
                Gotenberg::save(
                    Gotenberg::chromium($apiUrl)
                        ->pdf()
                        ->outputFilename($dataCombine['cityName'])
                        ->html(
                            Stream::string('content', $this->environment->render('letter/partage.html.twig', [
                                'data' => array_merge(
                                    $dates,
                                    $dataCombine
                                )
                            ])),
                        )
                    ,
                    $this->parameterBag->get('kernel.project_dir').'/generate-letter-resultat/'
                );
            }
        }

        return Command::SUCCESS;
    }
}
