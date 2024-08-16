<?php

namespace Database\Seeders;

use Bouncer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Company;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $su = Bouncer::role()->create([
            'name'=>'super-admin',
            'title' => 'Super Admin',
            'description' => 'Super Admin',
            'icon' => 'vaeagfzc'
        ]);

        $company = Bouncer::role()->create([
            'name'=>'company-manager',
            'title' => 'Company Manager',
            'description' => 'Manage Company Data',
            'icon' => 'qhviklyi'
        ]);

        Bouncer::allow('super-admin')->everything();
        Bouncer::allow('company-manager')->toManage(Company::class);
    }
}
