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

// Setup Glide server
// Route::get('img/{path}', function (League\Glide\Server $server, $path) {
// 	dd($server);
// });

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'PageController@index');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Route::get('resize-images', 'PageController@resizeImages');

// Mobile menu
Route::get('mobile-arenda', 'PageController@mobileArenda');
Route::get('mobile-vinzare', 'PageController@mobileVinzare');
Route::get('mobile-finantare', 'PageController@mobileFinantare');

Route::post('search-post', 'PageController@searchPost');

Route::get('apartamente-vinzare', 'PageController@apartamenteVinzare');
Route::get('apartamente-arenda', 'PageController@apartamenteArenda');
Route::get('apartament/{id}', 'PageController@apartamentId');

Route::get('case-vinzare', 'PageController@caseVinzare');
Route::get('case-arenda', 'PageController@caseArenda');
Route::get('casa/{id}', 'PageController@casaId');

Route::get('comerciale-vinzare', 'PageController@comercialeVinzare');
Route::get('comerciale-arenda', 'PageController@comercialeArenda');
Route::get('comercial/{id}', 'PageController@comercialId');

Route::get('industriale-vinzare', 'PageController@industrialeVinzare');
Route::get('industriale-arenda', 'PageController@industrialeArenda');
Route::get('industrial/{id}', 'PageController@industrialId');

Route::get('terenuri-vinzare', 'PageController@terenuriVinzare');
Route::get('terenuri-arenda', 'PageController@terenuriArenda');
Route::get('teren/{id}', 'PageController@terenId');

Route::get('garaje-vinzare', 'PageController@garajeVinzare');
Route::get('garaje-arenda', 'PageController@garajeArenda');
Route::get('garaj/{id}', 'PageController@garajId');

Route::get('altele-vinzare', 'PageController@alteleVinzare');
Route::get('altele-arenda', 'PageController@alteleArenda');
Route::get('altele/{id}', 'PageController@alteleId');

Route::get('proiectare', 'PageController@proiectare');

Route::get('evaluare-menu', 'PageController@evaluareMenu');
Route::get('get-page/{slug}', 'PageController@getPage');

Route::get('complexe-rezidentiale', 'PageController@complexeRezidentiale');
Route::get('complex-rezidential/{id}', 'PageController@complexRezidentialId');

Route::get('ipoteca', 'PageController@ipoteca');
Route::get('contacte', 'PageController@contacte');
Route::get('despre-companie', 'PageController@despreCompanie');
Route::get('noutati', 'PageController@noutati');
Route::get('noutati/{id}', 'PageController@noutatiId');
Route::get('informatii-utile', 'PageController@informatiiUtile');
Route::get('informatii-utile/{id}', 'PageController@informatiiUtileId');
Route::get('posturi-vacante', 'PageController@posturiVacante');
Route::get('finantare', 'PageController@finantare');
Route::get('parteneri', 'PageController@parteneri');
Route::get('cumparare-urgenta', 'PageController@cumparareUrgenta');
Route::get('serviciile-noastre', 'PageController@serviciileNoastre');

Route::get('star', 'PageController@star');

Route::get('/flush', 'PageController@flush');
Route::get('/session-all', 'PageController@sessionAll');
Route::get('/test-view', 'PageController@testView');

Route::get('lang/{lang}', 'PageController@language');

Route::get('feed-xml', 'PageController@feedXml');
Route::get('import', 'PageController@import');

Route::get('parse', 'PageController@parse');

Route::get('slider', function() {
	return view('slider');
});


