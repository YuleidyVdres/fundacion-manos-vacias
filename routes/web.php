<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function() {
    return view('homepage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Niños', function () {
	return view('Niños')->with('title','Perfil del Niño');
});

Route::get('Niños2', function () {
	return view('Niños2')->with('title','Perfil del Niño');
});

Route::get('Donacion', function () {
	return view('Donacion')->with('title','Perfil del Niño');
});
Route::get('Donar-perfil', function () {
	return view('Donar-perfil-niño')->with('title','Perfil del Niño');
});

Route::resource('representante', 'RepresentanteController');
Route::post('representante/auth', [
	'uses' => 'RepresentanteController@authentificate',
	'as'   => 'representante.auth'
]);
Route::get('representante/logout', [
	'uses' => 'RepresentanteController@logout',
	'as'   => 'representante.logout'
]);

Route::group(['prefix' => 'admin'], function(){
	
	/*Route::group(['prefix' => 'tipo-cancer'], function(){
		Route::get('agregar', function (){
			return view('admin.cancer.agregar')->with('title', 'Tipo de Cáncer');
		});
	
		Route::get('listar', function(){
			return view('admin.cancer.listar')->with('title', 'Lista Tipo de Cáncer');
		});
	});*/

	Route::resource('contacto', 'ContactoController');
	Route::get('/contacto/{id}/destroy', [
		'uses' => 'ContactoController@destroy',
		'as'   => 'admin.contacto.destroy'
	]);

	Route::resource('donaciones', 'DonacionesController');
	Route::get('/donacion/{id}/destroy', [
		'uses' => 'DonacionesController@destroy',
		'as'   => 'admin.donacion.destroy'
	]);

	Route::resource('usuarios', 'UsuariosController');
	Route::get('/usuario/{id}/destroy', [
		'uses' => 'UsuariosController@destroy',
		'as'   => 'admin.usuarios.destroy'
	]);
});