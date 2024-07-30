<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit'); //Rota para exibir o formulário de edição
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update'); //Rota para atualizar o perfil
});


require __DIR__ . '/auth.php';
