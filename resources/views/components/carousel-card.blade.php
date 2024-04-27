<a href="{{ route('cars.show', ['car' => $car->getRouteKey()]) }}">
    <div class="flex flex-col h-full min-h-72 md:min-h-40 bg-white shadow-2xl rounded-xl dark:bg-gray-900">
        <!-- Carousel -->
        <div class="flex flex-col flex-1 justify-center items-center relative">
            <div class="h-full w-full bg-white rounded-t-xl border border-gray-200 dark:border-gray-50/10 dark:bg-gray-900">
                <div class="flex justify-center h-full bg-gradient-to-r from-indigo-500/50 via-purple-500/50 to-pink-500/50 rounded-t-xl">
                    <div class="bg-cover bg-center bg-norepat h-full w-full p-0 min-h-52 md:min-h-40 rounded-t-xl" style="background-image: url('storage/{{ $car->images[0] }}');"></div>
                </div>
            </div>
        </div>
        <!-- End Carousel -->
        <div class=" pt-8 md:pt-10 px-4 pb-4 md:p-6 border-x border-b border-gray-200 dark:border-gray-50/10 dark:bg-gray-900 rounded-b-xl">
            <h3 class=" text-base font-semibold text-gray-800 dark:text-gray-300">
                {{ $car->brand->name }} {{ $car->model }}
            </h3>
            <h4 class="text-base font-semibold text-gray-800 dark:text-gray-300">
                {{ $car->year }}
            </h4>
            <p>{{$car->formatted_price }}</p>
        </div>
    </div>
</a>