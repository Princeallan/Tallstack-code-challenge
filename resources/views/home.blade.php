<x-app-layout>

    <!--   Search results Section -->
    @livewire('search-results')

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @if($properties)
            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <div class="grid grid-cols-3 gap-3">

                    @foreach($properties as $property)
                        <x-property :property="$property"></x-property>
                    @endforeach

                </div>
                {{ $properties->links('pagination::tailwind') }}
            </div>
        @endif
    </section>

    <!-- Filter Form -->
    @livewire('search-form')

</x-app-layout>
