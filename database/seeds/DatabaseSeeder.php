<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(BooksSeeder::class);
    }
}

class UsersSeeder extends Seeder {
    public function run()
    {
        $names = ['Aaron', 'Alfred', 'Adam', 'Brian', 'Carter', 'Corwin', 'Harley', 'Howard', 'Isaac', 'Ramsey', 'Roswell'];
        $surnames = ['ATKINS', 'AUSTIN', 'AVERY', 'BAGLEY', 'BURTON', 'CHASE', 'CLARK', 'DAVIDSON', 'DWIGHT', 'ELDER']; //'',
        DB::table('users')->delete();
        User::create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@a.c',
            'is_admin' => 1,
            'password' => bcrypt('admin')
        ]);
        for($i = 1; $i < 50;$i++) {
            User::create([
                'firstname' => $names[array_rand($names)],
                'lastname' => $surnames[array_rand($surnames)],
                'email' => 'example'. $i .'@gmail.com',
                'password' => bcrypt('example'. $i)
            ]);
        }
    }
}

class BooksSeeder extends Seeder
{
    public function run()
    {
         $genres = ['Drama', 'Graphic novel', '(Narrative) Poem/song', 'Myth', 'Novel', 'Novella', 'Short story', 'Monologue', 'Monologue'];
        $authors = ['William Shakespeare', 'Agatha Christie', 'Barbara Cartland', 'Danielle Steel', 'Harold Robbins', 'Georges Simenon', 'Sidney Sheldon'];
        DB::table('books')->delete();
        for($i = 0;$i < 100;$i ++)
        {
            Book::create([
                'title'=>'Title '. $i,
                'author' => $authors[array_rand($authors)],
                'genre' => $genres[array_rand($genres)],
                'year' => rand(1600, 2016)
            ]);
        }
    }
}