<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'Nombre' => Str::random(10),
            'Email' => Str::random(10).'@gmail.com',
            'NIF_CIF' => Str::random(9),
            'Telefono' => '123456789',
            'Direccion' => Str::random(10),
            'Localidad' => Str::random(10),
            'CP' => '12345',
            'Provincia' => Str::random(10),
        ]);
        DB::table('ventas')->insert([
            'Fecha_Venta' => '2019-08-31',
            'Estado' => Str::random(10),
            'Cliente' => '1',
        ]);
    }
}