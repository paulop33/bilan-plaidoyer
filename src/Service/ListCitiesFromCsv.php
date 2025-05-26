<?php

namespace App\Service;

use App\Model\BilanGlobalCity;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ListCitiesFromCsv
{
    const MOYENNE = 'Moyenne';
    const BAREME = 'Barème';

    public function __construct(
        #[Autowire('%kernel.project_dir%')] private string $kernelProjectDir,
    ) {
    }
    public function getCities(): array
    {
        $file = BilanGlobalCity::getCSVFile();
        $filename = $this->kernelProjectDir.'/csv-bilan/'.$file;
        if (!file_exists($filename)) {
            throw new \Exception("File $filename does not exist");
        }

        $resource = fopen($filename, 'r');
        $header = fgetcsv($resource);
        $cities = [];
        while (($data = fgetcsv($resource)) !== FALSE) {
            $dataCity = array_combine($header, $data);
            if (in_array($dataCity[BilanCityGenerator::VILLE_FIELD_CSV], [self::MOYENNE, self::BAREME, ''])) {
                continue;
            }
            $cities[] = $dataCity[BilanCityGenerator::VILLE_FIELD_CSV];
        }
        return $cities;
    }

}