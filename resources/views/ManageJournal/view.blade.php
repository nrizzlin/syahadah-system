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
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
                                {{ __('Your Journal Information') }}</h2>
                            <form method="post"  class="p-6">
                                @csrf
        
                                <!-- Title of Journal -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$journal->title" disabled />
                            </div>

                            <!-- Description of Journal -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-input-textarea id="description" name="description" disabled>{{ $journal->description }}</x-input-textarea>
                            </div>

                            <!-- Date -->
                            <div class="mt-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$journal->date" disabled />
                            </div>

                            <!-- Place -->
                            <div class="mt-4">
                                <x-input-label for="place" :value="__('Place')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$journal->place" disabled />
                            </div>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$journal->status" disabled />
                            </div>

                            <!-- Attachment -->
                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Attachment')" />
                                <x-text-input id="attachment" class="block mt-1 " type="text" name="attachment" :value="$journal->attachment" disabled />
                                <x-button-view><a class="hover:no-underline" href="{{ route('journals.download', $journal->attachment) }}">Download</a></x-button-view>
                                <x-button-view><a href="{{ route('journals.viewfile', $journal->attachment) }}">View</a></x-button-view>   
                            </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button-back><a href="{{ url()->previous() }}">BACK</a></x-button-back>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
