<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    // Show all listings
    public function index() {
        // dd(request());
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag', 'search']))
            ->get()
        ]);
    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    public function create() {
        return view('listings.create');
    }
}
