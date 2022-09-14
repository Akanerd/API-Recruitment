<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CandidateController;
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




Route::prefix('v1')->group(function () {
    //Route Api Resources Skill dan Jon
    Route::get('/Candidate', [CandidateController::class, 'index'])->name('Candidate.index');
    Route::post('/Candidate', [CandidateController::class, 'store'])->name('Candidate.store');
    Route::put('/Candidate/update/{id}', [CandidateController::class, 'update'])->name('Candidate.update');
    Route::delete('/Candidate/{Candidate}', [CandidateController::class, 'destroy'])->name('Candidate.destroy');
    //Route Api Resources Skill dan Jon
    Route::apiResources([
        'Skill' => SkillController::class,
        'Job' => JobController::class,
    ]);
});
