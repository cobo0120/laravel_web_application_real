<?php

use Illuminate\Support\Facades\Route;

// 追加
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Mail\SendTestMail;


// ルーティングを設定するコントローラーを宣言する
use App\Http\Controllers\PostController;
// ルーティングを設定するコントラーを宣言する（メール）
use App\Http\Controllers\MailSendController;

use App\Http\Controllers\ContactFormController;

use App\Http\Controllers\AjaxTestController;

use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\UserController;

// use App\Http\Livewire\Destination;

use App\Http\Livewire\Search;

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

Route::get('/', function () {
    return view('home');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 新規会員登録に部署名の変数（配列）を渡す
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'department'])->name('register');



// WEB申請メニューに関しての設定

// WEB申請メニュー画面
Route::get('/posts',[PostController::class,'index'])->name('posts.index')->middleware('login');
// WEB申請画面を表示
Route::get('/posts/create_applicant',[PostController::class,'create_applicant'])->name('posts.create_applicant');
// 申請画面にて送信先を表示させる
// ①送信先検索ボタンで起動
Route::get('/data_destination',[PostController::class,'data_destination'])->name('data_destination');
// ②検索ボタンで起動
Route::get('/search_destination',[PostController::class,'search_destination'])->name('search_destination');

// 作成用
// Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
// WEB申請画面（create_applicant.php)に入力されたデータのルート設定を追加とnameを設定することによりblade.phpのformタグに省略して渡せる
Route::post('/posts/store_applicant',[PostController::class,'store_applicant'])->name('post.store_applicant');

// ①送信先検索ボタンで起動(ディレクトリを増やす)
Route::get('/posts/data_destination',[PostController::class,'data_destination'])->name('data_destination');
// ②検索ボタンで起動（ディレクトリを増やす）
Route::get('/posts/search_destination',[PostController::class,'search_destination'])->name('search_destination');

// ①送信先検索ボタンで起動(ディレクトリを増やすpart2)
// Route::get('/posts/data_destination',[PostController::class,'data_destination'])->name('data_destination');
// ②検索ボタンで起動（ディレクトリを増やすpart2）
// Route::get('/posts/search_destination',[PostController::class,'search_destination'])->name('search_destination');


// 申請履歴一覧の箇所
// WEB申請履歴一覧
Route::get('/posts/index_history',[PostController::class,'index_history'])->name('posts.index_history')->middleware('login');;
// WEB申請履歴一覧からの詳細画面
Route::get('/posts/show_applicant/{id}',[PostController::class,'show_applicant'])->name('post.show_applicant')->middleware('login');;
// 削除機能
// Route::post('/posts/destroy/{id}',[PostController::class,'destroy'])->name('post.destroy');
// 複写画面
Route::get('/posts/create_copy_applicant/{id}',[PostController::class,'create_copy_applicant'])->name('post.create_copy_applicant');



// 再申請画面(editを増やすと非同期がエラーになる)
Route::get('/posts/edit_reapplication/{id}',[PostController::class,'edit_reapplication'])->name('post.edit_reapplication');
// 再申請更新（更新後メール送信）
Route::post('/posts/update_reapplication/{id}',[PostController::class,'update_reapplication'])->name('post.update_reapplication');
// 取下（更新後メール送信）
Route::post('/posts/destroy_reapplication/{post_id}',[PostController::class,'destroy_reapplication'])->name('post.destroy_reapplication');



// 上長確認画面の表示
Route::get('/posts/create_authorizer/{id}',[PostController::class,'create_authorizer'])->name('post.create_authorizer');
// 上長確認画面の承認（更新後メール送信）
Route::post('/posts/update_authorizer/{id}',[PostController::class,'update_authorizer'])->name('post.update_authorizer');
// 上長確認画面の差戻（更新後メール送信）
Route::post('/posts/remand_authorizer/{id}',[PostController::class,'remand_authorizer'])->name('post.remand_authorizer');



// 注文担当者確認画面の表示
Route::get('/posts/create_order/{id}',[PostController::class,'create_order'])->name('post.create_order');
// 注文担当者入力の承認(更新後のメール送信)
Route::post('/posts/complete_order/{id}',[PostController::class,'complete_order'])->name('post.complete_order');
// 注文担当者入力の差戻(更新後のメール送信)
Route::post('/posts/remand_order/{id}',[PostController::class,'remand_order'])->name('post.remand_order');






// WEBプロフィール画面一覧
Route::get('/users/profile',[UserController::class,'profile'])->name('users.profile');



// WEBパスワード変更画面
Route::get('/users/edit_password/edit',[UserController::class,'edit_password'])->name('users.edit_password');
Route::put('/users/edit_password/edit',[UserController::class,'update_password'])->name('users.update_password');






