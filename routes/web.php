<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

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

//common route
//index: show all listing
//show: show single listing
//create: show form to create a listing
//store: store a listing
//edit: sho form to edit listing
//update: edit a listing
//destroy: delete a listing




//single listing

// Route::get('/listings/{id}', function($id){
//     return view(
//         'listing', [
//             'listing' => Listing::find($id)
//         ]
//     );
//});

//single listing

// Route::get('/listings/{id}', function($id){
//     $listing = Listing::find($id);
//     if ($listing) {
//        return view(
//         'listing', [
//             'listing' => $listing
//         ]

//        );
//     } else {
//        abort(404);
//     }

// });




//listing all
Route::get('/', [ListingController::class, 'index']);


//create form
Route::get('/listings/create', [ListingController::class, 'create']);

// stroring listings data
Route::post('/listings', [ListingController::class, 'store']);

//Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

//update listing
Route::put('/listings/{listing}', [ListingController::class, 'update']);

//login form
Route::get('/login', [ListingController::class, 'login']);

Route::get('/register', [ListingController::class, 'register']);

Route::get('/manage', [ListingController::class, 'manage']);

//single listing

Route::get('/listings/{listing}', [ListingController::class, 'show']);
