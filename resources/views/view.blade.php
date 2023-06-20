<x-app-layout>

    <section class="w-full md:w-2/3 flex flex-col items-center px-3">

        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{$property->getThumbnail()}}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $property->category->name }}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">
                    {{ $property->name }}
                </a>

                <p><i class="fas fa-folder ml-2"></i><span
                        class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ $property->category->name }}</span> </p>
                <p> <i class="fas fa-globe ml-2"></i> {{ $property->location->name }}</p>
                <p href="#" class="text-sm pb-8">
                    <i class="fas fa-calendar text-primary ml-2"></i><strong> Published on : </strong> {{ ($property->created_at)->format('F jS Y')}}
                </p>
                <p class="pb-2">
                    {!! $property->description !!}
                </p>

            </div>
        </article>

        <div class="w-full flex pt-6">
            @if($previousPropertyId)
                <a href="{{url('property/' . $previousPropertyId)}}"
                   class="w-1/2 bg-white shadow hover:shadow-md text-left p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center"><i class="fas fa-arrow-left pr-1"></i>
                        Previous</p>
                </a>
            @endif
            @if($nextPropertyId)
                <a href="{{url('property/' . $nextPropertyId)}}"
                   class="w-1/2 bg-white shadow hover:shadow-md text-right p-6">
                    <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next <i
                            class="fas fa-arrow-right pl-1"></i></p>
                </a>
            @endif
        </div>


    </section>
</x-app-layout>
