<?php
namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UsersTableSeeder::class]);
        Cliente::factory(20)->create();
        Categoria::factory(10)->create();
        Producto::factory(10)->create();
        Proveedor::factory(10)->create();
        Cotizacion::factory(10)->create();


    }
}
