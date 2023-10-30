<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\TypesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\TestController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SkillsController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Backend\SchoolsController;
use App\Http\Controllers\Backend\TalentsController;
use App\Http\Controllers\Backend\SubjectsController;
use App\Http\Controllers\Backend\WebSkillController;
use App\Http\Controllers\Backend\NewsYouthController;
use App\Http\Controllers\Frontend\ColleagueController;
use App\Http\Controllers\Frontend\InstituteController;
use App\Http\Controllers\Backend\AdminSliderController;
use App\Http\Controllers\Backend\DepartmentsController;
use App\Http\Controllers\Frontend\UniversityController;
use App\Http\Controllers\Frontend\HistoryUserController;
use App\Http\Controllers\Backend\WebDepartmentController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\UniversityDetailController\RuaDetailController;
use App\Http\Controllers\Backend\AdminContactController;
use App\Http\Controllers\Frontend\UserContactController;


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
// Route::get('/home/slider',[SliderController::class, 'HomeSlider'])->name('home.slider');
// Route::get('/add/slider',[SliderController::class, 'AddSlider'])->name('add.slider');
// Route::post('/store/slider',[SliderController::class, 'StoreSlider'])->name('store.slider');

Route::get('/list',[AdminSliderController::class, 'index'])->name('slider.index');
Route::get('/create',[AdminSliderController::class, 'create'])->name('slider.create');
Route::post('/store/slider',[AdminSliderController::class, 'store'])->name('slider.store');
Route::get('/edit/{id}',[AdminSliderController::class, 'edit'])->name('slider.edit');
Route::post('/update',[AdminSliderController::class, 'update'])->name('slider.update');
Route::get('/inactive/{id}', [AdminSliderController::class, 'inactive'])->name('slider.inactive');
Route::get('/active/{id}', [AdminSliderController::class, 'active'])->name('slider.active');
Route::get('/delete/{id}', [AdminSliderController::class, 'delete'])->name('slider.delete');

});


// Start newsyouth List
Route::prefix('newsyouth')->group(function () {
    Route::get('/', [NewsYouthController::class, 'index'])->name('newsyouth-list');
    Route::get('/detail/{subject}', [NewsYouthController::class, 'detail'])->name('newsyouth-detail');
    Route::get('/create', [NewsYouthController::class, 'create'])->name('newsyouth.create');
    Route::post('/store', [NewsYouthController::class, 'store'])->name('newsyouth.store');
    Route::get('/update/{subject}', [NewsYouthController::class, 'updateSubjectForm'])->name('newsyouth-update-form');
    Route::post('/update/{subject}', [NewsYouthController::class, 'updateSubject'])->name('newsyouth-update');
    Route::delete('/delete', [NewsYouthController::class, 'delete'])->name('subject-delete');
 });
 // End newsyouth

// Start Web Department
Route::prefix('web-department')->group(function () {
    Route::get('/', [WebDepartmentController::class, 'index'])->name('web_department.index');
    Route::get('/create', [WebDepartmentController::class, 'create'])->name('web_department.create');
    Route::post('/store', [WebDepartmentController::class, 'store'])->name('web_department.store');
    Route::get('/edit/{id}', [WebDepartmentController::class, 'edit'])->name('web_department.edit');
    Route::post('/update', [WebDepartmentController::class, 'update'])->name('web_department.update');
    Route::get('/inactive/{id}', [WebDepartmentController::class, 'inactive'])->name('web_department.inactive');
    Route::get('/active/{id}', [WebDepartmentController::class, 'active'])->name('web_department.active');
    // skill assign
    Route::post('/assign', [WebDepartmentController::class, 'assign'])->name('web_department.assign');

    

});
// End  Web Department
// Start Web Skill
 Route::prefix('web-skill')->group(function () {
    Route::get('/', [WebSkillController::class, 'index'])->name('web_skill.index');
    Route::get('/create', [WebSkillController::class, 'create'])->name('web_skill.create');
    Route::post('/store', [WebSkillController::class, 'store'])->name('web_skill.store');
    Route::get('/edit/{id}', [WebSkillController::class, 'edit'])->name('web_skill.edit');
    Route::post('/update', [WebSkillController::class, 'update'])->name('web_skill.update');
    Route::get('/inactive/{id}', [WebSkillController::class, 'inactive'])->name('web_skill.inactive');
    Route::get('/active/{id}', [WebSkillController::class, 'active'])->name('web_skill.active');

});
// End  Web Skill
// Start Contact Messages
Route::prefix('contact-message')->group(function () {
    Route::get('/', [AdminContactController::class, 'index'])->name('contact_message.index');
    Route::get('/read/{id}', [AdminContactController::class, 'read'])->name('contact_message.read');
    Route::get('/view/{id}', [AdminContactController::class, 'view'])->name('contact_message.view');
    Route::get('/delete/{id}', [AdminContactController::class, 'deleted'])->name('contact_message.delete');
});
// End  Contact Messages
// Start Report
 Route::prefix('report')->group(function () {
    Route::get('/index', [ReportController::class, 'index'])->name('backend.report.index');
});
// End  Report



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
Route::post('/store/talent', [HistoryUserController::class,'studentSubmitSkill'])->name('frontend.student.submit');

Route::post('/store-message', [HistoryUserController::class, 'submitstore']);

// Start Report
Route::prefix('user-contact-request')->group(function () {
    Route::post('/index', [UserContactController::class, 'submitstore'])->name('frontend.submit.store');
});
// End  Report