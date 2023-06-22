<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchResults extends Component
{
    public $propertiesData;

    protected $listeners = ['searchResultsUpdated'];

    public function searchResultsUpdated($propertiesData)
    {
        $this->propertiesData = collect($propertiesData);
        $this->propertiesData->search = true;
    }

    public function render()
    {
        return view('livewire.search-results');
    }
}
