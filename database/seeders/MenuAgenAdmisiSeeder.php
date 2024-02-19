<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MenuAgenAdmisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'nama_menu' => 'Menu Agen',
            'url' => '#',
            'icon' => '',
            'parent_id' => '0',
            'urutan' => 1
        ]);

        $menu_id = Menu::create([
            'nama_menu' => 'Dashboard',
            'url' => 'admin-agen-dashboard',
            'icon' => 'fas fa-home',
            'parent_id' => $menu->id,
            'urutan' => 1
        ]);

        Permission::create(['name' => 'read_admisi_agen_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admisi_agen_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admisi_agen_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admisi_agen_dashboard', 'menu_id' => $menu_id->id]);
    }
}
