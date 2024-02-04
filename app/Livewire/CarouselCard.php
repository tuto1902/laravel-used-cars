<?php

namespace App\Livewire;

use App\Models\Car;
use Livewire\Component;

class CarouselCard extends Component
{
    public Car $car;
    
    public function render()
    {
        return view('livewire.carousel-card');
    }
}
