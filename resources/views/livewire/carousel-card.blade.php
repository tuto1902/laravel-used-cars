<div 
    x-data="{
        images: {{ Js::from($car->images) }},
        selected: 0,
        nextImage() {
            this.selected++
            if (this.selected == this.images.length) {
                this.selected = 0
            }
        },
        previousImage() {
            this.selected--
            if (this.selected < 0) {
                this.selected = this.images.length - 1
            }
        }
    }"
    class="flex flex-col h-full min-h-72 md:min-h-40 bg-white shadow-2xl rounded-xl dark:bg-gray-900"
>
    <!-- Carousel -->
    <div class="flex flex-col flex-1 justify-center items-center relative">
        <div class="h-full w-full bg-white rounded-t-xl border border-gray-200 dark:border-gray-50/10 dark:bg-gray-900">
            <div class="flex justify-center h-full bg-gradient-to-r from-indigo-500/50 via-purple-500/50 to-pink-500/50 rounded-t-xl">
                <div class="bg-cover bg-center bg-norepat h-full w-full p-0 min-h-52 md:min-h-40 rounded-t-xl" x-bind:style="`background-image: url('storage/${images[selected]}');`"></div>
            </div>
        </div>
        <button x-on:click="previousImage()" type="button" class=" absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-600 hover:bg-gray-900/[.1] rounded-tl-xl">
            <span class="text-2xl">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </span>
            <span class="sr-only">Previous</span>
        </button>
        <button x-on:click="nextImage()" type="button" class=" absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-600 hover:bg-gray-900/[.1] rounded-tr-xl">
            <span class="sr-only">Next</span>
            <span class="text-2xl">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </button>

        <div class="flex justify-center absolute -bottom-5 start-0 end-0 space-x-2">
            <template x-for="(image, index) in images">
                <span x-on:click="selected = index" x-bind:class="{'bg-slate-800 dark:bg-slate-600': index == selected}" class="w-3 h-3 border border-slate-800 dark:border-slate-600 rounded-full cursor-pointer"></span>
            </template>
        </div>
    </div>
    <!-- End Carousel -->
    <div class=" pt-8 md:pt-10 px-4 pb-4 md:p-6 border-x border-b border-gray-200 dark:border-gray-50/10 dark:bg-gray-900 rounded-b-xl">
        <h3 class=" text-base font-semibold text-gray-800 dark:text-gray-300">
            {{ $car->brand->name }} {{ $car->model }} {{ $car->year }}
        </h3>
        <p>{{$car->formatted_price }}</p>
    </div>
</div>