<?php
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\listAritcleController;
use App\Http\Controllers\HomeController;
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
$idRegex='[0-9]+' ;
$slugRegex='[0-9a-z\-]+' ;
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/articles', [listAritcleController::class, 'index'])->name('articles.index');
Route::get('/articles/{slug}-{article}/', [listAritcleController::class, 'show'])->name('articles.show')->where([
    'article'=>$idRegex,
    'slug'=>$slugRegex, 
]);
Route::get('/categorie/{categorie}', [HomeController::class, 'listParCategorie'])->name('liste.categorie')->where([
    'categorie' => $idRegex,
]);
Route::post('/article/{article}/contact',[listAritcleController::class, 'contact'])->name('articles.contact')->where([
    'article'=>$idRegex,  
]);
Route::get('/apropos', [HomeController::class, 'apropos'])->name('apropos');
Route::get('/contact',[HomeController::class, 'contactIndex'])->name('contact');
Route::post('/contact',[HomeController::class, 'contact']);
//route login admin
Route::get('/login', [AuthController::class, 'index'])
->middleware('guest')
->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::delete('/logout', [AuthController::class, 'logout'])
->middleware('auth')
->name('logout');
//route for admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group( function(){
    Route::resource('articles', ArticlesController::class );
    Route::resource('categorie', CategoriesController::class );
} );