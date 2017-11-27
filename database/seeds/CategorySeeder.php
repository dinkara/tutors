<?php

use Illuminate\Database\Seeder;
use App\Support\Enum\SentenceCategories;
use App\Repositories\Category\ICategoryRepo;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(ICategoryRepo $repo)
    {
        $categories = SentenceCategories::all();
        
        foreach($categories as $category){
            $repo->create(["name" => $category]);
        }
    }
}
