<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\instructorRatingController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PacksDetailController;
use App\Http\Controllers\UserPackController;
use App\Http\Controllers\LibraryController;



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
// -----TRANG CHỦ-----
Route::get('/home', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

// -----ĐĂNG NHẬP-----
Route::get('/log-in', [UsersController::class, 'logIn'])->name('user.showlogin');
Route::post('/log-in', [UsersController::class, 'dangnhap'])->name('user.login');
Route::get('/log-out',[UsersController::class, 'logOut']);

// -----ĐĂNG KÝ-----
Route::get('/sign-up', [UsersController::class, 'signUp']);
Route::post('/create-user', [UsersController::class, 'create']);

// -----HỒ SƠ-----
Route::get('/profileUser', [UsersController::class, 'proFile']);
Route::post('/updateUser', [UsersController::class, 'updateProfile']);
Route::post('/updateCash', [UsersController::class, 'updateCash']);

// -----Instructor-----
Route::get('/instructor/{id?}', [InstructorController::class, 'showInstructor'])->name('instructor.open');
Route::post('/ratingIns/{id?}', [instructorRatingController::class, 'ratingInsStar']);

// -----Search-----
Route::get('/search', [PacksDetailController::class, 'searchPack']);

// -----XEM THÊM KHOÁ HỌC-----
Route::prefix('/view-more')->group(function() {
    Route::get('/prime', [PacksDetailController::class, 'viewmoreP']);
    Route::get('/free', [PacksDetailController::class, 'viewmoreF']);
});

// -----TRẢ PHÍ-----
Route::get('ctqm-pack/{pack?}', [PacksDetailController::class, 'packOpen'])->name('pack.open');
Route::post('/add-pack/{pack?}', [UserPackController::class, 'create']);
Route::get('/update-process/{id?}', [UserPackController::class, 'updateProcess']);

// -----COMMENT-----
Route::post('/add-comment/{pack?}', [CommentsController::class, 'newComment']);
Route::get('/increase-vote/{id?}', [CommentsController::class, 'increaseVote']);
Route::get('/decrease-vote/{id?}', [CommentsController::class, 'decreaseVote']);
Route::get('/delete-comment/{id?}', [CommentsController::class, 'deleteComment']);

// -----CONTACT US-----
Route::get('/contact-us', function() {
    return view('contactus.contact');
});

// -----RATING-----
Route::post('/rating/{pack?}', [RatingsController::class, 'ratingStar']);

// -----Library-----
Route::get('CTQM-library/{id?}', [LibraryController::class, 'openLibrary']);

// Route::prefix('admin')->group(function() {
//     Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::resource('users', UsersController::class);
//     Route::resource('instructor', InstructorController::class);
//     Route::resource('prime_Packs', Prime_PacksController::class);
//     Route::resource('free_Packs', Free_PacksController::class);
//     Route::resource('comments', CommentsController::class);
//     Route::resource('ratings', RatingsController::class);
// });