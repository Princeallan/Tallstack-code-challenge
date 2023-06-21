<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;

class PropertyRepository
{
    public function getAllProperties() : Builder
    {
        $properties = Property::query()
            ->leftJoin('property_types', 'properties.property_type_id', 'property_types.id')
            ->leftJoin('categories', 'properties.category_id', 'categories.id')
            ->leftJoin('locations', 'properties.location_id', 'locations.id')
            ->select('properties.id', 'properties.name',
                'properties.thumbnail', 'properties.price',
                'property_types.name as property_type',
                'categories.name as category', 'locations.name as location'
            );

        return $properties;
    }
}
