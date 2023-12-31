<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("home");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(["auth"])->group(function () {
    Route::resource("users", UserController::class);
    Route::resource("contacts", ContactController::class);
    Route::resource("teens", TeenController::class);
    Route::resource("records", RecordController::class);
    Route::post('files/upload', [RecordController::class, "upload"]);

    Route::resource("attachments", AttachmentController::class);

    Route::get("mi-perfil", [UserController::class, "profile"])->name("profile");

    Route::resource("visits", VisitController::class);
});
