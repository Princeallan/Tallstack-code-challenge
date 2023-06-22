<?php

namespace App\Http\Livewire;

use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Livewire\Component;

class SearchForm extends Component
{
    public $term;
    public $min_value;
    public $max_value;

    public function updateSearchData(Request $request)
    {
        if ($request->min_value)
            $request->validate([
                'min_value' => ['nullable', 'numeric'],
                'max_value' => ['nullable', 'numeric','gt:min_value'],
            ]);

        $min_value = $this->min_value;
        $max_value = $this->max_value;
        $term = $this->term;

        $propertiesData = (new PropertyRepository())->getAllProperties()
            ->when($term, function ($query) use ($term) {
                $query->where(function ($query) use ($term) {
                    $query->where('properties.name', 'like', '%' .$term . '%')
                        ->orWhere('properties.description', 'like', '%' .$term . '%');
                });
            })
            ->when($min_value, function ($query) use ($min_value) {
                $query->where('properties.price', '>=', $min_value);
            })
            ->when($max_value, function ($query) use ($max_value) {
                $query->where('properties.price', '<=', $max_value);
            })
            ->paginate(15);

        $this->emit('searchResultsUpdated', $propertiesData);
    }

    public function render() : View
    {
        return view('livewire.search-form');
    }
}
