<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavigateController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResourcesController;
use App\Http\Controllers\MualafController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ProgressDailyController;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route :: get('/home',[HomeController::class,'index'])->middleware(['auth'])->name('home');



//Route::get('post',[HomeController::class,'admin'])->middleware(['auth','admin'])->name('admin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','role'])->group(function () {
    // Register Section//
    Route::get('/manage-user/list', [UserController::class, 'index'])->name('list_users');
    Route::post('/manage-user/create', [UserController::class, 'store'])->name('user.add');
    Route::get('/manage-user/{id}/edit', [UserController::class, 'edit'])->name('admin.edit');
    Route::put('/manage-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/manage-user/{id}/show', [UserController::class, 'view'])->name('admin.view');
    Route::delete('/manage-user/{id}', [UserController::class, 'destroy'])->name('user.delete');
});

Route::middleware(['auth','role'])->group(function () {
    // Event Section// 
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{id}', [EventController::class, 'update'])->name('event.update');
    Route::get('/event/{id}/view', [EventController::class, 'view'])->name('event.view');
    Route::delete('/event/{id}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/event/event-list', [EventController::class, 'indexUser'])->name('event.index-user');
    Route::get('/event/{id}/view-info', [EventController::class, 'eventInfo'])->name('view-event');
    Route::match(['get', 'post'],'/event/{id}/download', [EventController::class, 'downloadFile'])->name('event.download');
    Route::match(['get', 'post'],'/event/{id}/viewFile', [EventController::class, 'viewFile'])->name('event.viewfile');
});

Route::middleware(['auth', 'role'])->group(function () {
    // Resources Section// 
    Route::get('/resources', [ResourcesController::class, 'index'])->name('resources.index');
    Route::get('/resources/create', [ResourcesController::class, 'create'])->name('resources.create');
    Route::post('/resources', [ResourcesController::class, 'store'])->name('resources.store');
    Route::get('/resources/{id}/edit', [ResourcesController::class, 'edit'])->name('resources.edit');
    Route::put('/resources/{id}', [ResourcesController::class, 'update'])->name('resources.update');
    Route::get('/resources/{id}/view', [ResourcesController::class, 'view'])->name('resources.view');
    Route::delete('/resources/{id}', [ResourcesController::class, 'destroy'])->name('resources.destroy'); 
    Route::get('/resources/resources-list', [ResourcesController::class, 'indexUser'])->name('resources.index-user');
    Route::get('/resources/{id}/view-info', [ResourcesController::class, 'viewlist'])->name('view-resources'); 
    Route::match(['get', 'post'],'/resources/{id}/download', [ResourcesController::class, 'downloadFile'])->name('resources.download');
    Route::match(['get', 'post'],'/resources/{id}/viewFile', [ResourcesController::class, 'viewFile'])->name('resources.viewfile');
});

Route::middleware(['auth', 'role'])->group(function () {
    // Register Mualaf Section//
    Route::get('/mualaf', [MualafController::class, 'index'])->name('mualaf.index');
    Route::post('/mualaf/create', [MualafController::class, 'store'])->name('mualaf.add');
    Route::get('/mualaf/{id}/edit', [MualafController::class, 'edit'])->name('mualaf.edit');
    Route::put('/mualaf/{id}', [MualafController::class, 'update'])->name('mualaf.update');
    Route::get('/mualaf/{id}/show', [MualafController::class, 'view'])->name('mualaf.view');
    Route::delete('/mualaf/{id}', [MualafController::class, 'destroy'])->name('mualaf.delete');
    Route::get('/mualaf/list', [MualafController::class, 'Mualaflist'])->name('mualaf.list');
    Route::get('/mualaf/{id}/mualaf-info', [MualafController::class, 'viewlist'])->name('mualaf.viewInfo');

});

Route::middleware(['auth', 'role'])->group(function () {
    
    Route::get('/journals', [JournalController::class, 'index'])->name('journals.index');
    Route::get('/journals/create', [JournalController::class, 'create'])->name('journals.create');
    Route::post('/journals/store', [JournalController::class, 'store'])->name('journals.store');
    Route::get('/journals/{id}/edit', [JournalController::class, 'edit'])->name('journals.edit');
    Route::put('/journals/{id}', [JournalController::class, 'update'])->name('journals.update');
    Route::get('/journals/{id}/view', [JournalController::class, 'view'])->name('journal.view');
    Route::match(['get', 'post'],'/journals/{id}/download', [JournalController::class, 'downloadFile'])->name('journals.download');
    Route::match(['get', 'post'],'/journals/{id}/viewFile', [JournalController::class, 'viewFile'])->name('journals.viewfile');
    Route::delete('/journals/{id}', [JournalController::class, 'destroy'])->name('journals.destroy');
});

Route::middleware(['auth','role'])->group(function () {
    // Clock-in Clock-out Section//
    Route::get('/attendance/daie', [AttendanceController::class, 'indexDaie'])->name('attendance.index-daie');
    Route::get('/attendance/mentor', [AttendanceController::class, 'indexMentor'])->name('attendance.index-mentor');
    Route::get('/attendance/mualaf', [AttendanceController::class, 'indexMualaf'])->name('attendance.index-mualaf');
    Route::get('/attendance/list/', [AttendanceController::class, 'listAttendanceUser'])->name('attendance.list-user');
    Route::get('/attendance/report', [AttendanceController::class, 'ReportAttendance'])->name('attendance.list');
    Route::post('/attendance/clock-in', [AttendanceController::class, 'clockIn'])->name('clock-in');
    Route::post('/attendance/clock-out', [AttendanceController::class, 'clockOut'])->name('clock-out');
});

Route::middleware(['auth', 'role'])->group(function () {
    
    Route::get('/daily-progress', [ProgressDailyController::class, 'index'])->name('dailyprogress.index');
    Route::get('/daily-progress/create', [ProgressDailyController::class, 'create'])->name('dailyprogress.create');
    Route::post('/daily-progress/store', [ProgressDailyController::class, 'store'])->name('dailyprogress.store');
    Route::get('/daily-progress/{id}/edit', [ProgressDailyController::class, 'edit'])->name('dailyprogress.edit');
    Route::put('/daily-progress/{id}', [ProgressDailyController::class, 'update'])->name('dailyprogress.update');
    Route::get('/daily-progress/{id}/view', [ProgressDailyController::class, 'view'])->name('dailyprogress.view');
    Route::match(['get', 'post'],'/daily-progress/{id}/download', [ProgressDailyController::class, 'downloadFile'])->name('dailyprogress.download');
    Route::match(['get', 'post'],'/daily-progress/{id}/viewFile', [ProgressDailyController::class, 'viewFile'])->name('dailyprogress.viewfile');
    Route::delete('/daily-progress/{id}', [ProgressDailyController::class, 'destroy'])->name('dailyprogress.destroy');
});

require __DIR__.'/auth.php';
