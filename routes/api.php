<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ContactUsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Services
Route::get("getService",[ServicesController::class,'get_services']);
Route::post("saveService",[ServicesController::class,'save_service']);
Route::post("updateService",[ServicesController::class,'update_service']);
Route::get("deleteService/{id}",[ServicesController::class,'delete_service']);

//Testimonial
Route::get("getTestimonial",[TestimonialController::class,'get_testimonial']);
Route::post("saveTestimonial",[TestimonialController::class,'save_testimonial']);
Route::post("updateTestimonial",[TestimonialController::class,'update_testimonial']);
Route::get("deleteTestimonial/{id}",[TestimonialController::class,'delete_testimonial']);

//City
Route::get("getCity",[CityController::class,'get_cities']);
Route::post("saveCity",[CityController::class,'save_cities']);
Route::post("updateCity",[CityController::class,'update_cities']);
Route::get("deleteCity/{id}",[CityController::class,'delete_cities']);

//Contact Us
Route::get("getContactUs",[ContactUsController::class,'get_contact_us']);
Route::post("saveContactUs",[ContactUsController::class,'save_contact_us']);
Route::post("updateContactUs",[ContactUsController::class,'update_contact_us']);
Route::get("deleteContactUs/{id}",[ContactUsController::class,'delete_contact_us']);
