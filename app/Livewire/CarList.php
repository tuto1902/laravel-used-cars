<?php

namespace App\Livewire;

use App\Models\Car;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CarList extends Component
{
    public Collection $cars;

    public function mount()
    {
        $this->cars = Car::all();
    }

    public function render()
    {
        return view('livewire.car-list');
    }
}
