<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SclassController;
use App\Http\Controllers\Api\SubjectController;
use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentController;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   // return $request->user();
//});

Route::get('/class', [SclassController::class, 'index']);

Route::post('/class/store', [SclassController::class, 'store']);

Route::get('/class/edit/{id}', [SclassController::class, 'edit']);

Route::post('class/update/{id}', [SclassController::class, 'update']);

Route::get('class/delete/{id}', [SclassController::class, 'delete']);

//Subject class routes

Route::get('/subject', [SubjectController::class, 'index']);

Route::post('/subject/store', [SubjectController::class, 'store']);

Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']);

Route::post('subject/update/{id}', [SubjectController::class, 'update']);

Route::get('subject/delete/{id}', [SubjectController::class, 'delete']);

//Section class routes

Route::get('/section', [SectionController::class, 'index']);

Route::post('/section/store', [SectionController::class, 'store']);

Route::get('/section/edit/{id}', [SectionController::class, 'edit']);

Route::post('section/update/{id}', [SectionController::class, 'update']);

Route::get('section/delete/{id}', [SectionController::class, 'delete']);

//Student class routes

Route::get('/student', [StudentController::class, 'index']);

Route::post('/student/store', [StudentController::class, 'store']);

Route::get('/student/edit/{id}', [StudentController::class, 'edit']);

Route::post('student/update/{id}', [StudentController::class, 'update']);

Route::get('student/delete/{id}', [StudentController::class, 'delete']);




