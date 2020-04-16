<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'Wi-fi',
            'Posto macchina',
            'Piscina',
            'Portineria',
            'Sauna',
            'Vista mare'
        ];
        for ($i=0; $i < count($services); $i++) {

            $newService = new Service;
            $newService->name = $services[$i];
            $newService->save();

        }
    }
}
