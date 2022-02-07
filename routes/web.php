<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacioneController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProductoPrecioController;
use App\Http\Controllers\ProveedorController;
use App\Models\Cliente;
use App\Models\Cotizacion;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');

	// CREADAS POR MI
	Route::get('cotizaciones', function () {
		$clientes=Cliente::all();
		return view('pages.cotizaciones',compact('clientes'));
	})->name('cotizaciones');

	Route::get('productos', function () {
		return view('pages.productos');
	})->name('productos');

	Route::get('proveedores', function () {
		return view('pages.proveedores');
	})->name('proveedores');
	
	Route::get('clientes', function () {
		return view('pages.clientes');
	})->name('clientes');

	Route::middleware(['auth:sanctum','verified'])->get('clientes/list', [ClienteController::class,'index'])->name('clientesList');
	Route::middleware(['auth:sanctum','verified'])->delete('clientes/{id}', [ClienteController::class,'destroy'])->name('clientesDelet');
	Route::middleware(['auth:sanctum','verified'])->post('cliente/store', [ClienteController::class,'store'])->name('clienteStore');
	Route::middleware(['auth:sanctum','verified'])->put('cliente/{id}', [ClienteController::class,'update'])->name('clientesUpdate');


	Route::middleware(['auth:sanctum','verified'])->get('productos/list', [ProductoController::class,'index'])->name('productosList');
	Route::middleware(['auth:sanctum','verified'])->delete('productos/{id}', [ProductoController::class,'destroy'])->name('productosDelet');
	Route::middleware(['auth:sanctum','verified'])->post('producto/store', [ProductoController::class,'store'])->name('productoStore');
	Route::middleware(['auth:sanctum','verified'])->put('producto/{id}', [ProductoController::class,'update'])->name('productoUpdate');
	Route::middleware(['auth:sanctum','verified'])->get('producto/show/{id}', [ProductoController::class,'show'])->name('productoShow');
	// AGG PRECIO DE PRODCUTO CON SU PROVEEDOR
	Route::middleware(['auth:sanctum','verified'])->post('/store', [ProductoPrecioController::class,'store'])->name('productoAgg');
	Route::middleware(['auth:sanctum','verified'])->delete('/delet/precio/{id}', [ProductoPrecioController::class,'destroy'])->name('precioDelect');
	Route::middleware(['auth:sanctum','verified'])->get('/list/precio/{id}', [ProductoPrecioController::class,'index'])->name('preciosList');
	Route::middleware(['auth:sanctum','verified'])->put('/imagen/store/{id}', [ProductoPrecioController::class,'imgStore'])->name('imgStore');


	Route::middleware(['auth:sanctum','verified'])->get('categorias/list', [CategoriaController::class,'index'])->name('categoriasList');
	Route::middleware(['auth:sanctum','verified'])->delete('categorias/{id}', [CategoriaController::class,'destroy'])->name('categoriasDelet');
	Route::middleware(['auth:sanctum','verified'])->post('categoria/store', [CategoriaController::class,'store'])->name('categoriaStore');
	Route::middleware(['auth:sanctum','verified'])->put('categoria/{id}', [CategoriaController::class,'update'])->name('categoriaUpdate');

	
	Route::middleware(['auth:sanctum','verified'])->get('proveedores/list', [ProveedorController::class,'index'])->name('proveedoresList');
	Route::middleware(['auth:sanctum','verified'])->delete('proveedores/{id}', [ProveedorController::class,'destroy'])->name('proveedoresDelet');
	Route::middleware(['auth:sanctum','verified'])->post('proveedor/store', [ProveedorController::class,'store'])->name('proveedoresStore');
	Route::middleware(['auth:sanctum','verified'])->put('proveedor/{id}', [ProveedorController::class,'update'])->name('proveedorUpdate');


	Route::middleware(['auth:sanctum','verified'])->get('cotizaciones/list', [CotizacioneController::class,'index'])->name('cotizacionesList');
	Route::middleware(['auth:sanctum','verified'])->delete('cotizaciones/{id}', [CotizacioneController::class,'destroy'])->name('cotizacionesDelet');
	Route::middleware(['auth:sanctum','verified'])->post('cotizacion/store', [CotizacioneController::class,'store'])->name('cotizacioneStore');
	Route::middleware(['auth:sanctum','verified'])->put('cotizacion/{id}', [CotizacioneController::class,'update'])->name('cotizacionUpdate');

});


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

