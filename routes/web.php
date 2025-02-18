<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ClinicsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DrugsController;
use App\Http\Controllers\IcdsController;
use App\Http\Controllers\PatientAppointmentRecordController;
use App\Http\Controllers\PatientDiagnoseController;
use App\Http\Controllers\ScheduleDoctorsController;
use App\Http\Controllers\ScheduleEventsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;



Route::middleware(['checkRole:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    });
    // Route khusus admin lainnya
});
Route::get('/', function () {
    return view('dashboard');
});
Route::view('/auth-login', 'auth.login');
Route::post('/api/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::view('/auth-register', 'auth.register');
Route::post('/api/register', [UserController::class, 'addUser'])->name('auth.register');
Route::view('/dashboard-user','dashboard.user');
Route::view('/surat-dokter','user.surat');
Route::view('/riwayat-pemeriksaan','user.riwayat');
Route::view('/medical-checkup','user.medical');
Route::view('/event','user.event');
Route::get('/api/user', [UserController::class, 'getUsers']);
Route::get('/api/user/{name}', [UserController::class, 'getUserByName']);
Route::get('/api/user/{id}', [UserController::class, 'getUserById']);
Route::put('/api/user/{id}', [UserController::class, 'updateUser']);
Route::delete('/api/user/{id}', [UserController::class, 'deleteUser']);

Route::get('/api/icd', [IcdsController::class, 'getIcds']);
Route::post('/api/icd', [IcdsController::class, 'create']);
Route::put('/api/icd/{id}', [IcdsController::class, 'updateIcds']);
Route::delete('/api/icd/{id}', [IcdsController::class, 'deleteIcds']);
Route::get('/api/icd/{search}', [IcdsController::class, 'searchIcds']);

Route::get('/api/clinic', [ClinicsController::class, 'getClinics']);
Route::post('/api/clinic', [ClinicsController::class, 'create']);
Route::put('/api/clinic/{id}', [ClinicsController::class, 'updateClinics']);
Route::delete('/api/clinic/{id}', [ClinicsController::class, 'deleteClinics']);
Route::get('/api/clinic/{search}', [ClinicsController::class, 'searchClinics']);

Route::get('/api/drug', [DrugsController::class, 'getDrugs']);
Route::post('/api/drug', [DrugsController::class, 'create']);
Route::put('/api/drug/{id}', [DrugsController::class, 'updateDrugs']);
Route::delete('/api/drug/{id}', [DrugsController::class, 'deleteDrugs']);
Route::get('/api/drug/{search}', [DrugsController::class, 'searchDrugs']);

Route::get('api/appointment',[AppointmentsController::class, 'getAppointments']);
Route::post('api/appointment',[AppointmentsController::class, 'create']);
Route::put('api/appointment/{id}',[AppointmentsController::class, 'update']);
Route::delete('api/appointment/{id}',[AppointmentsController::class, 'delete']);
Route::get('api/appointment/user',[AppointmentsController::class, 'getAppointmentsByUserID']);
Route::get('/api/appointment/record/user', [PatientAppointmentRecordController::class, 'getByUserId']);//riwayat pemeriksaan

Route::get('/api/schedule/doctor',[ScheduleDoctorsController::class, 'getScheduleDoctors']);//jadwal dokter
Route::post('/api/schedule/doctor',[ScheduleDoctorsController::class, 'create']);
Route::put('/api/schedule/doctor/{id}',[ScheduleDoctorsController::class, 'updateScheduleDoctor']);
Route::delete('/api/schedule/doctor/{id}',[ScheduleDoctorsController::class, 'deleteScheduleDoctor']);
Route::get('/api/schedule/doctor/{id}',[ScheduleDoctorsController::class, 'getScheduleDoctorsByIdr']);

Route::get('/api/schedule/event',[ScheduleEventsController::class, 'getScheduleEvents']);//jadwal event
Route::post('/api/schedule/event',[ScheduleEventsController::class, 'create']);
Route::put('/api/schedule/event/{id}',[ScheduleEventsController::class, 'update']);
Route::delete('/api/schedule/event/{id}',[ScheduleEventsController::class, 'delete']);
Route::get('/api/schedule/event/user',[ScheduleEventsController::class, 'getScheduleEventByUserID']);//yang ini masih ragu dipakai atau enggak

Route::get('api/diagnose/user', [PatientDiagnoseController::class, 'getByUserId']);//medical check up dan surat dokter