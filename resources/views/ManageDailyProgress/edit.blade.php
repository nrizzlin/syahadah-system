<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Progress Daily Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <h2 class="text-lg font-medium text-gray-900 text-center">
                            {{ __('Edit  Progress Daily') }}</h2>

                        <form action="{{ route('dailyprogress.update', $progressdaily->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    

                            <!-- Title of Journal -->
                            <div class="mt-4">
                                <x-input-label for="title" :value="__('Title')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$progressdaily->title" required autofocus autocomplete="title" />
                            </div>                            

                            <div class="mt-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required> {{ $progressdaily->description }}</textarea>
                            </div>
                    
                            <div class="mt-4">
                                <x-input-label for="date" :value="__('Date')" />
                                <x-date-time id="date"  type="datetime-local" name="date" :value="$progressdaily->date"  />
                            </div>

                            <div class="mt-4">
                                <x-input-label for="attachment" :value="__('Attachment')" />
                                <input type="file" class="form-control" id="attachment" name="attachment">
                                <p class="mt-4">
                                    <x-input-label for="attachment" :value="__('Current Attachment')" /> {{ $progressdaily->attachment}}
                                    <x-button-view><a href="{{ route('dailyprogress.download', $progressdaily->attachment) }}">Download</a></x-button-view>
                                </p>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                    <option value="Good" {{ $progressdaily->status == 'Good' ? 'selected' : '' }}>Good</option>
                                    <option value="Moderate" {{ $progressdaily->status == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                    <option value="Worst" {{ $progressdaily->status == 'Worst' ? 'selected' : '' }}>Worst</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="question_topic" :value="__('Question Topic')" />
                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_topic" name="question_topic" required>
                                    <option value="Family Issue" {{ $progressdaily->question_topic == 'Family Issue' ? 'selected' : '' }}>Family Issue</option>
                                    <option value="Solat" {{ $progressdaily->question_topic == 'Solat' ? 'selected' : '' }}>Solat</option>
                                    <option value="Doa" {{ $progressdaily->question_topic == 'Doa' ? 'selected' : '' }}>Doa</option>
                                    <option value="Perkawinan" {{ $progressdaily->question_topic == 'Perkawinan' ? 'selected' : '' }}>Perkawinan</option>
                                    <option value="Budaya Islam" {{ $progressdaily->question_topic == 'Budaya Islam' ? 'selected' : '' }}>Budaya Islam</option>
                                </select>
                            </div>

                            <div class="mt-4">
                                <x-input-label for="question_desc" :value="__('Question Description')" />
                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_desc" name="question_desc" required> {{ $progressdaily->question_desc }}</textarea>
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
