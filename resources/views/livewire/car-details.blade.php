<div>
    <x-card color="bg-white border border-gray-200">
        <div class="w-full flex justify-center">
            <img src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
        </div>
        <div class="w-full bg-gray-100 flex justify-center items-center gap-4 mt-4 px-4 py-3 overflow-x-auto">
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
            <img class="w-20" src="/storage/01HTV7V9GCJQTQC67EYAXP93DT.jpg" />
        </div>
        <div x-data="{ active: 'tab-1' }" class="mt-4">
            <div class="border-b border-gray-200 dark:border-neutral-700">
                <nav class="flex space-x-1">
                    <button type="button" 
                        x-on:click="active = 'tab-1'" 
                        :class="{ 
                            'bg-white text-blue-600 border-b-transparent': active == 'tab-1',
                            'bg-gray-50 text-gray-500': active != 'tab-1'
                        }" 
                        class="-mb-px py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium text-center border rounded-t-lg hover:text-gray-700"
                    >
                        Car Seller
                    </button>
                    <button type="button"
                        x-on:click="active = 'tab-2'" 
                        :class="{ 
                            'bg-white text-blue-600 border-b-transparent': active == 'tab-2',
                            'bg-gray-50 text-gray-500': active != 'tab-2'
                        }" 
                        class="-mb-px py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium text-center border rounded-t-lg hover:text-gray-700"
                        role="tab"
                    >
                        Car Details
                    </button>
                </nav>
            </div>

            <div class="mt-3">
                <div x-show="active == 'tab-1'" x-cloak>
                    <p class="text-gray-500">
                        This is the <em class="font-semibold text-gray-800">first</em> item's tab body.
                    </p>
                </div>
                <div x-show="active == 'tab-2'" x-cloak>
                    <p class="text-gray-500">
                        This is the <em class="font-semibold text-gray-800">second</em> item's tab body.
                    </p>
                </div>
            </div>
        </div>
    </x-card>
</div>