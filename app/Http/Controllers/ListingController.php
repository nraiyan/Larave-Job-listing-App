<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //listing all
    public function index(){

        return view('listings.index', [
            'heading' => 'Latest Listing',
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }
//single listing
    public function show(Listing $listing){
        return view('listings.show', ['listing' => $listing]);

    }

//show create form
public function create(){
    return view('listings.create', );
}

//show login form
public function login(){
    return view('listings.login', );
}

//show register form
public function register(){
    return view('listings.register', );
}

//show manage dashboad
public function manage(){
    return view('listings.manage', );
}

//storing listings data
public function store(Request $request){
    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings', 'company')],
        'location' => 'required',
        'email' => ['required', 'email'],
        'website' => 'required',
        'tags' => 'required',
        'description' => 'required'
    ]);

    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing created successfully');
}
}
