<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $home = Menu::create([
            'name' => "Home",
            'order_by' => 1,
        ]);

        $service = Menu::create([
            'name' => "Services",
            'order_by' => 2,
        ]);

        $portfolio = Menu::create([
            'name' => "Portfolios",
            'order_by' => 3,
        ]);

        $about_us = Menu::create([
            'name' => "About us",
            'order_by' => 4,
        ]);
    }
}