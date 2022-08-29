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

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//route pour afficher le form
Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'index'])->name('administrateurs');
//route pour envoyez
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'create'])->name('Admin.create');

Route::get('/commissariat', [App\Http\Controllers\CommissariatController::class, 'index'])->name('commissariat');
Route::post('/Agent', [App\Http\Controllers\CommissariatController::class,'create'])->name('commissariat.create');
Route::get('/commissariat/dashboard', [App\Http\Controllers\CommissariatController::class, 'dashboard'])->name('Comdashboard');
Route::resource('commissariats', 'CommissariatController');
//route pour envoyez
Route::post('/commissaire', [App\Http\Controllers\CommissariatController::class, 'create'])->name('Commissariat.create');

Route::get('/utilisateurs/create', [App\Http\Controllers\UtilisateurController::class,'index'])->name('utilisateur');
Route::post('/utilisateurs', [App\Http\Controllers\UtilisateurController::class,'create'])->name('Utilisateur.create');

Route::get('/Agents/create', [App\Http\Controllers\AgentController::class,'index'])->name('agent');
Route::post('/Agent', [App\Http\Controllers\AgentController::class,'create'])->name('Agent.create');
Route::get('/agent/liste', [App\Http\Controllers\AgentController::class,'liste']);
Route::get('/agent/delete', [App\Http\Controllers\AgentController::class,'destroy'])->name('AgentDelete');
Route::get('/Agent/{id}', [App\Http\Controllers\AgentController::class,'show'])->name('agents.show');
// Route::resource('agents', 'AgentController');

Route::get('/agent', [App\Http\Controllers\AgentController::class,'liste']);

    