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
Route::get('members/{account}', 'MemberController@show');
Route::put('members/{account}', 'MemberController@update');
Route::delete('members/{account}', 'MemberController@destroy');

Route::get('roles', 'RoleController@index');
Route::post('roles', 'RoleController@store');
Route::get('roles/{id}', 'RoleController@show');
Route::put('roles/{id}', 'RoleController@update');
Route::delete('roles/{id}', 'RoleController@destroy');

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
