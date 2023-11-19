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

                            <div class="container p-4 ">
                                <form action="{{ route('dailyprogress.update', $progressdaily->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
    
                                    <div class="row">
                                        <div class="col-6 p-2">
                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Title')" />
                                                <div class="col-sm-6">
                                                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$progressdaily->title" required autofocus autocomplete="title" />
                                                </div>
                                            </div>
    
                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="description" :value="__('Description')" />
                                                <div class="col-sm-6">
                                                    <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required> {{ $progressdaily->description }}</textarea>
                                                </div>
                                            </div>
    
                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="date" :value="__('Date')" />
                                                <div class="col-sm-6">
                                                    <x-date-time id="date"  type="datetime-local" name="date" :value="$progressdaily->date"  />
                                                </div>
                                            </div>
    
                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="attachment" :value="__('Attachment')" />
                                                <div class="col-sm-6">
                                                    <input type="file" class="form-control" id="attachment" name="attachment">
                                                </div>
                                            </div>

                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="attachment" :value="__('Current Attachment')" />
                                                <div class="col-sm-6">
                                                    {{ $progressdaily->attachment}}
                                                    <x-button-view><a href="{{ route('dailyprogress.viewfile', $progressdaily->attachment) }}">View</a></x-button-view>
                                                </div>
                                            </div>
    
                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="status" :value="__('Status')" />
                                                <div class="col-sm-6">
                                                    <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                                        <option value="Good" {{ $progressdaily->status == 'Good' ? 'selected' : '' }}>Good</option>
                                                        <option value="Moderate" {{ $progressdaily->status == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                                                        <option value="Worst" {{ $progressdaily->status == 'Worst' ? 'selected' : '' }}>Worst</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
    
                                        <div class="col-6">
                                            <div class="form-group row p-3">
                                                <x-input-label  class="col-sm-3 col-form-label" for="question_topic" :value="__('Question Topic')" />
                                                <div class="col-sm-6">
                                                    <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_topic" name="question_topic" required>
                                                        <option value="Family Issue" {{ $progressdaily->question_topic == 'Family Issue' ? 'selected' : '' }}>Family Issue</option>
                                                        <option value="Solat" {{ $progressdaily->question_topic == 'Solat' ? 'selected' : '' }}>Solat</option>
                                                        <option value="Doa" {{ $progressdaily->question_topic == 'Doa' ? 'selected' : '' }}>Doa</option>
                                                        <option value="Perkawinan" {{ $progressdaily->question_topic == 'Perkawinan' ? 'selected' : '' }}>Perkawinan</option>
                                                        <option value="Budaya Islam" {{ $progressdaily->question_topic == 'Budaya Islam' ? 'selected' : '' }}>Budaya Islam</option>
                                                    </select>
                                                </div>
                                            </div>
    
    
                                            <div class="form-group row p-3">
                                                <x-input-label class="col-sm-3 col-form-label" for="question_desc" :value="__('Question Description')" />
                                                <div class="col-sm-6">
                                                    <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_desc" name="question_desc" required> {{ $progressdaily->question_desc }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex items-center justify-end">
                                            <x-button-edit >{{ __('Update') }}</x-button-edit>
                                            <div class="col-sm-6 flex items-center justify-end">
                                                <x-button-back><a href="{{ route('dailyprogress.index') }}">BACK</a></x-button-back>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
