<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\UniversityController;
use App\Http\Controllers\Frontend\InstituteController;
use App\Http\Controllers\Frontend\ColleagueController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\Frontend\UniversityDetailController\RuaDetailController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\TypesController;
use App\Http\Controllers\Backend\SchoolsController;
use App\Http\Controllers\Backend\DepartmentsController;
use App\Http\Controllers\Backend\SubjectsController;
use App\Http\Controllers\NewsYouthController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\SliderController;

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


        // Start Type List
        Route::prefix('types')->group(function () {
            Route::get('/', [TypesController::class, 'index'])->name('type-list');
            Route::get('/detail/{type}', [TypesController::class, 'detail'])->name('type-detail');
            Route::get('/create', [TypesController::class, 'createTypeForm'])->name('type-create-form');
            Route::post('/create', [TypesController::class, 'createType'])->name('type-create');
            Route::get('/update/{type}', [TypesController::class, 'updateTypeForm'])->name('type-update-form');
            Route::post('/update/{type}', [TypesController::class, 'updateType'])->name('type-update');
            Route::delete('/delete', [TypesController::class, 'delete'])->name('type-delete');
        });
        // End Type List

        // Start School List
        Route::prefix('schools')->group(function () {
            Route::get('/', [SchoolsController::class, 'index'])->name('school-list');
            Route::get('/detail/{school}', [SchoolsController::class, 'detail'])->name('school-detail');
            Route::get('/create', [SchoolsController::class, 'createSchoolForm'])->name('school-create-form');
            Route::post('/create', [SchoolsController::class, 'createSchool'])->name('school-create');
            Route::get('/update/{school}', [SchoolsController::class, 'updateSchoolForm'])->name('school-update-form');
            Route::post('/update/{school}', [SchoolsController::class, 'updateSchool'])->name('school-update');
            Route::delete('/delete', [SchoolsController::class, 'delete'])->name('school-delete');
        });
        // End School List

        // Start Department List
        Route::prefix('departments')->group(function () {
            Route::get('/', [DepartmentsController::class, 'index'])->name('department-list');
            Route::get('/detail/{department}', [DepartmentsController::class, 'detail'])->name('department-detail');
            Route::get('/create', [DepartmentsController::class, 'createDepartmentForm'])->name('department-create-form');
            Route::post('/create', [DepartmentsController::class, 'createDepartment'])->name('department-create');
            Route::get('/update/{department}', [DepartmentsController::class, 'updateDepartmentForm'])->name('department-update-form');
            Route::post('/update/{department}', [DepartmentsController::class, 'updateDepartment'])->name('department-update');
            Route::delete('/delete', [DepartmentsController::class, 'delete'])->name('department-delete');
        });
        // End Department List



        // sliders
        Route::prefix('slider')->group(function () {
        Route::get('/home/slider',[SliderController::class, 'HomeSlider'])->name('home.slider');
        Route::get('/add/slider',[SliderController::class, 'AddSlider'])->name('add.slider');
        Route::post('/store/slider',[SliderController::class, 'StoreSlider'])->name('store.slider');
        });

        // Start Subject List
        Route::prefix('subjects')->group(function () {
            Route::get('/', [SubjectsController::class, 'index'])->name('subject-list');
            Route::get('/detail/{subject}', [SubjectsController::class, 'detail'])->name('subject-detail');
            Route::get('/create', [SubjectsController::class, 'createSubjectForm'])->name('subject-create-form');
            Route::post('/create', [SubjectsController::class, 'createSubject'])->name('subject-create');
            Route::get('/update/{subject}', [SubjectsController::class, 'updateSubjectForm'])->name('subject-update-form');
            Route::post('/update/{subject}', [SubjectsController::class, 'updateSubject'])->name('subject-update');
            Route::delete('/delete', [SubjectsController::class, 'delete'])->name('subject-delete');
        });
        // End Subject List

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
