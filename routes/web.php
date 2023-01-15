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
    return view('welcome');
});

//Route::get('/company', function (){
//   return view('company'); 
//});
Route::view('/company', 'company');//Forma simplificada de renderizar uma view

Route::any('/any', function (){
    return "Permite todo tipo de requisição http";
});

Route::match(['get', 'post'],'/match', function (){
    return 'Permite apenas os acessos definidos';
});

Route::get('/product/{id}/{cat?}', function ($id, $cat = ''){//Interrogação e pq o parametro não e obrigatorio
    return "Id do produto é: ".$id."<br>E sua categoria é: ".$cat;
});

//Route::get('/about', function (){
//    return redirect('/company');//Redirecinamento de rota
//});
Route::redirect('/about', '/company');//Forma mais simplificada

Route::get('/news', function (){
    return view('news');
})->name('noticias');//Declarando nome para rota e mesmo se a rota mudar ainda ira continuar redirecionando

Route::get('new', function(){
    return redirect()->route('noticias');//Fazer um redirect pelo nome da rota
});

Route::get('/redirect', function(){
    return redirect()->route('admin.client');
});

//Route::name('admin.')->group(function(){//Agrupamento de rotas por nome
//    Route::get('admin/dashboard', function (){
//        return 'dasshboard';
//    })->name('dashboard');
//
//    Route::get('admin/client', function (){
//        return 'client';
//    })->name('client');
//
//    Route::get('admin/users', function (){
//        return 'users';
//    })->name('users');
//});


//Route::prefix('admin')->group(function(){//Agrupamento de rotas por prefixo
//    Route::get('dashboard', function (){
//        return 'dasshboard';
//    })->name('dashboard');
//
//    Route::get('client', function (){
//        return 'client';
//    })->name('client');
//
//    Route::get('users', function (){
//        return 'users';
//    })->name('users');
//});

Route::group([
        'prefix'=> 'admin',
        'as' => 'admin.'//group
    ], function (){//Agrupamento de rotas por nome e prefixo
    Route::get('dashboard', function (){
        return 'dasshboard';
    })->name('dashboard');

    Route::get('client', function (){
        return 'client';
    })->name('client');

    Route::get('users', function (){
        return 'users';
    })->name('users');
});
