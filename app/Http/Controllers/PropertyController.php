<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Repositories\PropertyRepository;
use Illuminate\View\View;

class PropertyController extends Controller
{
    protected $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }


    public function index()
    {
        $min_value = request()->min_value;
        $max_value = request()->max_value;
        $term = request()->term;

        $properties = $this->propertyRepository->getAllProperties()
            ->when($term, function ($query) use ($term) {
                $query->where(function ($query) use ($term) {
                    $query->where('properties.name', 'like', '%' . $term . '%')
                        ->orWhere('properties.description', 'like', '%' . $term . '%');
                });
            })
            ->when($min_value, function ($query) use ($min_value) {
                $query->where('properties.price', '>=', $min_value);
            })
            ->when($max_value, function ($query) use ($max_value) {
                $query->where('properties.price', '<=', $max_value);
            })->paginate(15);


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
