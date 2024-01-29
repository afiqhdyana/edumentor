<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserAuth;
use ArielMejiaDev\LarapexCharts\LarapexChart;

use App\Http\Controllers\StudentController;
use App\Models\Results_Info;
use App\Models\Skills;
use Illuminate\Http\Request;
use App\Models\Results;

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
    return view('login');
});

//Route::get('test', [StudentController::class, 'show']);
Route::get('studInfo',[StudentController::class,'show']);
Route::view("register",'register');
Route::get('registration',[UserAuth::class,'registration']);
Route::post('registration',[UserAuth::class,'registration']);
Route::view("login",'login');
Route::post("user",[UserAuth::class,'userLogin']);
//Route::view("studInfo",'studInfo');
Route::get("studProfile/{matricNo}", [StudentController::class, 'getStudInfo'])->name('studprofile');
Route::view("moreDetail",'moreDetail');
Route::view("activityMore",'activityMore');
Route::view("card",'card');
Route::view("dashboard",'dashboard');
Route::get('studProfile/moreDetail/{matricNo}', [StudentController::class, 'getMoreDetail']);
Route::get('studProfile/contactMore/{matricNo}', [StudentController::class, 'getMoreContact']);
Route::get('studProfile/qualificationMore/{matricNo}', [StudentController::class, 'getMoreQualification']);
Route::view("contactMore",'contactMore');
Route::view("relativesMore",'relativesMore');
Route::view("financialMore",'financialMore');
Route::view("moremorequalify",'moremorequalify');
Route::get("addGrade/{matricNo}", function(Request $req)
{
    $semester = Results_Info::all();
    return view('addGrade', ['sem' => $semester, 'matricNo' => $req->matricNo]);
});
Route::post('terima', [StudentController::class, 'terima']);
Route::view("test",'test');
Route::view("resultMore",'resultMore');
Route::get('studProfile/coCuriculum/{matricNo}', [StudentController::class, 'getMoreCocuriculum']);
Route::get('studProfile/relativesMore/{matricNo}', [StudentController::class, 'getMoreRelative']);
Route::get('studProfile/financialMore/{matricNo}', [StudentController::class, 'getMoreFinance']);
Route::get('studPerformance', [StudentController::class, 'getBySem']);
Route::get('/studProfile/studPerformances/{matricNo}', [StudentController::class, 'getOverSkill']);
//Route::get('studPerformSkill', [StudentC])
Route::get('/studPerformances', function()
{
    $result_info = Results_Info::select('semester')->get();
  
    return view('studPerformances', ['result_info' => $result_info ]);
});


Route::get('studProfile/activityMore/{matricNo}', [StudentController::class, 'getMoreActivity']);
Route::view("coCuriculum",'coCuriculum');
Route::get('/studInfo/resultMore/{matricNo}', [StudentController::class, 'getMoreResult']);
Route::get('/resultMore/{semester}', [StudentController::class, 'getMoreResult']);
//Route::view("studPerformancess",'studPerformancess');
Route::get('/studProfile/studPerformance/{matricNo}', [StudentController::class, 'getMorePerformance']);
Route::get('/register', [StudentController::class,'create']);
Route::post('/register', [StudentController::class,'store']);
Route::get('/login', [StudentController::class,'develop']);
Route::post('/login', [StudentController::class,'load']);
Route::resource('/student',StudentController::class);
Route::get('/studPerformance/{matricNo}', [Controller::class, 'getOntology']);
Route::get('/moremorequalify', [StudentController::class, 'getMoreQuali']);
Route::get('/moremoreResults', [StudentController::class, 'getMoreTimetime']);

//Route::get('/studPerformance', [StudentController::class, 'studPerformance'])->name('studPerformance.studPerformance');

