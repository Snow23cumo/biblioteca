<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'usuario' => 'admin',
            'nombre' => 'Administrador',
            'password' => bcrypt('pass123'),
            'email'=>'admin@admin.com'
        ]);
       
        DB::table('usuario_rol')->insert([
            'rol_id' => 1,
            'usuario_id' => 1
        ]);
      
    }
}
 /* DB::table('usuario')->insert([
            'usuario' => 'rut',
            'nombre' => 'Rossvelt',
            'password' => bcrypt('pass1234')
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 2,
            'usuario_id' => 2,
            'estado' => 2
        ]);*/