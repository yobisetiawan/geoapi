<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class BuildCountryJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:build-country-json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'build-country-json';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->buidlJsonFiles();
        $this->buidlProviceJsonFiles();
    }


    private function buidlJsonFiles()
    {
        $data = json_decode(Storage::disk('local')->get('countries_data.json'), true);
        $countries = [];
        foreach ($data as $key => $item) {
            $countries[] = [
                'id' => $key + 1,
                'name' => $item['name'],
                'iso3' => $item['iso3'],
            ];
        }

        Storage::disk('local')->put('countries/list.json', json_encode($countries, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    private function buidlProviceJsonFiles()
    {
        $province_id = 1;
        $city_id = 1;

        $countries = json_decode(Storage::disk('local')->get('countries_data.json'), true);

        foreach (($countries ?? []) as $country) {
            $provinces = [];
            foreach ($country['states'] as $key => $province) {
                $cities = [];
                if (isset($province['cities']) && is_array($province['cities'])) {
                    foreach ($province['cities'] as $city) {
                        $cities[] = [
                            'id' => $city_id++,
                            'name' => $city,
                        ];
                    }
                }
                $provinces[] = [
                    'id' => $province_id++,
                    'name' => $province['name'],
                    'cities' => $cities
                ];
            }

            Storage::disk('local')->put('provinces/list_' . $country['iso3'] . '_provinces.json', json_encode($provinces,  JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        }
    }
}
