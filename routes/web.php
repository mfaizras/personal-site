<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SocmedController;
use App\Http\Controllers\StarterController;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Socmed;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('starter')->group(function () {
    Route::get('/', [StarterController::class, 'index']);
    Route::post('/', [StarterController::class, 'store']);
    Route::get('/test', [StarterController::class, 'test']);
    // Route::get('/', );
});

Route::middleware('starter')->group(function () {
    Route::get('/', function () {
        return view('home', [
            'profile' => Profile::all(),
            'project' => Project::all(),
            'skill' => Skill::all(),
            'socmed' => Socmed::all()
        ]);
    });
    Route::get('message', [MessageController::class, 'message']);

    Route::prefix('panel')->group(function () {
        Route::get('/login', [PanelController::class, 'login'])->name('login');
        Route::post('/login', [PanelController::class, 'loginPost']);

        Route::middleware('auth')->group(function () {
            Route::get('/', [PanelController::class, 'index'])->middleware('auth');
            Route::get('/profile', [PanelController::class, 'profile']);
            Route::post('/profile', [PanelController::class, 'profileAction']);

            Route::get('/socmed', [SocmedController::class, 'index']);
            Route::post('/socmed', [SocmedController::class, 'store']);

            Route::get('/socmed/delete/{id}', [SocmedController::class, 'delete']);

            Route::resource('/projects', ProjectController::class)->except('show');

            Route::get('/skills', [SkillsController::class, 'index']);
            Route::post('/skills', [SkillsController::class, 'store']);
        });
    });
});
