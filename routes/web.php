<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Rutas API (estas van primero para que no sean capturadas por el catch-all)
Route::prefix('api')->group(function () {
    // Route::get('/users', function(){
    //     echo 'Users API'; // Simulación de respuesta de la API
    // });

    // Route::post('/users', [UserController::class, 'store']);

    // Route::get('/users', [UserController::class, 'index']);
    // Route::get('/users/{id}', [UserController::class, 'show']);
    // Más rutas API...
});

// Ruta catch-all para Angular (DEBE IR AL FINAL)
Route::get('/{any}', function () {
    return view('app'); // Tu vista blade con Angular
})->where('any', '.*'); // Captura cualquier ruta