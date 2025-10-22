<?php

use App\Http\Controllers\Api\CandidatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// creer les routes RESTful(index,store,show,create,destroy)
Route::apiResource('candidats', CandidatController::class);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
