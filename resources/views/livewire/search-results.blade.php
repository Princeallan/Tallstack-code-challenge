
    <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @if(isset($propertiesData))
        <div class="w-full bg-white shadow flex flex-col my-4 p-6">
            <p>Search Results</p>
            <div class="grid grid-cols-3 gap-3">
                @foreach($propertiesData['data'] as $property)
                    @php
                        $property = collect($property)
                    @endphp
                    <x-property :property="$property"></x-property>
                @endforeach
            </div>

        </div>

        @endif
    </section>
