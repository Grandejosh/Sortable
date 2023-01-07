<?php

namespace App\Http\Livewire;
use Livewire\Component;
use OpenAI;

class SortTest extends Component
{

    protected $API_KEY = "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";

    public function openai(){
        $client = OpenAI::client($this->API_KEY);
    }
    public function render()
    {
        return view('livewire.sort-test');
    }

    public function handleOnSortOrderChanged($sortOrder, $previousSortOrder, $name, $from, $to)
{
    // $sortOrder = new keys order
    // $previousSortOrder = keys previous order
    // $name = drop target name
    // $from = name of drop target from where the dragged/sorted item came from
    // $to = name of drop target to where the dragged/sorted item was placed
}
}
