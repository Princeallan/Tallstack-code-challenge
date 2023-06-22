<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">Filter</p>

            <div class="w-full md:w-full px-3 mb-6 md:mb-0 flex">
                <input wire:model.lazy="term"
                       value="{{request()->get('term')}}"
                       class="block w-full rounded-md border-0 px-3.5 py-2 t0ext-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 font-medium"
                       placeholder="Type an hit enter to search anything"/>
            </div>
            <div class="w-full md:w-full px-3 mb-6 md:mb-0 flex">
                <input type="number"
                       wire:model="min_value"
                       value="{{request()->get('min_value')}}"
                       min="0"
                       placeholder="Min value"
                       class="w-1/2 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 font-medium mt-2 mr-2"
                />
                <input type="number"
                       wire:model="max_value"
                       value="{{request()->get('max_value')}}"
                       min="0"
                       placeholder="Max value"
                       class="w-1/2 rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 sm:text-sm sm:leading-6 font-medium mt-2"
                />
            </div>
            <div class="w-full md:w-full px-3 mb-6 md:mb-0 flex">
                <button wire:click="updateSearchData"
                        class="w-full rounded-md border-0 px-3.5 py-2 text-white bg-blue-500 shadow-sm sm:text-sm sm:leading-6 font-medium mt-2"
                >
                    Submit
                </button>
            </div>

    </div>

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">Instagram</p>
        <div class="grid grid-cols-3 gap-3">
            <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=1">
            <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=2">
            <img class="hover:opacity-75" src="https://source.unsplash.com/collection/1346951/150x150?sig=3">
        </div>
        <a href="#"
           class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
            <i class="fab fa-instagram mr-2"></i> Follow @myproperties
        </a>
    </div>

</aside>
