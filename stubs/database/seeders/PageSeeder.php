<?php

namespace Database\Seeders;

use App\Models\Page;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Takshak\Adash\Traits\ImageTrait;

class PageSeeder extends Seeder
{
    use ImageTrait;
    public function run(Faker $faker)
    {
        \Storage::deleteDirectory('pages');
        for ($i=0; $i < 8; $i++) { 
            $page = new Page;
            $page->title    =   $faker->realText(rand(30, 60), 2);
            $page->slug     =   \Str::of($page->title)->slug('-');

            $page->banner   =   'pages/'.$page->slug.'.jpg';
            $this->initImg('https://picsum.photos/900/500')
                ->storeImg($page->banner);

            $page->content  =   $faker->realText(rand(1000, 2500), 2);
            $page->status   =   true;
            $page->save();
        }
        
    }
}
