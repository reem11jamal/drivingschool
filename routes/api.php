<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\InsuranceCompanyController;
use App\Http\Controllers\InternationalOfficeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\QuestionController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/********Admin Apis********/
Route::post("registerAdmin", [AdminController::class, "register"]);
Route::post("loginAdmin", [AdminController::class, "login"]);
Route::group(["middleware" => ["auth:sanctum"]], function(){
    Route::get("logoutAdmin", [AdminController::class, "logout"]);
    //create Accounts
    Route::post("createInsuranceCompanyAccount", [InsuranceCompanyController::class, "createInsuranceCompanyAccount"]);
    Route::post("createInternationalOfficeAccount", [InternationalOfficeController::class, "createInternationalOfficeAccount"]);
    Route::post("createSchoolAccount", [SchoolController::class, "createSchoolAccount"]);
    
    Route::get("listInsuranceCompanies", [InsuranceCompanyController::class, "listInsuranceCompanies"]);
    Route::get("getSingleInsuranceCompany/{id}", [InsuranceCompanyController::class, "getSingleInsuranceCompany"]);
    Route::delete("deleteInsuranceCompany/{id}", [InsuranceCompanyController::class, "deleteInsuranceCompany"]);
    
    Route::get("listSchools", [SchoolController::class, "listSchools"]);
    Route::get("getSingleSchool/{id}", [SchoolController::class, "getSingleSchool"]);
    Route::delete("deleteSchool/{id}", [SchoolController::class, "deleteSchool"]);
    
    Route::get("listInternationalOffices", [InternationalOfficeController::class, "listInternationalOffices"]);
    Route::get("getSingleInternationalOffice/{id}", [InternationalOfficeController::class, "getSingleInternationalOffice"]);
    Route::delete("deleteInternationalOffice/{id}", [InternationalOfficeController::class, "deleteInternationalOffice"]);


    ////create test
    Route::post("createTest", [TestController::class, "createTest"]);
    Route::post("createTest2", [TestController::class, "createTest2"]);
    Route::post("createQuestion", [QuestionController::class, "createQuestion"]);
    //get test
    Route::get("listQuestions", [QuestionController::class, "listQuestions"]);
    Route::get("getSingleQuestion/{id}", [QuestionController::class, "getSingleQuestion"]);
    Route::get("listTests", [TestController::class, "listTests"]);
    Route::get("getSingleTest/{id}", [TestController::class, "getSingleTest"]);

    Route::delete("deleteQuestion/{id}", [QuestionController::class, "deleteQuestion"]);
    Route::delete("deleteTest/{id}", [TestController::class, "deleteTest"]);

});