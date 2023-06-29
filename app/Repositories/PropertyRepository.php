<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Builder;

class PropertyRepository
{
    public function getAllProperties($filterData = null): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $term = $filterData['term'];
        $min_value = $filterData['min_value'];
        $max_value = $filterData['max_value'];

        return Property::query()
            ->leftJoin('property_types', 'properties.property_type_id', 'property_types.id')
            ->leftJoin('categories', 'properties.category_id', 'categories.id')
            ->leftJoin('locations', 'properties.location_id', 'locations.id')
            ->select('properties.id', 'properties.name',
                'properties.thumbnail', 'properties.price',
                'property_types.name as property_type',
                'categories.name as category', 'locations.name as location'
            )->when($term, function ($query) use ($term) {
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
    }
}
