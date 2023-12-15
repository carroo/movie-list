<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Character;
use App\Models\Genre;
use App\Models\Gr;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("password"),
            'image' => 'user.jpg',
            'phone' => '08123456789',
            'role' => 0
        ]);
        Movie::create([
            'title' => 'megan',
            'description' => "M3GAN is a marvel of artificial intelligence, a lifelike doll that's programmed to be a child's greatest companion and a parent's greatest ally. Designed by Gemma, a brilliant roboticist, M3GAN can listen, watch and learn as it plays the role of friend and teacher, playmate and protector. When Gemma becomes the unexpected caretaker of her 8-year-old niece, she decides to give the girl an M3GAN prototype, a decision that leads to unimaginable consequences.",
            'director' => 'Gerard Johnstone',
            'release_date' =>  date('Y-m-d',strtotime('04-01-2023')),
            'thumbnail' => 'megan.png',
            'background' => 'megan.png'
        ]);
        Movie::create([
            'title' => 'Black Panter',
            'description' => "Queen Ramonda, Shuri, M'Baku, Okoye and the Dora Milaje fight to protect their nation from intervening world powers in the wake of King T'Challa's death. As the Wakandans strive to embrace their next chapter, the heroes must band together with Nakia and Everett Ross to forge a new path for their beloved kingdom",
            'director' => 'Ryan Coogler',
            'release_date' => date('Y-m-d',strtotime('09-11-2022')),
            'thumbnail' => 'blackpanter.png',
            'background' => 'blackpanter.png'
        ]);
        Movie::create([
            'title' => 'Avatar the way of water',
            'description' => "Jake Sully and Ney'tiri have formed a family and are doing everything to stay together. However, they must leave their home and explore the regions of Pandora. When an ancient threat resurfaces, Jake must fight a difficult war against the humans.",
            'director' => 'James Cameron',
            'release_date' => date('Y-m-d',strtotime('14-12-2022')),
            'thumbnail' => 'avatar.png',
            'background' => 'avatar.png'
        ]);
        Movie::create([
            'title' => 'Puss in Boots: The Last Wish',
            'description' => "Puss in Boots discovers that his passion for adventure has taken its toll: he has burnt through eight of his nine lives. Puss sets out on an epic journey to find the mythical Last Wish and restore his nine lives.",
            'director' => 'Joel Crawford',
            'release_date' => date('Y-m-d',strtotime('28-12-2022')),
            'thumbnail' => 'pussinboots.png',
            'background' => 'pussinboots.png'
        ]);
        Movie::create([
            'title' => 'KKN di desa penari',
            'description' => "KKN di Desa Penari is a 2022 Indonesian horror film directed by Awi Suryadi, based on the viral story by SimpleMan, produced by MD Pictures and Pichouse Films. This film stars Tissa Biani, Adinda Thomas, and Achmad Megantara.",
            'director' => 'Awi Suryadi',
            'release_date' => date('Y-m-d',strtotime('30-04-2022')),
            'thumbnail' => 'kkn.png',
            'background' => 'kkn.png'
        ]);
        Gr::create([
            'genre' => 'Horror'
        ]);
        Gr::create([
            'genre' => 'Sci-fi'
        ]);
        Gr::create([
            'genre' => 'Action'
        ]);
        Gr::create([
            'genre' => 'Comedy'
        ]);
        Gr::create([
            'genre' => 'Thriller'
        ]);
        Gr::create([
            'genre' => 'Romance'
        ]);
        Gr::create([
            'genre' => 'Advanture'
        ]);
        Gr::create([
            'genre' => 'Drama'
        ]);
        Genre::create([
            'movie_id' => 1,
            'gr_id' => 1
        ]);
        Genre::create([
            'movie_id' => 1,
            'gr_id' => 2
        ]);
        Genre::create([
            'movie_id' => 2,
            'gr_id' => 3
        ]);
        Genre::create([
            'movie_id' => 3,
            'gr_id' => 7
        ]);
        Genre::create([
            'movie_id' => 4,
            'gr_id' => 7
        ]);
        Genre::create([
            'movie_id' => 5,
            'gr_id' => 1
        ]);
        Actor::create([
            'name' => 'Letitia Wright',
            'gender' => 'female',
            'biography' => "Letitia Michelle Wright is a Guyanese-British actress. She began her career with guest roles in the television series Top Boy, Coming Up, Chasing Shadows, Humans, Doctor Who, and Black Mirror. For the latter, she received a Primetime Emmy Award nomination",
            'dob' => '1993-10-31',
            'pob' => 'Georgetown, Guyana',
            'image' => '1.png',
            'popularity' => 12304
        ]);
        Actor::create([
            'name' => 'Tenoch Huerta',
            'gender' => 'male',
            'biography' => "José Tenoch Huerta Mejía is a Mexican actor. He has appeared in a number of movies in Latin America and Spain, starring in both feature films, short films, and Narcos: Mexico, credited as Tenoch Huerta. He is featured in Mónica Maristain's book, 30 Actors Made in Mexico",
            'dob' => '1981-01-29',
            'pob' => 'Ecatepec de Morelos, Mexico',
            'image' => '2.png',
            'popularity' => 18273
        ]);
        Actor::create([
            'name' => 'Sam Worthington',
            'gender' => 'male',
            'biography' => "Samuel Henry John Worthington is an Australian actor. He is best known for playing Jake Sully in the Avatar franchise, Marcus Wright in Terminator Salvation, and Perseus in Clash of the Titans and its sequel Wrath of the Titans",
            'dob' => '1976-08-02',
            'pob' => 'Godalming United Kingdom',
            'image' => '3.png',
            'popularity' => 1873
        ]);
        Actor::create([
            'name' => 'Antonio Banderas',
            'gender' => 'male',
            'biography' => "José Antonio Domínguez Bandera, known professionally as Antonio Banderas, is a Spanish actor and singe",
            'dob' => '1960-08-10',
            'pob' => 'Malaga, spain',
            'image' => '4.png',
            'popularity' => 2873
        ]);
        Actor::create([
            'name' => 'Achmad Megantara',
            'gender' => 'male',
            'biography' => "Achmad Megantara (lahir 27 Desember 1996) adalah pemeran dan model Indonesia. Ia sempat tergabung ke dalam grup duo bernama Reygan bersama Rey Mbayang",
            'dob' => '1996-12-27',
            'pob' => 'Jakarta, Indonesia',
            'image' => '5.png',
            'popularity' => 287
        ]);
        Character::create([
            'actor_id' => 1,
            'movie_id' => 2,
            'play_as' => 'shuri the black panter'
        ]);
        Character::create([
            'actor_id' => 2,
            'movie_id' => 2,
            'play_as' => "namor / k'ku'kulkan"
        ]);
        Character::create([
            'actor_id' => 3,
            'movie_id' => 3,
            'play_as' => "jake "
        ]);
        Character::create([
            'actor_id' => 4,
            'movie_id' => 4,
            'play_as' => "The Puss"
        ]);
        Character::create([
            'actor_id' => 5,
            'movie_id' => 5,
            'play_as' => "Bima"
        ]);
    }
}
