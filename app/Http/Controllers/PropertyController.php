<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\View\View;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $properties = Property::query()
            ->leftJoin('property_types','properties.property_type_id', 'property_types.id')
            ->select('properties.name', 'property_types.name as property_type')
            ->paginate();

        return view('home', compact('properties'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
