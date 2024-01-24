<?php

use App\Http\Controllers\api\ApiController;
use App\Http\Controllers\api\CourseController;
use App\Http\Controllers\api\GroupController;
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
//Start First API Routes

Route::get('/dev', [ApiController::class, 'dev']);
Route::post('add/student', [ApiController::class, 'addStudent']);
Route::put('update/student/{id}', [ApiController::class, 'updateStudent']);
Route::delete('delete/student/{id}', [ApiController::class, 'deleteStudent']);

//End of First API Routes

// Start Course API Routes

Route::get('/course', [CourseController::class, 'course']);
Route::post('add/course', [CourseController::class, 'addCourse']);
Route::put('update/course/{id}', [CourseController::class, 'updateCourse']);
Route::delete('delete/course/{id}', [CourseController::class, 'deleteCourse']);

// End of Course API Routes

// Start Group API Routes

Route::get('/group', [GroupController::class, 'group']);
Route::post('add/group', [GroupController::class, 'addGroup']);
Route::put('update/group/{id}', [GroupController::class, 'updateGroup']);
Route::delete('delete/group/{id}', [GroupController::class, 'deleteGroup']);

// End of Group API Routes


