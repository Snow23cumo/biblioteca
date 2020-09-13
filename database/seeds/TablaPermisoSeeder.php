<?php


use App\Models\Admin\Permiso;
use Illuminate\Database\Seeder;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Le indico cuántos datos de prueba quiero e invoco el factory del modelo Permiso
        factory(Permiso::class)->times(50)->create();
    }
}
