<?php

namespace Database\Seeders;

use App\Models\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            ['name' => 'BELUM/TIDAK BEKERJA', 'created_by' => 'Super Admin'],
            ['name' => 'PEGAWAI NEGERI SIPIL', 'created_by' => 'Super Admin'],
            ['name' => 'TENTARA NASIONAL INDONESIA', 'created_by' => 'Super Admin'],
            ['name' => 'KEPOLISIAN RI', 'created_by' => 'Super Admin'],
            ['name' => 'KARYAWAN BUMN', 'created_by' => 'Super Admin'],
            ['name' => 'KARYAWAN BUMD', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA DPR-RI', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA DPD', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA BPK', 'created_by' => 'Super Admin'],
            ['name' => 'PRESIDEN', 'created_by' => 'Super Admin'],
            ['name' => 'WAKIL PRESIDEN', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA MAHKAMAH KONSTITUSI', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA KABINET/KEMENTERIAN', 'created_by' => 'Super Admin'],
            ['name' => 'DUTA BESAR', 'created_by' => 'Super Admin'],
            ['name' => 'GUBERNUR', 'created_by' => 'Super Admin'],
            ['name' => 'WAKIL GUBERNUR', 'created_by' => 'Super Admin'],
            ['name' => 'BUPATI', 'created_by' => 'Super Admin'],
            ['name' => 'WAKIL BUPATI', 'created_by' => 'Super Admin'],
            ['name' => 'WALIKOTA', 'created_by' => 'Super Admin'],
            ['name' => 'WAKIL WALIKOTA', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA DPRD PROVINSI', 'created_by' => 'Super Admin'],
            ['name' => 'ANGGOTA DPRD KABUPATEN/KOTA', 'created_by' => 'Super Admin'],
            ['name' => 'PENGACARA', 'created_by' => 'Super Admin'],
            ['name' => 'NOTARIS', 'created_by' => 'Super Admin'],
            ['name' => 'PENELITI', 'created_by' => 'Super Admin'],
            ['name' => 'PERANGKAT DESA', 'created_by' => 'Super Admin'],
            ['name' => 'KEPALA DESA', 'created_by' => 'Super Admin'],
            ['name' => 'DOSEN', 'created_by' => 'Super Admin'],
            ['name' => 'GURU', 'created_by' => 'Super Admin'],
            ['name' => 'PERDAGANGAN', 'created_by' => 'Super Admin'],
            ['name' => 'INDUSTRI', 'created_by' => 'Super Admin'],
            ['name' => 'KONSTRUKSI', 'created_by' => 'Super Admin'],
            ['name' => 'TRANSPORTASI', 'created_by' => 'Super Admin'],
            ['name' => 'KARYAWAN SWASTA', 'created_by' => 'Super Admin'],
            ['name' => 'KARYAWAN HONORER', 'created_by' => 'Super Admin'],
            ['name' => 'BURUH HARIAN LEPAS', 'created_by' => 'Super Admin'],
            ['name' => 'PEMBANTU RUMAH TANGGA', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG CUKUR', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG LISTRIK', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG BATU', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG KAYU', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG SOL SEPATU', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG LAS/PANDAI BESI', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG JAHIT', 'created_by' => 'Super Admin'],
            ['name' => 'TUKANG GIGI', 'created_by' => 'Super Admin'],
            ['name' => 'PENATA RIAS', 'created_by' => 'Super Admin'],
            ['name' => 'PENATA BUSANA', 'created_by' => 'Super Admin'],
            ['name' => 'PENATA RAMBUT', 'created_by' => 'Super Admin'],
            ['name' => 'MEKANIK', 'created_by' => 'Super Admin'],
            ['name' => 'SENIMAN', 'created_by' => 'Super Admin'],
            ['name' => 'TABIB', 'created_by' => 'Super Admin'],
            ['name' => 'PARAJI', 'created_by' => 'Super Admin'],
            ['name' => 'PERANCANG BUSANA', 'created_by' => 'Super Admin'],
            ['name' => 'PENTERJEMAH', 'created_by' => 'Super Admin'],
            ['name' => 'WARTAWAN', 'created_by' => 'Super Admin'],
            ['name' => 'JURU MASAK', 'created_by' => 'Super Admin'],
            ['name' => 'PROMOTOR ACARA', 'created_by' => 'Super Admin'],
            ['name' => 'PILOT', 'created_by' => 'Super Admin'],
            ['name' => 'ARSITEK', 'created_by' => 'Super Admin'],
            ['name' => 'AKUNTAN', 'created_by' => 'Super Admin'],
            ['name' => 'KONSULTAN', 'created_by' => 'Super Admin'],
            ['name' => 'PENYIAR TELEVISI', 'created_by' => 'Super Admin'],
            ['name' => 'PENYIAR RADIO', 'created_by' => 'Super Admin'],
            ['name' => 'PELAUT', 'created_by' => 'Super Admin'],
            ['name' => 'SOPIR', 'created_by' => 'Super Admin'],
            ['name' => 'PIALANG', 'created_by' => 'Super Admin'],
            ['name' => 'PARANORMAL', 'created_by' => 'Super Admin'],
            ['name' => 'PEDAGANG', 'created_by' => 'Super Admin'],
            ['name' => 'WIRASWASTA', 'created_by' => 'Super Admin'],
            ['name' => 'PETANI/PEKEBUN', 'created_by' => 'Super Admin'],
            ['name' => 'PETERNAK', 'created_by' => 'Super Admin'],
            ['name' => 'BURUH TANI/PERKEBUNAN', 'created_by' => 'Super Admin'],
            ['name' => 'BURUH PETERNAKAN', 'created_by' => 'Super Admin'],
            ['name' => 'NELAYAN/PERIKANAN', 'created_by' => 'Super Admin'],
            ['name' => 'BURUH NELAYAN/PERIKANAN', 'created_by' => 'Super Admin'],
            ['name' => 'IMAM MESJID', 'created_by' => 'Super Admin'],
            ['name' => 'PENDETA', 'created_by' => 'Super Admin'],
            ['name' => 'PASTOR', 'created_by' => 'Super Admin'],
            ['name' => 'USTADZ/MUBALIGH', 'created_by' => 'Super Admin'],
            ['name' => 'BIARAWATI', 'created_by' => 'Super Admin'],
            ['name' => 'PELAJAR/MAHASISWA', 'created_by' => 'Super Admin'],
            ['name' => 'DOKTER', 'created_by' => 'Super Admin'],
            ['name' => 'BIDAN', 'created_by' => 'Super Admin'],
            ['name' => 'PERAWAT', 'created_by' => 'Super Admin'],
            ['name' => 'APOTEKER', 'created_by' => 'Super Admin'],
            ['name' => 'PSIKIATER/PSIKOLOG', 'created_by' => 'Super Admin'],
            ['name' => 'PENSIUNAN', 'created_by' => 'Super Admin'],
            ['name' => 'MENGURUS RUMAH TANGGA', 'created_by' => 'Super Admin'],
            ['name' => 'LAINNYA', 'created_by' => 'Super Admin'],
        ];
        foreach ($input as $item) {
            Profession::create($item);
        }
    }
}
