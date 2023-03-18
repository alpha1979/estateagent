<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class ListingController extends Controller
{
  
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }
   
    public function index(Request $request): Response
    {
        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        $listings = Listing::mostRecent()->filterParam($filters);
        
        return inertia(
            'Listing/Index', 
            [
                'filters' => $filters,
                'listings' => $listings
                    ->paginate(10)
                    ->withQueryString()
            ]
            );
    }

    public function create(): Response
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        $request->user()->listings()->create(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:2220',
                'city' => 'required',
                'code' => 'required|integer',
                'street' => 'required',
                'postcode' => 'required|integer|min:3|max:20000',
                'price' => 'required|integer|min:1|max:2000000',
            ])
        );

        return redirect()
            ->route('listing.index')
            ->with('success', 'Listing was created');

    }

 
    public function show(Listing $listing)
    {
        return inertia(
            'Listing/Show',
            [
                'listing' => $listing
            ]
        );
    }

  
    public function edit(Listing $listing)
    {
        return inertia('Listing/Edit', [
            'listing' => $listing
        ]);
    }

    public function update(Request $request, Listing $listing)
    {
        $listing->update(
            $request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:2220',
                'city' => 'required',
                'code' => 'required|integer',
                'street' => 'required',
                'postcode' => 'required|integer',
                'price' => 'required|integer|min:1|max:2000000',
            ])
        );

        return redirect()
            ->route('listing.index')
            ->with('success', 'Listing was updated');
    }

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
        ->with('success', 'Listing was deleted');
    }
}
