<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // naming conventions
    // index - Show all listngs
    // show - show single listings
    // create - show form to create new listing
    // store - store new liting
    // edit - show form to edit listing
    // update - update listing
    // destroy - delete listing

    // Show all listings
    public function index(){
        // dd(request()->tag);
        return view('listings.index', [ // copy pasted the return from our routes
            'heading' => 'Latest Listings',
            'listings'=>Listing::latest()->filter(request(['tag', 'search']))->paginate(4) // we can also do simplePaginate()
        ]);
    }
    // Show single listing 
    public function show(Listing $listing){ // importing class is very imp
        return view('listings.show', [
            'listing'=>$listing
        ]);
    } 

    // Show Create Form
    public function create(){
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request){
    //    dd(request()->all()); this will give us all the value after we submit the form
    // dd($request->file('logo'));
    $formFields=$request->validate([
        'title'=>'required',
        'company'=>['required', Rule::unique('listings')], // the listings is the name of table
        'location'=>'required',
        'website'=>'required',
        'email'=>['required', 'email'],
        'tags'=>'required',
        'description'=>'required',
    ]);

    if($request->hasFile('logo')){
        $formFields['logo']=$request->file('logo')->store('logos', 'public'); // save the img in the storage/public/logos
    }

    // Adding ownership to the listings
    $formFields['user_id']=auth()->id();

    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing created successfully!');
    } 

    // Edit listing Data
    public function edit(Listing $listing){
        // dd($listing);
        return view('listings.edit', ['listing'=>$listing]);
    }
    
    // Update Listing Data
    public function update(Request $request, Listing $listing){
        //    dd(request()->all()); this will give us all the value after we submit the form
        // dd($request->file('logo'));
        $formFields=$request->validate([
            'title'=>'required',
            'company'=>'required', // the listings is the name of table
            'location'=>'required',
            'website'=>'required',
            'email'=>['required', 'email'],
            'tags'=>'required',
            'description'=>'required',
        ]);
        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos', 'public'); // save the img in the storage/public/logos
        }
        $listing->update($formFields);
        // return back()->with('message', 'Listing updated successfully!');
        return redirect('/')->with('message', 'Listing updated successfully!');
    } 

    // Delete listing Data
    public function destroy(Listing $listing){
        // dd($listing);
        $listing->delete();
        return redirect('/')->with('message', 'Listing Deleted Successfully');
    }

    // Manage listing Data
    public function manage(){
        return view('listings.manage', ['listings'=> auth()->user()->listings()->get()]);
    }
}
