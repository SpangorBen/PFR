<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\CategoryController;
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

//Auth
Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

//Services
Route::middleware('auth:api')->group(function () {
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);
    Route::post('/services', [ServiceController::class, 'store']);
    Route::put('/services/{id}', [ServiceController::class, 'update']);
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);
    Route::get('/service/statistics', [ServiceController::class, 'serviceStatistics']);

});

Route::post('/services/search', [ServiceController::class, 'search']);
Route::post('/services/filterByCategory', [ServiceController::class, 'filterByCategory']);
Route::post('/services/sortByPrice', [ServiceController::class, 'sortByPrice']);

//Company
Route::post('/company', [CompanyController::class, 'store']);
Route::patch('/company/{id}', [CompanyController::class, 'recruitWorker']);
Route::patch('/companies/{companyId}/workers/{workerId}/upgrade-to-staff', [CompanyController::class, 'upgradeWorkerToStaff']);
Route::patch('/companies/{companyId}/workers/{workerId}/accept', [CompanyController::class, 'acceptNewWorker']);
Route::patch('/companies/{companyId}', [CompanyController::class, 'updateCompanyProfile']);
Route::get('/companies/{companyId}/workers', [CompanyController::class, 'manageWorkers']);
Route::get('/companies/{companyId}/service-statistics', [CompanyController::class, 'getServiceStatistics']);
Route::post('/companies/request-to-start', [CompanyController::class, 'sendRequestToStartCompany']);

//Admin
Route::get('admin/all-requests', [AdminController::class, 'displayCompanyrequest']);
Route::put('/admin/accept-company/{id}', [AdminController::class, 'acceptCompanyRequest']);
Route::put('/admin/decline-company/{id}', [AdminController::class, 'declineCompanyRequest']);

//Reservations
Route::middleware('auth:api', 'role:user')->group(function () {
    Route::post('/reservations', [ReservationController::class, 'create']);
    Route::put('/reservations/{id}', [ReservationController::class, 'update']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'delete']);
    Route::get('/reservations/{id}', [ReservationController::class, 'show']);
    Route::get('/reservations', [ReservationController::class, 'index']);
});
Route::put('/reservations/{id}/complete', [ReservationController::class, 'markAsCompleted']);


//Rewards
Route::get('/rewards', [RewardController::class, 'index']);
Route::get('/rewards/{id}', [RewardController::class, 'show']);
Route::post('/rewards', [RewardController::class, 'store']);
Route::put('/rewards/{id}', [RewardController::class, 'update']);
Route::delete('/rewards/{id}', [RewardController::class, 'destroy']);
Route::post('/redeem-reward/{rewardId}', [RewardController::class, 'redeemReward']);


//Reviews
// Route::get('/services/{serviceId}/reviews', [ReviewController::class, 'index']);

Route::post('/category', [CategoryController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
