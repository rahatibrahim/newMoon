<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    /* Common Resource Routes:
    index - Show all listings
    show - Show single listing
    create - Show form to create new listing
    store - Store new listing
    edit - Show form to edit listing
    update - Update listing
    destroy - Delete listing
    */

    // Show all listings
    public function index()
    {
        // dd(request());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))
                ->paginate(4)
        ]);
    }

    // Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    // Show form to create new listing
    public function create()
    {
        return view('listings.create');
    }

    // Store new listing
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing was successfully created!');
    }

    // Show edit form
    public function edit(Listing $listing) {
        dd($listing);
    }
}
