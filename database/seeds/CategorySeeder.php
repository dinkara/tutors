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
        
        $colors = ["danger", "primary", "info", "warning", "success", "light", "dark"];
        
        foreach($categories as $key => $category){
            $repo->create(["name" => $category, "color" => $colors[$key]]);
        }
    }
}
