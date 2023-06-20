<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $properties = Property::query()
            ->leftJoin('property_types', 'properties.property_type_id', 'property_types.id')
            ->leftJoin('categories', 'properties.category_id', 'categories.id')
            ->leftJoin('locations', 'properties.location_id', 'locations.id')
            ->select('properties.id', 'properties.name',
                'properties.thumbnail', 'properties.price',
                'property_types.name as property_type',
                'categories.name as category', 'locations.name as location'
            )
            ->paginate();

        return view('home', compact('properties'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {

        $property = Property::whereId($id)->first();

        // Get ID of a Property whose auto incremented ID is less than the current Property,
        // but because some entries might have been deleted we need to get the max available ID of all entries whose ID is less than current Property's
        $previousPropertyId = Property::where('id', '<', $property->id)->max('id');
        // Same for the next Property's id as previous Property's but in the other direction
        $nextPropertyId = Property::where('id', '>', $property->id)->min('id');

        return view('view', compact('property', 'previousPropertyId', 'nextPropertyId'));
    }

}
