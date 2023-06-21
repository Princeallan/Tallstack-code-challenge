<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Repositories\PropertyRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PropertyController extends Controller
{
    protected $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $properties = $this->propertyRepository->getAllProperties()
            ->paginate(15);

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

    /**
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        $term = $request->get('term');

        $properties = $this->propertyRepository->getAllProperties()
            ->where(function ($query) use ($term) {
                $query->where('properties.name', 'like', "%$term%")
                    ->orWhere('properties.description', 'like', "%$term%");
            })
            ->paginate(15);

        return view('home', compact('properties'));
    }

}
