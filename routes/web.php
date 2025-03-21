<?php

use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


    // Evernement
    
   

Route::middleware('auth')->group(function () {




    Route::get('/evenement/create', [EvenementController::class,'create'])->name('evenement.create');
    Route::get('/evenement/index',[EvenementController::class,'index'])->name('evenement.index');
    Route::post('/evenement/store',[EvenementController::class,'store'])->name('evenement.store');
    Route::get('/evenement/edit/{evenement}', [EvenementController::class,'edit'])->name('evenement.edit');
    Route::put('/evenement/update/{evenement}',[EvenementController::class,'update'])->name('evenement.update');
    Route::get('/evenement/show/{evenement}',[EvenementController::class,'show'])->name('evenement.show');
    Route::get('/evenement/destroy/{evenement}',[EvenementController::class,'destroy'])->name('evenement.destroy');
    
    // Billet
    
    Route::get('/billet/create', [TicketController::class,'create'])->name('tickets.create');
    Route::get('/tickets/index',[TicketController::class,'index'])->name('tickets.index');
    Route::post('/tickets/store',[TicketController::class,'store'])->name('tickets.store');
    Route::get('/tickets/edit/{tickets}', [TicketController::class,'edit'])->name('tickets.edit');
    Route::put('/tickets/update/{tickets}',[TicketController::class,'update'])->name('tickets.update');
    Route::get('/tickets/show/{tickets}',[TicketController::class,'show'])->name('tickets.show');
    Route::delete('/tickets/destroy/{tickets}',[TicketController::class,'destroy'])->name('tickets.destroy');
    
    
    // Participant
    
    Route::get('/participant/create', [ParticipantController::class,'create'])->name('participant.create');
    Route::get('/participant/index',[ParticipantController::class,'index'])->name('participant.index');
    Route::post('/participant/store',[ParticipantController::class,'store'])->name('participant.store');
    Route::get('/participant/edit/{participant}', [ParticipantController::class,'edit'])->name('participant.edit');
    Route::put('/participant/update/{participant}',[ParticipantController::class,'update'])->name('participant.update');
    Route::get('/participant/show/{participant}',[ParticipantController::class,'show'])->name('participant.show');
    Route::get('/participant/destroy/{participant}',[ParticipantController::class,'destroy'])->name('participant.destroy');






    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
