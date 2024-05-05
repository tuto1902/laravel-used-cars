<?php

namespace App\Livewire;

use App\Models\Car;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Forms;
use Filament\Tables\Enums\FiltersLayout;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CarList extends Component
{
    public Collection $cars;
    public $brandModelOrYear;
    public $model;

    public function mount()
    {
        $this->cars = Car::all();
        $this->brandModelOrYear = '';
    }

    public function render()
    {
        $this->cars = Car::query()
        ->when(
            $this->brandModelOrYear, fn (Builder $query, $brandModelOrYear) => $query->whereIn('id', Car::search($brandModelOrYear)->keys())
        )
        ->get();
        return view('livewire.car-list');
    }
}
