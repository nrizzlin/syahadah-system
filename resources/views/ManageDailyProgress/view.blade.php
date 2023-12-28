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
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">{{ __('Progress Daily Information') }}</h2>
                        <div class="container p-4 ">
                            <form method="post"  class="p-6">
                                @csrf
                                <div class="row">
                                    <div class="col-6 p-2">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Title')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$progressdaily->title" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="description" :value="__('Description')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" disabled> {{ $progressdaily->description }}</textarea>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="date" :value="__('Date')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="date" class="block mt-1 w-full" type="text" name="date" :value="$progressdaily->date" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="attachment" :value="__('Attachment')" />
                                            <div class="col-sm-6">
                                                {{ $progressdaily->attachment}}
                                                <x-button-view><a href="{{ route('dailyprogress.download', $progressdaily->attachment) }}">Download</a></x-button-view>
                                                <x-button-view><a href="{{ route('dailyprogress.viewfile', $progressdaily->attachment) }}">View</a></x-button-view>
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="status" :value="__('Status')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="$progressdaily->status" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row p-3">
                                            <x-input-label  class="col-sm-3 col-form-label" for="question_topic" :value="__('Question Topic')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="question_topic" class="block mt-1 w-full" type="text" name="question_topic" :value="$progressdaily->question_topic" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="question_desc" :value="__('Question Description')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_desc" name="question_desc" disabled> {{ $progressdaily->question_desc }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 flex items-center">
                                        <x-button-back><a href="{{ url()->previous() }}">BACK</a></x-button-back>
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
