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
                Tables\Filters\SelectFilter::make('brand_id')
                    ->label('Brand')
                    ->relationship(name: 'brand', titleAttribute: 'name')
                    ->preload()
                    ->searchable()
                    ->query(function (Builder $query, array $data) {
                        return $query->when($data['value'], function (Builder $query, $value) {
                            $query->whereIn('id', Car::search($value)->keys());
                        });
                    }),
                Tables\Filters\Filter::make('model')
                    ->form([
                        Forms\Components\TextInput::make('model')
                            ->label('Car Model')
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query->when($data['model'], function (Builder $query, $model) {
                            $query->whereIn('id', Car::search($model)->keys());
                        });
                    }),
                Tables\Filters\Filter::make('year')
                    ->form([
                        Forms\Components\TextInput::make('yearFrom')
                            ->label('From Year'),
                        Forms\Components\TextInput::make('yearTo')
                            ->label('To Year')
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['yearFrom'], function (Builder $query, $yearFrom) {
                                $query->where('year', '>=', $yearFrom);
                            })
                            ->when($data['yearTo'], function (Builder $query, $yearTo) {
                                $query->where('year', '<=', $yearTo);
                            });
                    })
            ], layout: FiltersLayout::AboveContentCollapsible)
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
