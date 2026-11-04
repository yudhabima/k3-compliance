<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicSite\LandingController;
use App\Http\Controllers\PublicSite\SimulationController;
use App\Http\Controllers\PublicSite\InfographicController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\IndicatorController;
use App\Http\Controllers\Admin\StandardController;
use App\Http\Controllers\Admin\AssessmentController;
use App\Http\Controllers\Admin\ReportController;

Route::redirect('/login', '/admin/login')->name('login');
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/tentang', [LandingController::class, 'about'])->name('about');
Route::get('/simulasi-k3', [SimulationController::class, 'create'])->name('simulation.create');
Route::post('/simulasi-k3', [SimulationController::class, 'store'])->middleware('throttle:10,1')->name('simulation.store');
Route::get('/hasil/{assessment:public_token}', [InfographicController::class, 'show'])->name('infographic.show');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:5,1')->name('login.submit');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/companies', CompanyController::class)->except(['show']);
        Route::resource('/indicators', IndicatorController::class)->except(['show']);
        Route::resource('/standards', StandardController::class)->except(['show']);
        Route::get('/assessments', [AssessmentController::class, 'index'])->name('assessments.index');
        Route::get('/assessments/{assessment}', [AssessmentController::class, 'show'])->name('assessments.show');
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/export', [ReportController::class, 'export'])->name('reports.export');
    });
});
