<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <h2 class="text-lg font-medium text-gray-900 text-center">
                            {{ __('Update Event Information') }}</h2>

                        <form action="{{ route('event.update', $events->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    

                            <!-- Title of Journal -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$events->title" required autofocus autocomplete="title" />
                            </div>                            

                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required> {{ $events->description }}</textarea>
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-date-time id="date"  type="date" name="date" :value="$events->date"  />
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Attachment')" />
                                <input type="file" class="form-control" id="attachment" name="attachment">
                            </div>

                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Current Attachment')" />                        
                                <div class="col-sm-6">
                                    {{ $events->attachment}}
                                    <x-button-view><a href="{{ route('event.viewfile', $events->attachment) }}">View</a></x-button-view>
                                </div>
                            </div>
                    
                            <div class="flex items-center mt-4">
                                <x-button-edit >{{ __('Update') }}</x-button-edit>
                                <div class=" ml-2 flex items-center justify-end">
                                    <x-button-back><a href="{{ route('event.index') }}">BACK</a></x-button-back>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
