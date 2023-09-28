<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\TypesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\Backend\SkillsController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Backend\SchoolsController;
use App\Http\Controllers\Backend\TalentsController;
use App\Http\Controllers\Backend\SubjectsController;
use App\Http\Controllers\Frontend\AboutUsController as FrontendAboutUsController;
use App\Http\Controllers\Frontend\ColleagueController;
use App\Http\Controllers\Frontend\InstituteController;
use App\Http\Controllers\Backend\DepartmentsController;
use App\Http\Controllers\Frontend\UniversityController;
use App\Http\Controllers\Frontend\HistoryUserController;
use App\Http\Controllers\Frontend\UniversityDetailController\RuaDetailController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\NewsYouthController;

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

// 1. home page
// 2. view schools by type
// 3. view school detail (schoolId, pass a selected departmentId param)
Route::get('/', function () {
    return redirect('/home');
});

// sliders
Route::get('/home-slider', [PagesController::class, 'index']);


Route::get('/home', [PagesController::class, 'index']);
Route::get('/type/{type}', [PagesController::class, 'viewSchoolsByType'])->name('schools');
Route::get('/school-detail/{school}', [PagesController::class, 'schoolDetail']);
Route::get('/about', [AboutUsController::class, 'index']);

// Start Login Page
Route::get('/admin/login', [AuthController::class, 'login'])->name('login');

//Route::get('/admin/login', [AuthController::class, 'login'])->name('login');

Route::post('/admin/validate-form', [AuthController::class, 'validateForm'])->name('validate');
Route::middleware(['auth'])->group(function () {

    // Start Check Admin
    Route::prefix('admin')->group(function () {

        Route::get('dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::prefix('users')->middleware(['checkAdmin'])->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('user-list');
            Route::get('/create', [UsersController::class, 'createUserForm'])->name('user-create-form');
            Route::post('/create', [UsersController::class, 'createUser'])->name('user-create');
            Route::get('/block/{user}', [UsersController::class, 'block'])->name('user-block');
            Route::get('/unblock/{user}', [UsersController::class, 'unblock'])->name('user-unblock');
            Route::delete('/delete', [UsersController::class, 'delete'])->name('user-delete');
            Route::get('/update/{user}', [UsersController::class, 'updateUserForm'])->name('user-update-form');
            Route::post('/update/{user}', [UsersController::class, 'updateUser'])->name('user-update');
            Route::get('/detail/{user}', [UsersController::class, 'detail'])->name('user-detail');
        });
        // End Check Admin
// Start Skill
Route::prefix('skill')->group(function () {
    Route::get('/', [SkillsController::class, 'index'])->name('skill.index');
    Route::get('/create', [SkillsController::class, 'create'])->name('skill.create');
    Route::post('/store', [SkillsController::class, 'store'])->name('skill.store');
    Route::get('/edit/{id}', [SkillsController::class, 'edit'])->name('skill.edit');
    Route::post('/update', [SkillsController::class, 'update'])->name('skill.update');
    Route::get('/inactive/{id}', [SkillsController::class, 'inactive'])->name('skill.inactive');
    Route::get('/active/{id}', [SkillsController::class, 'active'])->name('skill.active');
    // skill assign
    Route::post('/assign', [SkillsController::class, 'assign'])->name('skill.assign');

});
// End Skill

// Start Talent
Route::prefix('talent')->group(function () {
    Route::get('/', [TalentsController::class, 'index'])->name('talent.index');
    Route::get('/create', [TalentsController::class, 'create'])->name('talent.create');
    Route::post('/store', [TalentsController::class, 'store'])->name('talent.store');
    Route::get('/edit/{id}', [TalentsController::class, 'edit'])->name('talent.edit');
    Route::post('/update', [TalentsController::class, 'update'])->name('talent.update');
    Route::get('/inactive/{id}', [TalentsController::class, 'inactive'])->name('talent.inactive');
    Route::get('/active/{id}', [TalentsController::class, 'active'])->name('talent.active');

});
// End Talent
// sliders
Route::prefix('slider')->group(function () {
Route::get('/home/slider',[SliderController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[SliderController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider',[SliderController::class, 'StoreSlider'])->name('store.slider');
});


// Start newsyouth List
Route::prefix('newsyouth')->group(function () {
    Route::get('/', [NewsYouthController::class, 'index'])->name('newsyouth-list');
    Route::get('/detail/{subject}', [NewsYouthController::class, 'detail'])->name('newsyouth-detail');
    Route::get('/create', [NewsYouthController::class, 'createNewsYouth'])->name('newsyouth-create-form');
    Route::post('/create', [NewsYouthController::class, 'createNewsYouth'])->name('newsyouth-create');
    Route::get('/update/{subject}', [NewsYouthController::class, 'updateSubjectForm'])->name('newsyouth-update-form');
    Route::post('/update/{subject}', [NewsYouthController::class, 'updateSubject'])->name('newsyouth-update');
    Route::delete('/delete', [NewsYouthController::class, 'delete'])->name('subject-delete');
 });




});



});

// End Login Page


// Start check box skills

Route::get('/skillstest',function(){
return view('frontend.skillstest');

});

Route::post('/skillstest', [SkillsController::class,'insertSkill']);
Route::get('/show', [SkillsController::class,'showData']);

// Frontend

Route::get('/show-request-form', [HistoryUserController::class,'showForm'])->name('frontend.showForm');
Route::post('/store/talent', [HistoryUserController::class,'userSubmitTalent'])->name('frontend.submit.talent');
