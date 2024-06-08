<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class infoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('info')->insert([
            'no_info'=>'1001',
            'judul_info'=>'Kampus',
            'deskripsi'=>'Halo.Test.12322',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('info')->insert([
            'no_info'=>'1002',
            'judul_info'=>'gundar',
            'deskripsi'=>'Halo.Test.123dwew',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
        DB::table('info')->insert([
            'no_info'=>'1003',
            'judul_info'=>'UGM',
            'deskripsi'=>'Halo.Test.12322dsdsds',
            'created_at'=>date('Y-m-d H:i:s')
        ]);
    }
}
