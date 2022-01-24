<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\CotizacioneController;
use App\Http\Controllers\ProductoController;
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

	Route::middleware(['auth:sanctum','verified'])->get('productos/list', [ProductoController::class,'index'])->name('productosList');
	Route::middleware(['auth:sanctum','verified'])->delete('productos/{id}', [ProductoController::class,'destroy'])->name('productosDelet');

	Route::middleware(['auth:sanctum','verified'])->get('categorias/list', [CategoriaController::class,'index'])->name('categoriasList');
	Route::middleware(['auth:sanctum','verified'])->delete('categorias/{id}', [CategoriaController::class,'destroy'])->name('categoriasDelet');

	
	Route::middleware(['auth:sanctum','verified'])->get('proveedores/list', [ProveedorController::class,'index'])->name('proveedoresList');
	Route::middleware(['auth:sanctum','verified'])->delete('proveedores/{id}', [ProveedorController::class,'destroy'])->name('proveedoresDelet');


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

