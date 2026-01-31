<?php

use Illuminate\Support\Facades\Route;

Route::name('web.')->group(function () {
    Route::view('/', 'web.home')->name('home');

    Route::view('/planes', 'web.planes')->name('planes');
    Route::view('/cobertura', 'web.cobertura')->name('cobertura');
    Route::view('/soporte', 'web.soporte')->name('soporte');
    Route::view('/nosotros', 'web.nosotros')->name('nosotros');

    Route::view('/blog', 'web.blog.index')->name('blog.index');
    Route::view('/blog/{slug}', 'web.blog.show')->name('blog.show'); // luego lo conectas al back

    Route::view('/contacto', 'web.contacto')->name('contacto');

    Route::prefix('legal')->name('legal.')->group(function () {
        Route::view('/terminos', 'web.legal.terminos')->name('terminos');
        Route::view('/privacidad', 'web.legal.privacidad')->name('privacidad');
    });
});
