<?php

use App\Http\Controllers\ProfileController;
use App\Models\Reserva;
use App\Models\Vuelo;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'reservas' => Auth::user()->reservas,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reservas/{reserva}', function (Reserva $reserva) {
    return view('reservas.show', [
        'reserva' => $reserva,
    ]);
})->name('reservas.show');

Route::get('/reservas/selecciona-vuelo', function () {
    return view('reservas.selecciona-vuelo', [
        'vuelos' => Vuelo::where('salida', '>=', now())->get(),
    ]);
})->name('reservas.selecciona-vuelo');

Route::get('/reservas/create/{vuelo}', function (Vuelo $vuelo) {
    $plazas = $vuelo->plazas;
    $libres = array_values(array_diff(
        range(1, $plazas),
        $vuelo->reservas()->puck('asiento')->all()
    ));
    return view('reservas.create', [
        'vuelo' => $vuelo,
        'libres' => $libres,
    ]);
})->name('reservas.create');

Route::post('/reservas/create/{vuelo}', function (Vuelo $vuelo, Request $request) {
    $reserva = new Reserva();
    $reserva->user_id = Auth::user()->id;
    $reserva->vuelo_id = $vuelo->id;
    // $reserva->asiento = $request->
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
