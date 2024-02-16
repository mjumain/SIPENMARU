<?php

namespace Modules\Admisi\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admisi\Entities\Admin\JalurPenerimaanAdmisi;
use Modules\Admisi\Entities\Admin\KelasAdmisi;
use Modules\Admisi\Entities\Admin\ProdiAdmisi;

class AdmisiDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProdiAdmisi::create(['kode_prodi' => '54251', 'nama_prodi' => 'S1-Kehutanan']);
        ProdiAdmisi::create(['kode_prodi' => '55201', 'nama_prodi' => 'S1-Informatika']);
        ProdiAdmisi::create(['kode_prodi' => '57201', 'nama_prodi' => 'S1-Sistem Informasi']);
        ProdiAdmisi::create(['kode_prodi' => '60201', 'nama_prodi' => 'S1-Ekonomi Pembangunan']);
        ProdiAdmisi::create(['kode_prodi' => '60102', 'nama_prodi' => 'S2-Ekonomi Pembangunan']);
        ProdiAdmisi::create(['kode_prodi' => '61201', 'nama_prodi' => 'S1-Manajemen']);

        KelasAdmisi::create(['kelas_perkuliahan' => 'Reguler A']);
        KelasAdmisi::create(['kelas_perkuliahan' => 'Reguler B']);

        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur Reguler']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur Transfer/Alih Jenjang/Transfer']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur Kerjasama']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur RPL']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur Beasiswa KIP Kuliah']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur Beasiswa Prestasi Akademik']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => 'Jalur Beasiswa Prestasi Non Akademik']);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => "Jalur Hafiz Qur'an"]);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => "Jalur Kader Persyarikatan Muhammadiyah"]);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => "Jalur Konten Kreator"]);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => "Jalur Pengurus Osis"]);
        JalurPenerimaanAdmisi::create(['jalur_pendaftaran' => "Jalur Skor UTBK"]);
    }
}
