<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::put('/services/{id}', [ServiceController::class, 'update']);
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);
});

Route::post('/services/search', [ServiceController::class, 'search']);
Route::post('/services/filterByCategory', [ServiceController::class, 'filterByCategory']);
Route::post('/services/sortByPrice', [ServiceController::class, 'sortByPrice']);


Route::post('/company', [CompanyController::class, 'store']);
Route::patch('/company/{id}', [CompanyController::class, 'recruitWorker']);
Route::patch('/companies/{companyId}/workers/{workerId}/upgrade-to-staff', [CompanyController::class, 'upgradeWorkerToStaff']);
Route::patch('/companies/{companyId}/workers/{workerId}/accept', [CompanyController::class, 'acceptNewWorker']);
Route::patch('/companies/{companyId}', [CompanyController::class, 'updateCompanyProfile']);
Route::get('/companies/{companyId}/workers', [CompanyController::class, 'manageWorkers']);
Route::get('/companies/{companyId}/service-statistics', [CompanyController::class, 'getServiceStatistics']);
Route::post('/companies/request-to-start', [CompanyController::class, 'sendRequestToStartCompany']);

Route::get('admin/all-requests', [AdminController::class, 'displayCompanyrequest']);
Route::put('/admin/accept-company/{id}', [AdminController::class, 'acceptCompanyRequest']);
Route::put('/admin/decline-company/{id}', [AdminController::class, 'declineCompanyRequest']);

