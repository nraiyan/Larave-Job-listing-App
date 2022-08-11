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
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(4)
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
    if ($request->hasfile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    //Creating a listing Data.
    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing created successfully');

}

//Editing a Listing

public function edit(Listing $listing){
    return view('listings.edit', ['listing' => $listing]);
}

//update listings data
public function update(Request $request, Listing $listing){

    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required'],
        'location' => 'required',
        'email' => ['required', 'email'],
        'website' => 'required',
        'tags' => 'required',
        'description' => 'required'
    ]);
    if ($request->hasfile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    //Creating a listing Data.
    $listing->update($formFields);
    return back()->with('message', 'Listing updated successfully');

}




}
