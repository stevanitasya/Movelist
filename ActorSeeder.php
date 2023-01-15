<?php

namespace Database\Seeders;

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //The Matrix Resurrections
        DB::table('actors')->insert([
            'name' => 'Keanu Reeves',
            'image'=>'KeanuReeves.jpg',
            'biography' => 'Keanu Charles Reeves, was born September 2, 1964 in Beirut, Lebanon. Keanu is father was born in Hawaii, and Keanu is mother is originally from England.',
            'character_name' => 'Neo / Thomas Anderson',
            'popularity' => '85.4',
            'birthday' => '1964-09-2',
            'place_of_birth' => 'Beirut, Lebanon'
        ]);

        DB::table('actors')->insert([
            'name' => 'Carrie-Anne Moss',
            'image'=>'CarrieAnneMoss.jpg',
            'biography' => 'Carrie-Anne Moss was born and raised in Vancouver, Canada. Once in LA, Carrie-Anne was cast in other series regular opportunities like Matrix, and then Aaron Spelling is Models Inc.',
            'character_name' => 'Trinity / Tiffany',
            'popularity' => '88.4',
            'birthday' => '1967-08-21',
            'place_of_birth' => 'Vancouver, British Columbia, Canada'
        ]);

        //Venom: Let There Be Carnage
        DB::table('actors')->insert([
            'name' => 'Tom Hardy',
            'image'=>'TomHardy.jpg',
            'biography' => 'Edward Thomas Hardy was born on September 15, 1977 in Hammersmith, London; his mother, Elizabeth Anne (Barrett), his father, Chips Hardy. After winning a modeling competition at age 21, he had a brief contract with the agency Models On',
            'character_name' => 'Eddie Brock / Venom',
            'popularity' => '90.2',
            'birthday' => '1977-09-15',
            'place_of_birth' => 'Hammersmith, London, England, UK'
        ]);

        DB::table('actors')->insert([
            'name' => 'Woody Harrelson',
            'image'=>'WoodyHarrelson.jpg',
            'biography' => 'Woodrow Tracy Harrelson was born on July 23, 1961 in Midland, Texas, to Diane Lou and Charles Harrelson. He had a brief stint in New York theater. He was soon cast as Woody on TV series Cheers (1982).',
            'character_name' => 'Cletus Kasady / Carnage',
            'popularity' => '87.7',
            'birthday' => '1961-07-23',
            'place_of_birth' => 'Midland, Texas, USA'
        ]);

        //Resident Evil: Welcome to Raccoon City
        DB::table('actors')->insert([
            'name' => 'Kaya Scodelario',
            'image'=>'KayaScodelario.jpg',
            'biography' => 'Kaya Rose Scodelario was born in Haywards Heath, Sussex, England, to Katia and Roger Humphrey. Her father was English and her mother is Brazilian, of Italian and Portuguese descent.',
            'character_name' => 'Claire Redfield',
            'popularity' => '83.5',
            'birthday' => '1992-03-13',
            'place_of_birth' => 'Holloway, London, England, UK'
        ]);

        //Encanto
        DB::table('actors')->insert([
            'name' => 'John Leguizamo',
            'image'=>'JohnLeguizamo.jpg',
            'biography' => 'John Alberto Leguizamo Peláez was born July 22, 1960, in Bogotá, Colombia, to Luz Marina Peláez and Alberto Rudolfo Leguizamo. He was a child when his family emigrated to the United States.',
            'character_name' => 'Bruno',
            'popularity' => '86.4',
            'birthday' => '1960-07-22',
            'place_of_birth' => 'Bogotá, Colombia'
        ]);

        DB::table('actors')->insert([
            'name' => 'María Cecilia Botero',
            'image'=>'MaríaCeciliaBotero.jpg',
            'biography' => 'María Cecilia Botero was born on 13 May 1955 in Medellín, Colombia. María Cecilia is an actor and producer, known for Encanto (2021), La Bruja (2011) and Nuevo rico, nuevo pobre (2007). María Cecilia was previously married to David Stivel.',
            'character_name' => 'Abuela Alma',
            'popularity' => '82.6',
            'birthday' => '1955-05-13',
            'place_of_birth' => 'Medellín, Colombia'
        ]);

        //Spider-Man: No Way Home
        DB::table('actors')->insert([
            'name' => 'Tom Holland',
            'image'=>'TomHolland.jpg',
            'biography' => 'Thomas Stanley Holland was born in Kingston-upon-Thames, Surrey, to Nicola Elizabeth, and Dominic Holland. After a successful eleven plus exam, he became a pupil at Wimbledon College. Having successfully completed his GCSEs.',
            'character_name' => 'Peter Parker / Spider-Man',
            'popularity' => '90.2',
            'birthday' => '1996-06-01',
            'place_of_birth' => 'Kingston upon Thames, England, UK'
        ]);

        DB::table('actors')->insert([
            'name' => 'Zendaya',
            'image'=>'Zendaya.jpg',
            'biography' => 'Zendaya is an American actress and singer born in Oakland, California. She made her film breakthrough in 2017, starring as Michelle "MJ" Jones in the Marvel Cinematic Universe superhero film Spider-Man: Homecoming (2017).',
            'character_name' => 'MJ',
            'popularity' => '90.4',
            'birthday' => '1996-09-1',
            'place_of_birth' => 'Oakland, California, USA'
        ]);

        DB::table('actors')->insert([
            'name' => 'Benedict Cumberbatch',
            'image'=>'BenedictCumberbatch.jpg',
            'biography' => 'Benedict Timothy Carlton Cumberbatch was born and raised in London, England. His parents, Wanda Ventham and Timothy Carlton, are both actors. He had an arts scholarship and painted large oil canvases.',
            'character_name' => 'Doctor Strange',
            'popularity' => '95.3',
            'birthday' => '1976-07-19',
            'place_of_birth' => 'Hammersmith, London, England, UK'
        ]);
    }
}
