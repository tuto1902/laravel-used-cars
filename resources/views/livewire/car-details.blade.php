<div x-data="{ active: 'tab-1' }">
    <x-card color="bg-white border border-gray-200">
        <div class="w-full flex justify-center">
            <img x-ref="featured" class="max-h-[450px]" src="{{ $car->images[0] }}" />
        </div>
        <div class="flex items-center justify-center gap-2 mt-4 py-3 px-6 bg-gray-100 w-full overflow-x-auto">
            @foreach($car->images as $image)
            <img x-on:click="$refs.featured.setAttribute('src', $event.target.getAttribute('src'))" class="h-20 cursor-pointer" src="{{ $image }}" />
            @endforeach
        </div>

        <div class="mt-4 border-b border-gray-200">
            <nav class="flex space-x-1">
                <button type="button" x-on:click="active = 'tab-1'" :class="{
                        'bg-white border-b-transparent text-blue-600 ': active == 'tab-1',
                        'bg-gray-50 text-gray-500': active != 'tab-1'
                    }" class="-mb-px py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium text-center border rounded-t-lg hover:text-gray-700">
                    Owner
                </button>
                <button type="button" x-on:click="active = 'tab-2'" :class="{
                        'bg-white border-b-transparent text-blue-600 ': active == 'tab-2',
                        'bg-gray-50 text-gray-500': active != 'tab-2'
                    }" class="-mb-px py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium text-center border rounded-t-lg hover:text-gray-700">
                    Car Details
                </button>
            </nav>
        </div>

        <div class="mt-3 px-4">
            <div x-show="active == 'tab-1'" x-cloak>
                <p class="text-gray-500">
                    <em class="font-semibold text-gray-800">Name:</em> {{ $car->owner->name }}
                </p>
                <p class="text-gray-500">
                    <em class="font-semibold text-gray-800">Email:</em> {{ $car->owner->email }}
                </p>
            </div>
            <div x-show="active == 'tab-2'" x-cloak>
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="border rounded-lg shadow overflow-hidden dark:border-neutral-700 dark:shadow-gray-900">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                Engine
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $car->engine }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                                Fuel Type
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $car->fuel_type }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                               Type of Transmission 
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $car->transmission_type }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                               Mileage
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                                {{ $car->mileage }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-card>
</div>