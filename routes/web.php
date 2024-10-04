<?php

// use App\Http\Controllers\{
//     AddTocardController,
//     AdminController,
//     Auth\RegisterController,
//     RController,
//     userController,
//     WishlistController,
//     FeedbackController,
//     filtrageController,
//     orderController,
//     UploadController
// };
// use App\Models\Formation;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\ResetPasswordController;
// use App\Http\Controllers\Auth\ForgotPasswordController;
// use App\Http\Controllers\SettingController;

// use App\Http\Controllers\CartController;


// /*
// |--------------------------------------------------------------------------
// | Web Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register web routes for your application.
// |
// */

// Route::get('/', function () {
//     $courses = Formation::limit(4)->get();
//     return view('Home/Home', ['courses' => $courses]);
// })->name('homepage');

// Route::view('/About', 'About/About')->name('about');
// Route::view('/Contact', 'Contact/Contact')->name('contact');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// // Authentication Routes...

// Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginform');
// Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('registerform');
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
// Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// Route::post('password/reset', [ResetPasswordController::class, 'reset']);
// Route::post('password/update', [ResetPasswordController::class, 'update'])->name('password.update');



// // Resource Controller Routes
// Route::post('/storeAfterValidation', [RController::class, 'storeAfterValidation']);
// Route::middleware('useruser')->group(function () {
//     Route::get('/ajouter', [RController::class, 'create'])->name('ajouter');
//     Route::post('/pendingformations', [RController::class, 'store'])->name('str');

//     // Wishlist Routes
//     Route::post('/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
//     Route::delete('/wishlist', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

//     // Feedback Routes
//     Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->name('submit.feedback');

//     // User Controller Routes
//     Route::get('/wishelist', [userController::class, 'wishelist'])->name('wishelist');
//     Route::get('/formateur', [userController::class, 'formateur'])->name('formateur');
//     Route::get('/courses', [userController::class, 'courses'])->name('courses');
//     Route::get('/courses/search', [userController::class, 'search'])->name('courses.search');
//     Route::get('/rate/{id}', [userController::class, 'rateview'])->name('rateview');
//     Route::get('/formateur/courses', [userController::class, 'formateurCourses'])->name('formateurCourses');
//     Route::get('/formateur/dashboard', [userController::class, 'formateurDashboard'])->name('formateurDashboard');
//     Route::get('/notifications', [userController::class, 'notifications'])->name('notifications');
//     Route::delete('/deleteNotification/{id}', [userController::class, 'deleteNotification'])->name('deleteNotification');
//     Route::get('/notifications/count', [UserController::class, 'notificationsCount']);
// });

// // Cart Routes
// // Route::prefix('cart')->group(function () {
// //     Route::get('addc/{id}', [AddTocardController::class, 'addToCart']);
// //     Route::get('/', [AddTocardController::class, 'cart'])->name('cart');
// //     Route::get('clear', [AddTocardController::class, 'clearCart']);
// // });

// // Order Routes
// Route::get('/order/{id_formation}/{prix}', [orderController::class, 'AddToOrder'])->name('order.add');

// // Admin Routes
// Route::get('/verify/{id}', [AdminController::class, 'verify'])->name('verify');
// Route::middleware('adminuser')->group(function () {
//     Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
//     Route::get('/verify/{id}', [AdminController::class, 'verify'])->name('verify');
//     Route::get('/refuser/{id}/{id_user}', [AdminController::class, 'refuser'])->name('refuser');
//     Route::get('/verifyVideos/{id_video}', [AdminController::class, 'verifyVideos'])->name('verifyVideos');
// });


// // Filtrage Routes

// Route::get('/filterMinMax', [filtrageController::class, 'filterMinMax'])->name('minmax');
// Route::get('/rating', [filtrageController::class, 'filterRating'])->name('filterRating');
// Route::get('/filtrerniveau', [filtrageController::class, 'filtrerniveau'])->name('filtrerniveau');
// Route::get('/filtrerLangue', [filtrageController::class, 'filtrerLangue'])->name('filtrerLangue');
// Route::get('/populairecourses', [filtrageController::class, 'populairecourses'])->name('populairecourses');
// Route::get('/newestcourses', [filtrageController::class, 'newestcourses'])->name('newestcourses');


// // Upload Videos Routes
// Route::post('/save-videos', [UploadController::class, 'storeVideos'])->name('saveVideos');

// Route::get('/setting', [SettingController::class, 'changePassword']);
// Route::put('/setting/{id}', [SettingController::class, 'update']);
// Route::put('/setting/{id}/reset', [SettingController::class, 'reset']);
// Route::get('/changePassword/{id}', [SettingController::class, 'resetPassword']);
// Route::get('/send-email/{id}', [SettingController::class, 'sendEmail']);
// Route::post('/send-verification-code/{id}', [SettingController::class, 'sendVerificationCode']);









use App\Http\Controllers\{
    AddTocardController,
    AdminController,
    Auth\RegisterController,
    RController,
    userController,
    WishlistController,
    FeedbackController,
    filtrageController,
    orderController,
    PDFController,
    ProfileController,
    UploadController,
    StripeController
};
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', function () {
    $courses = Formation::limit(4)->get();
    return view('Home/Home', ['courses' => $courses]);
})->name('homepage');

Route::view('/About', 'About/About')->name('about');
Route::view('/Contact', 'Contact/Contact')->name('contact');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Authentication Routes...

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('loginform');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('registerform');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset']);
Route::post('password/update', [ResetPasswordController::class, 'update'])->name('password.update');



