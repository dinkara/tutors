<?php

use Illuminate\Database\Seeder;
use App\Repositories\User\IUserRepo;
use App\Repositories\Role\IRoleRepo;
use App\Repositories\Profile\IProfileRepo;
use App\Support\Enum\RoleTypes;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(IUserRepo $userRepo, IRoleRepo $roleRepo, IProfileRepo $profileRepo)
    {
        $admins = [
            [
                "email" => "ndzakovic@yahoo.com",
                "password" => "prasence123"
            ]
        ];
        for($i=0; $i < count($admins); $i++){
            $userRepo->create($admins[$i])->attachRole($roleRepo->findByName(RoleTypes::ADMIN)->getModel());
            $profileData = ["user_id" => $userRepo->getModel()->id, "name" => "Nikola", "nick" => "Teacher Dz"];                
            $profileRepo->create($profileData);
        }
    }
}