<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use Faker\Factory as Faker;
use App\Apartment;
use App\User;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $faker = Faker::create('it_IT');
        for ($i = 0; $i < 200 ; $i++) {

          $imgs = [
            'images/img_1.jpg',
            'images/img_2.jpg',
            'images/img_3.jpg',
            'images/img_4.jpg',
            'images/img_6.jpg',
            'images/img_7.jpg',
            'images/img_8.jpg',
            'images/img_9.jpg',
            'images/img_10.jpg',
            'images/img_11.jpg',
            'images/img_12.jpg'
          ];

          $titles = [
              'Appartamento di charme con patio',
              'The smallest apartment with the biggest view',
              'Tornabuoni panoramic apartment',
              'Oricellari luxury apartment',
              'Apartment city centre',
              'Loft panoramico con ascensore',
              'Luxury seafront studio',
              'Apt between city center and beach',
              'Splendida vista sul mare',
              'Terraced houses in a residence',
              'Modern and central apartment',
              'Bilocale fronte mare, panorama ineguagliabile',
              'Grazioso appartamento vista mare',
              'Studio flat with air conditioning',
              'Grazioso appartamento ben servito',
              'Relaxing and design apartment',
              'Nice studio flat'
          ];
          $cities = [
            'Roma', 'Firenze', 'Bologna', 'Milano', 'Rimini', 'Napoli', 'Palermo', 'Venezia', 'Siena', 'Terni', 'Perugia', 'Assisi'
          ];

          $descriptionHome = [
            'Appartamento di lusso, situato nel complesso Romana Playa, di fronte alla spiaggia. Dispone di 5 piscine, aree verdi, connessione internet simmetrica a 300 mbps in fibra ottica con Wi-Fi ad alta velocità, parcheggio e tutti i comfort e le strutture necessarie per una vacanza di lusso. Una grande zona barbecue, situata nel cortile di casa, può essere un luogo perfetto per il tempo della famiglia e degli amici. Il progetto offre spazio per sauna e palestra.',

            'Eccezionale attico di lusso sulla spiaggia in prima linea sul New Golden Mile, tra Puerto Banus ed Estepona. Un grandissimo sviluppo di residenze straordinariamente grandi di 3 e 4 camere da letto, proprio di fronte al Mar Mediterraneo. Lo sviluppo è già costruito. Con le finestre dal pavimento al soffitto e quelle che sembrano essere infinite terrazze, ognuno degli edifici è la definizione di lusso, divertimento e viste indimenticabili sul mare. Situato su una spiaggia di fronte a un terreno di quasi 20.000 m2, questo complesso ad alta sicurezza con accesso esclusivo alla spiaggia.',

            'Questa villa moderna di nuova costruzione si trova vicino al mare, a soli 100 m dalla spiaggia. Villa Alegria è costruita su un ampio terreno di 1 640 m² ed è composta da 5 camere da letto con bagno interno, ampio soggiorno e un ufficio. La sua caratteristica è una splendida piscina privata lunga 18 metri. Una grande zona barbecue, situata nel cortile di casa, può essere un luogo perfetto per il tempo della famiglia e degli amici. Il progetto offre spazio per sauna e palestra.',

            "Questa lussuosa villa in vendita in Sierra Blanca offre le migliori viste panoramiche sul mare. L'imponente villa è stata costruita secondo i più alti standard e utilizzando i migliori materiali e finiture italiani. Situato nella zona più prestigiosa di Marbella: la Sierra Blanca, dove la privacy, la sicurezza e lo splendido paesaggio sono le caratteristiche principali. L'incredibile proprietà è stata rinnovata nel 2014 secondo i più alti standard. All'interno della villa, c'è un meraviglioso ingresso con un'ampia scala che rivela il livello di lusso della proprietà.",

            'Questa moderna proprietà in vendita si trova a La Reserva de Alcuzcuz (Benahavis), nella parte occidentale di Marbella. La villa eccezionale offre grande privacy, alta qualità e standard di efficienza energetica e magnifiche viste panoramiche sul Mar Mediterraneo. Dispone di 5 camere da letto, 6 bagni (5 en-suite), 3 bagni per gli ospiti, cucina moderna completamente attrezzata con tutti gli elettrodomestici, aria condizionata, riscaldamento a pavimento in tutta la proprietà, ampie terrazze coperte e non coperte, piscina a sfioro, area cinema, bar dello sport, area giochi con tavolo da biliardo, palestra completamente attrezzata, zona benessere con sale per trattamenti, aree relax e bagno.'

          ];

        


          $newApartment = new Apartment;
          $newApartment->user_id= User::inRandomOrder()->first()->id;
          $newApartment->title = $titles[array_rand($titles)];
          $newApartment->description = $descriptionHome[array_rand($descriptionHome)];
          $newApartment->rooms = rand(1, 3);
          $newApartment->beds = rand(1, 3);
          $newApartment->bathroom = rand(1, 3);
          $newApartment->square_meters = rand(20, 500);
          $newApartment->lat = rand(4380, 4482) / 100;
          $newApartment->lon = rand(1040, 1220) / 100;
          $newApartment->address = $faker->address();
          $newApartment->city = $cities[array_rand($cities)];
          $newApartment->dist = rand(1, 20);
          $newApartment->main_img = $imgs[array_rand($imgs)];
          $newApartment->published = rand(0, 1);
          $newApartment->save();
        }
    }
}
