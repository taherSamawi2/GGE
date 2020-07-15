<?php

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(["prefix" => "admin"], function () {
    Route::get('/lang/{lang}',function ($lang){
        session()->has('lang')?session()->forget('lang'):'';
       $lang == 'ar' ? session()->put('lang','ar'):session()->put('lang','en');
       return back();
    });

    Route::get('/', function (){
        return view('admin.home');
    })->middleware('auth');

    Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

    Route::get('/licenses', "LicenseController@index")->name('licenses.index');
    Route::get('/licenses/create', "LicenseController@create")->name('licenses.create');
    Route::post('/licenses/store', "LicenseController@store")->name('licenses.store');
    Route::get('/licenses/{license}', "LicenseController@show")->name('licenses.show');
    Route::get('/licenses/{license}/edit', "LicenseController@edit")->name('licenses.edit');
    Route::put('/licenses/{license}', "LicenseController@update")->name('licenses.update');
    Route::delete('/licenses/{license}', "LicenseController@delete")->name('licenses.delete');


    Route::get('/legalRegulations', "LegalRegulationController@index")->name('legalRegulations.index');
    Route::get('/legalRegulations/create', "LegalRegulationController@create")->name('legalRegulations.create');
    Route::post('/legalRegulations/store', "LegalRegulationController@store")->name('legalRegulations.store');
    Route::get('/legalRegulations/{legalRegulation}', "LegalRegulationController@show")->name('legalRegulations.show');
    Route::get('/legalRegulations/{legalRegulation}/edit', "LegalRegulationController@edit")->name('legalRegulations.edit');
    Route::put('/legalRegulations/{legalRegulation}', "LegalRegulationController@update")->name('legalRegulations.update');
    Route::delete('/legalRegulations/{legalRegulation}', "LegalRegulationController@delete")->name('legalRegulations.delete');


    Route::get('/legislations', "LegislationController@index")->name('legislations.index');
    Route::get('/legislations/create', "LegislationController@create")->name('legislations.create');
    Route::post('/legislations/store', "LegislationController@store")->name('legislations.store');
    Route::get('/legislations/{legislation}', "LegislationController@show")->name('legislations.show');
    Route::get('/legislations/{legislation}/edit', "LegislationController@edit")->name('legislations.edit');
    Route::put('/legislations/{legislation}', "LegislationController@update")->name('legislations.update');
    Route::delete('/legislations/{legislation}', "LegislationController@delete")->name('legislations.delete');


    Route::get('/establishmentRegistrations', "EstablishmentsRegistrationController@index")->name('establishmentsRegistration.index');
    Route::get('/establishmentRegistrations/create', "EstablishmentsRegistrationController@create")->name('establishmentsRegistration.create');
    Route::post('/establishmentRegistrations/store', "EstablishmentsRegistrationController@store")->name('establishmentsRegistration.store');
    Route::get('/establishmentRegistrations/{establishmentsRegistration}', "EstablishmentsRegistrationController@show")->name('establishmentsRegistration.show');
    Route::get('/establishmentRegistrations/{establishmentsRegistration}/edit', "EstablishmentsRegistrationController@edit")->name('establishmentsRegistration.edit');
    Route::put('/establishmentRegistrations/{establishmentsRegistration}', "EstablishmentsRegistrationController@update")->name('establishmentsRegistration.update');
    Route::delete('/establishmentRegistrations/{establishmentsRegistration}', "EstablishmentsRegistrationController@delete")->name('establishmentsRegistration.delete');


    Route::get('/videos', "VideoController@index")->name('videos.index');
    Route::get('/videos/create', "VideoController@create")->name('videos.create');
    Route::post('/videos/store', "VideoController@store")->name('videos.store');
    Route::get('/videos/{video}', "VideoController@show")->name('videos.show');
    Route::get('/videos/{video}/edit', "VideoController@edit")->name('videos.edit');
    Route::put('/videos/{video}', "VideoController@update")->name('videos.update');
    Route::delete('/videos/{video}', "VideoController@delete")->name('videos.delete');


    Route::get('/news', "NewsController@index")->name('news.index');
    Route::get('/news/create', "NewsController@create")->name('news.create');
    Route::post('/news/store', "NewsController@store")->name('news.store');
    Route::get('/news/{news}', "NewsController@show")->name('news.show');
    Route::get('/news/{news}/edit', "NewsController@edit")->name('news.edit');
    Route::put('/news/{news}', "NewsController@update")->name('news.update');
    Route::delete('/news/{news}', "NewsController@delete")->name('news.delete');



    Route::get('/books', "BookController@index")->name('books.index');
    Route::get('/books/create', "BookController@create")->name('books.create');
    Route::post('/books/store', "BookController@store")->name('books.store');
    Route::get('/books/{book}', "BookController@show")->name('books.show');
    Route::get('/books/{book}/edit', "BookController@edit")->name('books.edit');
    Route::put('/books/{book}', "BookController@update")->name('books.update');
    Route::delete('/books/{book}', "BookController@delete")->name('books.delete');

});
