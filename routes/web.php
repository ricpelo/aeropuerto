<?php

use App\Http\Controllers\ProfileController;
use App\Models\Reserva;
use App\Models\Vuelo;
use Illuminate\Http\Request;
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

Route::get('/reservas/selecciona-vuelo', function () {
    return view('reservas.selecciona-vuelo', [
        'vuelos' => Vuelo::where('salida', '>=', now())->get(),
    ]);
})->name('reservas.selecciona-vuelo');

Route::get('/reservas/{reserva}', function (Reserva $reserva) {
    return view('reservas.show', [
        'reserva' => $reserva,
    ]);
})->name('reservas.show');

Route::get('/reservas/create/{vuelo}', function (Vuelo $vuelo) {
    if (!$vuelo->hayPlazasLibres()) {
        return redirect()->route('reservas.selecciona-vuelo')
            ->with('error', 'Ese vuelo no tiene plazas libres.');
    }
    $plazas = $vuelo->plazas;
    $libres = array_diff(
        range(1, $plazas),
        $vuelo->reservas()->pluck('asiento')->all()
    );
    return view('reservas.create', [
        'vuelo' => $vuelo,
        'libres' => $libres,
    ]);
})->name('reservas.create');

Route::post('/reservas/create/{vuelo}', function (Request $request, Vuelo $vuelo) {
    $plazas = $vuelo->plazas;
    $id = $vuelo->id;
    $validated = $request->validate([
        'asiento' => "required|integer|max:$plazas|asiento_libre:$id",
    ], [
        'asiento_libre' => 'El asiento está ocupado.',
    ]);
    $reserva = Reserva::create([
        'user_id' => Auth::user()->id,
        'vuelo_id' => $vuelo->id,
        'asiento' => $validated['asiento'],
    ]);
    // $reserva->user_id = Auth::user()->id;
    // $reserva->vuelo_id = $vuelo->id;
    // $reserva->asiento = $validated['asiento'];
    // $reserva->save();
    return redirect()->route('dashboard');
})->name('reservas.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
