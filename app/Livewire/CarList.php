<?php

namespace App\Livewire;

use App\Models\Car;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CarList extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public Collection $cars;

    public function mount()
    {
        $this->cars = Car::all();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Car::query())
            ->contentGrid([
                'md' => 4,
                'xl' => 6,
            ])
            ->recordClasses(['!ring-0 !shadow-none'])
            ->columns([
                Tables\Columns\Layout\View::make('cars.table.row-content')
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.car-list');
    }
}