// Resource Controller Routes
Route::post('/storeAfterValidation', [RController::class, 'storeAfterValidation']);

Route::get('/ajouter', [RController::class, 'create'])->name('ajouter');
Route::post('/pendingformations', [RController::class, 'store'])->name('str')->middleware('formateuruser');

// Wishlist Routes
Route::post('/add-to-wishlist', [WishlistController::class, 'addToWishlist'])->name('wishlist.add')->middleware('userformateuruser');
Route::delete('/wishlist', [WishlistController::class, 'destroy'])->name('wishlist.destroy')->middleware('userformateuruser');

// Feedback Routes
Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->name('submit.feedback')->middleware('userformateuruser');

// User Controller Routes
Route::get('/wishelist', [userController::class, 'wishelist'])->name('wishelist')->middleware('userformateuruser');
Route::get('/formateur', [userController::class, 'formateur'])->name('formateur')->middleware('userformateuruser');
Route::get('/courses', [userController::class, 'courses'])->name('courses');
Route::get('/courses/search', [userController::class, 'search'])->name('courses.search');
Route::get('/rate/{id}', [userController::class, 'rateview'])->name('rateview')->middleware('userformateuruser');
Route::get('/formateur/courses', [userController::class, 'formateurCourses'])->name('formateurCourses')->middleware('formateuruser');
Route::get('/formateur/dashboard', [userController::class, 'formateurDashboard'])->name('formateurDashboard')->middleware('formateuruser');
Route::get('/notifications', [userController::class, 'notifications'])->name('notifications')->middleware('userformateuruser');
Route::delete('/deleteNotification/{id}', [userController::class, 'deleteNotification'])->name('deleteNotification')->middleware('userformateuruser');
Route::get('/notifications/count', [UserController::class, 'notificationsCount']);
Route::get('courses/details/{id}', [UserController::class, 'details']);
Route::get('details/{id}', [UserController::class, 'details']);

// Cart Routes
Route::prefix('cart')->middleware('userformateuruser')->group(function () {
    Route::get('addc/{id}', [AddTocardController::class, 'addToCart']);
    Route::get('/', [AddTocardController::class, 'cart'])->name('cart');
    Route::get('clear', [AddTocardController::class, 'clearCart']);
});

// Order Routes
// Route::get('/success', [orderController::class, 'AddToOrder'])->name('success');

// Admin Routes
Route::middleware('adminuser')->group(function () {
    Route::get('/verify/{id}', [AdminController::class, 'verify'])->name('verify');
    Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/verify/{id}', [AdminController::class, 'verify'])->name('verify');
    Route::get('/refuser/{id}/{id_user}', [AdminController::class, 'refuser'])->name('refuser');
    Route::get('/verifyVideos/{id_video}', [AdminController::class, 'verifyVideos'])->name('verifyVideos');
});


// Filtrage Routes

Route::get('/filterMinMax', [filtrageController::class, 'filterMinMax'])->name('minmax');
Route::get('/rating', [filtrageController::class, 'filterRating'])->name('filterRating');
Route::get('/filtrerniveau', [filtrageController::class, 'filtrerniveau'])->name('filtrerniveau');
Route::get('/filtrerLangue', [filtrageController::class, 'filtrerLangue'])->name('filtrerLangue');
Route::get('/populairecourses', [filtrageController::class, 'populairecourses'])->name('populairecourses');
Route::get('/newestcourses', [filtrageController::class, 'newestcourses'])->name('newestcourses');


// Upload Videos Routes
Route::post('/savevideos', [UploadController::class, 'storeVideos'])->name('saveVideos')->middleware('formateuruser');

Route::get('/setting', [SettingController::class, 'changePassword'])->name('setting')->middleware('userformateuruser');
Route::put('/setting/{id}', [SettingController::class, 'update'])->middleware('userformateuruser');
Route::put('/setting/{id}/reset', [SettingController::class, 'reset'])->middleware('userformateuruser');
Route::get('/changePassword/{id}', [SettingController::class, 'resetPassword'])->middleware('userformateuruser');
Route::get('/send-email/{id}', [SettingController::class, 'sendEmail']);
Route::post('/send-verification-code/{id}', [SettingController::class, 'sendVerificationCode']);
Route::get('/profileuser', [ProfileController::class, 'profileuser']);



//Payment
Route::get('/checkout', [StripeController::class, 'checkout'])->name('checkout')->middleware('userformateuruser');
Route::post('/session/{id_formation}/{prix}', [StripeController::class, 'session'])->name('session')->middleware('userformateuruser');

Route::get('/success', [orderController::class, 'AddToOrder'])->name('success')->middleware('userformateuruser');


//contact routes
Route::post('send/email', [FeedbackController::class, 'email'])->name('send.email');

Route::get('export-pdf', [PDFController::class, 'exportPDF'])->name('export.pdf');



//cart
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
// Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
// Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
// Route::post('/cart/checkout', [CartController::class, 'processCheckout'])->name('cart.processCheckout');


Route::get('/mycourses', [UserController::class, 'mycourses']);
Route::get('/openmycourse/{id_formation}', [UserController::class, 'openmycourse']);

Route::get('/courses/category/{category}', [CategoriesController::class, 'getCoursesByCat'])->name('coursesByCategories');


Route::get('/cancelCourse/{id}', [SettingController::class, 'cancelCourse']);


Route::get('export-pdf', [PDFController::class, 'exportPDF'])->name('export.pdf');


Route::post('send/email', [FeedbackController::class, 'email'])->name('send.email');