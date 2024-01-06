<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resources Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div class="w-full">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Resources Detail') }}</h2>
                            <form method="post"  class="p-6">
                                @csrf
        
                                <!-- Title of Journal -->
                                <div class="mt-4">
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$resources->title" disabled />
                                </div>
    
                                <!-- Description of Journal -->
                                <div class="mt-4">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <x-input-textarea id="description"  class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="description" disabled>{{ $resources->description }}</x-input-textarea>
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="attachment" :value="__('Attachment')" />
                                    <x-text-input id="attachment" class="block mt-1 " type="text" name="attachment" :value="$resources->attachment" disabled />
                                    <x-button-view><a href="{{ route('resources.download', $resources->attachment) }}">Download</a></x-button-view>
                                    <x-button-view><a href="{{ route('resources.viewfile', $resources->attachment) }}">View</a></x-button-view>   
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
