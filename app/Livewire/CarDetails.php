<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarDetails extends Component
{
    public Car $car;

    public function render()
    {
        return view('livewire.car-details');
    }
}
