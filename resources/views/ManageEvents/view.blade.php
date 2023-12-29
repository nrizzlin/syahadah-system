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
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Event Information') }}</h2>
                            <form method="post"  class="p-6">
                                @csrf
        
                                <!-- Title of Journal -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$events->title" disabled />
                            </div>

                            <!-- Description of Journal -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <x-input-textarea id="description" name="description" disabled>{{ $events->description }}</x-input-textarea>
                            </div>

                            <!-- Date -->
                            <div class="mt-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$events->date" disabled />
                                </div>

                            <!-- Attachment -->
                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Attachment')" />
                                <x-text-input id="attachment" class="block mt-1 " type="text" name="attachment" :value="$events->attachment" disabled />
                                <x-button-view><a href="{{ route('event.download', $events->attachment) }}">Download</a></x-button-view>
                                <x-button-view><a href="{{ route('event.viewfile', $events->attachment) }}">View</a></x-button-view>   
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
