<?php
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('jobs/store', [JobController::class, 'store'])->name('jobs.store');
Route::get('/jobs/index/{id}', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/show/{id}', [JobController::class, 'show'])->name('jobs.show');
Route::put('/jobs/update/{id}', [JobController::class, 'update'])->name('jobs.update');
Route::delete('jobs/destroy/{id}', [JobController::class, 'destroy'])->name('jobs.destroy');
Route::get('/jobsall', [JobController::class, 'jobsall'])->name('jobs.jobsall');

//-------------------------------------------------------------------------------------------------------------
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/show/{id}', [EmployeeController::class, 'show'])->name('employees.show');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');
Route::post('/employees/login', [EmployeeController::class, 'login'])->name('employees.login');
Route::delete('/employees/destroy/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/update/{id}', [EmployeeController::class, 'update'])->name('employees.update');

//-------------------------------------------------------------------------------------------------------------
Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
Route::post('/candidates/store', [CandidateController::class, 'store'])->name('candidates.store');
Route::post('/candidates/login', [CandidateController::class, 'login'])->name('candidates.login');
Route::get('candidates/show/{id}', [CandidateController::class, 'show'])->name('candidates.show');
Route::put('candidates/update/{id}', [CandidateController::class, 'update'])->name('candidates.update');
Route::delete('candidates/destroy/{id}', [CandidateController::class, 'destroy'])->name('candidates.destroy');

//-------------------------------------------------------------------------------------------------------------
Route::post('applications/store', [ApplicationController::class, 'store'])->name('applications.store');
Route::put('applications/update/{id}', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');
Route::get('/applications/jobs/applications/{id}', [ApplicationController::class, 'showJobAndApplications'])->name('jobs.showWithApplications');
Route::delete('applications/destroy/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy');

//-------------------------------------------------------------------------------------------------------------
Route::post('admin/store', [AdminController::class, 'store']);
Route::post('admin/login', [AdminController::class, 'login']);
