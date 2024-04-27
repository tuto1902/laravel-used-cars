<div>
    <x-card title="Search Cars" color="bg-white border border-gray-200">
        <div class="grid grid-cols-1 gap-4">
            <div class="max-w-lg">
                <x-select label="Brand" wire:model.live="brand" placeholder="Select a car brand" :async-data="route('api.brands.index')" option-label="name" option-value="name" />
            </div>
            <div class="max-w-lg">
                <x-input wire:model.live="model" label="Model" placeholder="Car model" />
            </div>
        </div>
    </x-card>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 mt-4">
        @foreach($cars as $car)
        <x-carousel-card :car="$car" />
        @endforeach
    </div>
</div>