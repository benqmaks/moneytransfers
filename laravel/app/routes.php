<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::post('/addExchange', array('as' => 'addExchange', 'uses' => 'HomeController@addExchange'));

Route::get('/contacts', array('as' => 'contacts', 'uses' => 'HomeController@contacts'));

Route::get('/exchange', array('as' => 'exchange', 'uses' => 'HomeController@exchange'));

Route::get('/', array('as' => 'index', 'uses' => 'HomeController@index'));
