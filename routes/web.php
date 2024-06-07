<?php

use App\Models\CO2Records;
use App\Models\PressureRecord;
use App\Models\ControllerRecords;
use App\Models\TemperatureRecord;
use App\Models\FlowControllerRecords;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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
    $pressureRecords = PressureRecord::all(); // Fetch all pressure records
    $temperatureRecords = TemperatureRecord::all(); // Fetch all temperature records
    $co2Records = CO2Records::all(); // Fetch all co2 records
    $flowControllerRecords = FlowControllerRecords::all(); // Fetch all flow controller records
    $controllerRecords = ControllerRecords::all(); // Fetch all controller records

    return view('dashboard', [ 'pressureRecords' => $pressureRecords,
                                'temperatureRecords' => $temperatureRecords,
                                'co2Records' => $co2Records,
                                'flowControllerRecords' => $flowControllerRecords,
                                'controllerRecords' => $controllerRecords,]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
