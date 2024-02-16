<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MenuAdminAdmisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'nama_menu' => 'Admin Menu',
            'url' => '#',
            'icon' => '',
            'parent_id' => '0',
            'urutan' => 1
        ]);

        $menu_id = Menu::create([
            'nama_menu' => 'Dashboard',
            'url' => 'admin-admisi-dashboard',
            'icon' => 'fas fa-home',
            'parent_id' => $menu->id,
            'urutan' => 1
        ]);

        Permission::create(['name' => 'read_admin_admisi_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admin_admisi_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admin_admisi_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admin_admisi_dashboard', 'menu_id' => $menu_id->id]);

        $submenu = Menu::create([
            'nama_menu' => 'Master Data',
            'url' => '#',
            'icon' => 'fas fa-database',
            'parent_id' => $menu->id,
            'urutan' => 2
        ]);
        $menu_id = Menu::create([
            'nama_menu' => 'Rule Prokeja',
            'url' => 'admin-admisi-prokeja',
            'parent_id' => $submenu->id,
            'urutan' => 1
        ]);

        Permission::create(['name' => 'read_admin_admisi_pkj', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admin_admisi_pkj', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admin_admisi_pkj', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admin_admisi_pkj', 'menu_id' => $menu_id->id]);
    }
}
