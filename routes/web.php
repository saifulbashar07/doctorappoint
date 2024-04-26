<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;




//Patient
Route::get('/patient-appointment',[PatientController::class, 'appointment'])->name('patient.appointment');
Route::post('/patient-appointment',[PatientController::class, 'store'])->name('patient.appointment.store');
Route::get('/patient-list', [PatientController::class, 'list'])->name('patient.list');
Route::get('/patient/{id}/edit', [PatientController::class, 'edit']);
Route::patch('/patient-edit', [PatientController::class, 'update'])->name('patient.edit');
Route::get('/patient-delete/{id}', [PatientController::class, 'destroy']);
Route::get('/patient-document',[PatientController::class, 'uploadDocument'])->name('patient.docuemnt');
Route::get('/patient-prescription',[PatientController::class, 'prescription'])->name('patient.prescription');



Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    //Admin
    Route::get('/user-list', [AdminController::class, 'userList'])->name('user.list');
    Route::get('/user/{id}/edit', [AdminController::class, 'userEdit']);
    Route::patch('/user-edit', [AdminController::class, 'userUpdate'])->name('user.edit');
    Route::get('/user-delete/{id}', [AdminController::class, 'userDestroy']);


    //Doctor
    Route::get('/doctor-create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor-create', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor-list', [DoctorController::class, 'list'])->name('doctor.list');
    Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit']);
    Route::patch('/doctor-edit', [DoctorController::class, 'update'])->name('doctor.edit');
    Route::get('/doctor-delete/{id}', [DoctorController::class, 'destroy']);
    Route::get('/doctor-profile/{id}', [DoctorController::class, 'profile'])->name('doctor.profile');
    Route::get('/doctor-document', [DoctorController::class, 'uploadDocument'])->name('doctor.document');
    Route::post('/doctor-document-upload', [DoctorController::class, 'storeDocument'])->name('doctor.document.upload');
    Route::get('/doctor-file/{id}/edit', [DoctorController::class, 'documentEdit']);
    Route::patch('/doctor-file-edit', [DoctorController::class, 'documentUpdate'])->name('doctor.document.edit');
    Route::get('/doctor-file-delete/{id}', [DoctorController::class, 'documentDestroy']);

    //Medicine
    Route::get('/medicine-create', [MedicineController::class, 'create'])->name('medicine.create');
    Route::post('/medicine-create', [MedicineController::class, 'store'])->name('medicine.store');
    Route::get('/medicine-list', [MedicineController::class, 'list'])->name('medicine.list');
    Route::get('/medicine/{id}/edit', [MedicineController::class, 'edit']);
    Route::patch('/medicine-edit', [MedicineController::class, 'update'])->name('medicine.edit');
    Route::get('/medicine-delete/{id}', [MedicineController::class, 'destroy']);


    //Auto Authentication
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/default-dashboard', function () {
        return view('dashboard');
    })->name('default.dashboard');
});

require __DIR__.'/auth.php';