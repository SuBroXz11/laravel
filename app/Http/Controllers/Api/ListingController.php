<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    // Show all listings
    public function index(Request $request)
    {
        $listings = Listing::latest()->filter($request->only(['tag', 'search']))->paginate(4);

        return response()->json([
            'heading' => 'Latest Listings',
            'listings' => $listings
        ]);
    }
}
