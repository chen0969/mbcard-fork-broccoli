<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'MemberAuthController@login');

Route::get('me', 'MemberController@me');
Route::get('members', 'MemberController@index');
Route::post('members', 'MemberController@store');
Route::get('members/{id}', 'MemberController@show');
Route::put('members/{id}', 'MemberController@update');
Route::delete('members/{id}', 'MemberController@destroy');

Route::get('companies', 'CompanyController@index');
Route::post('companies', 'CompanyController@store');
Route::get('companies/{id}', 'CompanyController@show');
Route::put('companies/{id}', 'CompanyController@update');
Route::delete('companies/{id}', 'CompanyController@destroy');

Route::get('portfolios', 'PortfolioController@index');
Route::post('portfolios', 'PortfolioController@store');
Route::get('portfolios/{id}', 'PortfolioController@show');
Route::put('portfolios/{id}', 'PortfolioController@update');
Route::delete('portfolios/{id}', 'PortfolioController@destroy');
