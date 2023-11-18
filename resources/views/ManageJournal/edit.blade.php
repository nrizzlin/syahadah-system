<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Journal Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <h2 class="text-lg font-medium text-gray-900 text-center">
                            {{ __('Edit  Journal') }}</h2>

                        <form action="{{ route('journals.update', $journal->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    

                            <!-- Title of Journal -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$journal->title" required autofocus autocomplete="title" />
                            </div>                            

                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required> {{ $journal->description }}</textarea>
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-date-time id="date"  type="datetime-local" name="date" :value="$journal->date"  />
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="place" :value="__('Place')" />
                                <x-text-input id="place" class="block mt-1 w-full" type="text" name="place" :value="$journal->place" required autofocus autocomplete="place" />
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                    <option value="Good" {{ $journal->status == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Moderate" {{ $journal->status == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                    <option value="Worst" {{ $journal->status == 'Worst' ? 'selected' : '' }}>Worst</option>
                                </select>
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Attachment')" />
                                <input type="file" class="form-control" id="attachment" name="attachment">
                                <p class="mt-4">
                                    <x-input-label for="attachment" :value="__('Current Attachment')" /> {{ $journal->attachment}}
                                    <x-button-view><a href="{{ route('journals.download', $journal->attachment) }}">Download</a></x-button-view>
                                </p>
                            </div>
                    
                            <!-- button -->
                            <div class="mt-4">
                                <x-button-edit class="ml-4">
                                    {{ __('Update') }}
                                </x-button-edit>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
