<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'users_id' => 2,
                'pengusul_id' => 5,
                'latitude' => '-0.857844',
                'longitude' => '119.881858',
                'mou_id' => '1',
                'nomor_moa' => '1111122222-moa',
                'nomor_moa_pengusul' => '1111144444-moa',
                'nik_nip_pengusul' => '1213213123213123123-moa',
                'jabatan_pengusul' => 'Rektor-moa',
                'program' => 'Penyuluhan Pabrik Tesla-moa',
                'tanggal_mulai' => '2021-08-16',
                'tanggal_berakhir' => '2021-10-16',
                'dokumen' => 'dokumen_tidak_ada1-moa.pdf',
                'metode_pertemuan' => 'desktodesk-moa',
                'tanggal_pertemuan' => '2021-07-15',
                'waktu_pertemuan' => '21:00',
                'tempat_pertemuan' => 'Cafe Mahasiswa-moa'
            ],
            [
                'users_id' => 2,
                'pengusul_id' => 6,
                'latitude' => '-0.8364322',
                'longitude' => '119.891505',
                'mou_id' => '2',
                'nomor_moa' => '212121313131-moa',
                'nomor_moa_pengusul' => '21212141414141-moa',
                'nik_nip_pengusul' => '999888888888888888-moa',
                'jabatan_pengusul' => 'Kepala Dinas-moa',
                'program' => 'Kerjasama IKM',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-03-16',
                'dokumen' => 'dokumen_tidak_ada2-moa.pdf',
                'metode_pertemuan' => 'desktodesk-moa',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'JCO PGM-moa'
            ],
            [
                'users_id' => 2,
                'pengusul_id' => 7,
                'latitude' => '-0.893251',
                'longitude' => '119.886419',
                'mou_id' => '3',
                'nomor_moa' => '666666777777-moa',
                'nomor_moa_pengusul' => '666666888888-moa',
                'nik_nip_pengusul' => '677777777777-moa',
                'jabatan_pengusul' => 'Sekretaris Bawaslu-moa',
                'program' => 'Kerjasama Pengawasan Pemilu-moa',
                'tanggal_mulai' => '2021-12-21',
                'tanggal_berakhir' => '2022-08-16',
                'dokumen' => 'dokumen_tidak_ada3-moa.pdf',
                'metode_pertemuan' => 'desktodesk-moa',
                'tanggal_pertemuan' => '2022-01-21',
                'waktu_pertemuan' => '17:00',
                'tempat_pertemuan' => 'Cafe BNS-moa'
            ],
        ];

        DB::table('moa')->insert($data);
    }
}
