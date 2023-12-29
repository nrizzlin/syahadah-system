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
                            {{ __('Create A New Journal') }}</h2>

                        <form action="{{ route('journals.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title of Journal -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"  id="title" name="title" required>
                            </div>

                            <!-- Description of Journal -->
                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required></textarea>
                            </div>

                            <!-- Date -->
                            <div class="mt-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <input type="datetime-local" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="date" name="date" required>
                            </div>

                            <!-- Place -->
                            <div class="mt-4">
                                <x-input-label for="place" :value="__('Place')" />
                                <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="place" name="place" required>
                            </div>

                            <!-- Status -->
                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                    <option value="Good">Good</option>
                                    <option value="Moderate">Moderate</option>
                                    <option value="Worst">Worst</option>
                                </select>
                            </div>

                            <!-- Attachment -->
                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Attachment')" />
                                <input type="file" class="form-control" id="attachment" name="attachment">
                            </div>

                            <div class="flex items-center mt-4">
                                <x-primary-button >{{ __('Submit') }}</x-primary-button>
                                <div class=" ml-2 flex items-center justify-end">
                                    <x-button-back><a href="{{ url()->previous() }}">BACK</a></x-button-back>
                                </div>
                            </div>
                        </form>     
                    </div><!--end card-body-->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
