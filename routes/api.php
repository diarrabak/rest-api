<?php

// use App\Http\Controllers\Api\AcademicgroupController;
// use App\Http\Controllers\Api\ArticleController;
// use App\Http\Controllers\Api\CourseController;
// use App\Http\Controllers\Api\DepartmentController;
// use App\Http\Controllers\Api\EquipmentController;
// use App\Http\Controllers\Api\InformationController;
// use App\Http\Controllers\Api\JobopeningController;
// use App\Http\Controllers\Api\LaboratoryController;
// use App\Http\Controllers\Api\ResearchgroupController;
// use App\Http\Controllers\Api\RoleController;
// use App\Http\Controllers\Api\SpecializationController;
// use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\SpecializationController;
use App\Http\Controllers\Api\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => 'App\Http\Controllers\Api'], function () {  //Namespace here allow to not copy each controller namespace individually

    Route::group(['middleware' => 'auth:sanctum'], function () {  //Protecting some routes
        Route::apiResource("articles", ArticleController::class);
        Route::post('logout', [UserController::class, 'logout']);
    });
    Route::apiResource("departments", DepartmentController::class);
    Route::apiResource("academicgroups", AcademicgroupController::class);
    Route::apiResource("courses", CourseController::class);

    Route::group(['prefix' => 'departments'], function () {
        // Route::apiResource("/", DepartmentController::class);
        Route::group(['prefix' => '{department}'], function () {
            Route::get('specializations', [DepartmentController::class, 'departmentSpecializations']);
            Route::get('users', [DepartmentController::class, 'departmentUsers']);
        });
    });

    Route::apiResource("equipement", EquipmentController::class);
    Route::apiResource("information", InformationController::class);
    Route::apiResource("jobopenings", JobopeningController::class);
    Route::apiResource("laboratories", LaboratoryController::class);
    Route::apiResource("researchgroups", ResearchgroupController::class);
    Route::apiResource("roles", RoleController::class);
    Route::apiResource("specializations", SpecializationController::class);
    Route::apiResource("users", UserController::class);

 

});
Route::post('login', [UserController::class, 'login']);

