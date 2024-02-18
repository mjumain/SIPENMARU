<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MenuUserAdmisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'nama_menu' => 'Menu Admisi',
            'url' => '#',
            'icon' => '',
            'parent_id' => '0',
            'urutan' => 1
        ]);

        $menu_id = Menu::create([
            'nama_menu' => 'Dashboard',
            'url' => 'admisi-dashboard',
            'icon' => 'fas fa-home',
            'parent_id' => $menu->id,
            'urutan' => 1
        ]);

        Permission::create(['name' => 'read_admisi_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admisi_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admisi_dashboard', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admisi_dashboard', 'menu_id' => $menu_id->id]);

        $menu_id = Menu::create([
            'nama_menu' => 'Biodata',
            'url' => 'admisi-biodata',
            'icon' => 'fas fa-user-tie',
            'parent_id' => $menu->id,
            'urutan' => 2
        ]);

        Permission::create(['name' => 'read_admisi_biodata', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admisi_biodata', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admisi_biodata', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admisi_biodata', 'menu_id' => $menu_id->id]);

        $menu_id = Menu::create([
            'nama_menu' => 'Tes Online',
            'url' => 'admisi-tes-online',
            'icon' => 'fas fa-laptop',
            'parent_id' => $menu->id,
            'urutan' => 3
        ]);

        Permission::create(['name' => 'read_admisi_tes_online', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admisi_tes_online', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admisi_tes_online', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admisi_tes_online', 'menu_id' => $menu_id->id]);

        $menu_id = Menu::create([
            'nama_menu' => 'Pembayaran SPP',
            'url' => 'admisi-pembayaran-spp',
            'icon' => 'fas fa-file-invoice-dollar',
            'parent_id' => $menu->id,
            'urutan' => 4
        ]);

        Permission::create(['name' => 'read_admisi_pembayaran_spp', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admisi_pembayaran_spp', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admisi_pembayaran_spp', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admisi_pembayaran_spp', 'menu_id' => $menu_id->id]);

        $menu_id = Menu::create([
            'nama_menu' => 'Riwayat Pembayaran',
            'url' => 'admisi-riwayat-pembayaran',
            'icon' => 'fas fa-folder-open',
            'parent_id' => $menu->id,
            'urutan' => 5
        ]);

        Permission::create(['name' => 'read_admisi_riwayat_pembayaran', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'create_admisi_riwayat_pembayaran', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'update_admisi_riwayat_pembayaran', 'menu_id' => $menu_id->id]);
        Permission::create(['name' => 'delete_admisi_riwayat_pembayaran', 'menu_id' => $menu_id->id]);
    }
}
