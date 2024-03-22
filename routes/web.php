<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Auth\Notifications\ResetPassword;

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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('index');
Route::get('/informations', [App\Http\Controllers\WelcomeController::class, 'informations'])->name('informations');
Route::get('/products', [App\Http\Controllers\WelcomeController::class, 'products'])->name('products');
Route::get('product-detail/{id}', [ App\Http\Controllers\DetailController::class,'productdetail']);
Route::get('product-detail/{id}', [ App\Http\Controllers\DetailController::class,'showother']);
Route::get('information-detail/{id}', [ App\Http\Controllers\DetailController::class,'informationdetail']);
Route::get('/infosearch', [App\Http\Controllers\SearchController::class, 'infosearch'])->name('infosearch');
Route::get('/productsearch', [App\Http\Controllers\SearchController::class, 'productsearch'])->name('productsearch');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'view'])->name('cart.view');
    Route::put('/cart/{id}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{id}', [App\Http\Controllers\CartController::class, 'delete'])->name('cart.delete');
    Route::get('check-out/{id}', [ App\Http\Controllers\ChekoutController::class,'view'])->name('checkout');
    Route::put('/checkout/update/{id}', [ App\Http\Controllers\ChekoutController::class,'update'])->name('checkout.update');
    Route::get('direct-check-out/{id}', [ App\Http\Controllers\ChekoutController::class,'directview']);
    Route::get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history.view');
    Route::post('/history/add', [App\Http\Controllers\HistoryController::class, 'addToHistory'])->name('history.add');

    Route::get('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [App\Http\Controllers\ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::middleware(['auth','authadmin'])->group(function () {
    Route::get('/create', [App\Http\Controllers\Admin\UploadController::class, 'create'])->name('product.create');
    Route::post('/upload', [App\Http\Controllers\Admin\UploadController::class, 'store'])->name('store.product');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
 
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Auth::routes();
