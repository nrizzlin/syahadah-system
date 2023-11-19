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
                            {{ __('Create A New Progress Daily') }}</h2>

                        <div class="container p-4 ">
                            <form action="{{ route('dailyprogress.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group row">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Title')" />
                                            <div class="col-sm-6">
                                                <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"  id="title" name="title" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <x-input-label class="col-sm-3 col-form-label" for="description" :value="__('Description')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required></textarea>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                            <x-input-label class="col-sm-3 col-form-label" for="date" :value="__('Date')" />
                                            <div class="col-sm-6">
                                                <input type="datetime-local" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="date" name="date" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <x-input-label class="col-sm-3 col-form-label" for="attachment" :value="__('Attachment')" />
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" id="attachment" name="attachment">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <x-input-label class="col-sm-3 col-form-label" for="status" :value="__('Status')" />
                                            <div class="col-sm-6">
                                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                                    <option value="Good">Good</option>
                                                    <option value="Moderate">Moderate</option>
                                                    <option value="Worst">Worst</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-6">
                                        <div class="form-group row">
                                            <x-input-label  class="col-sm-3 col-form-label" for="question_topic" :value="__('Question Topic')" />
                                            <div class="col-sm-6">
                                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_topic" name="question_topic" required>
                                                    <option value="Family Issue">Family Issue</option>
                                                    <option value="Solat">Solat</option>
                                                    <option value="Doa">Doa</option>
                                                    <option value="Perkawinan">Perkawinan</option>
                                                    <option value="Budaya Islam">Budaya Islam</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <x-input-label class="col-sm-3 col-form-label" for="question_desc" :value="__('Question Description')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_desc" name="question_desc" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <!-- Title of Journal -->
                                <div class="mt-4">
                                    <x-input-label for="title" :value="__('Title')" />
                                    <input type="text" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"  id="title" name="title" required>
                                </div>

                                <!-- Description of Journal -->
                                <div class="mt-4">
                                    <x-input-label for="description" :value="__('Description')" />
                                    <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required></textarea>
                                </div>

                                <!-- Date -->
                                <div class="mt-4">
                                    <x-input-label for="date" :value="__('Date')" />
                                    <input type="datetime-local" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="date" name="date" required>
                                </div>

                                <!-- Attachment -->
                                <div class="mt-4">
                                    <x-input-label for="attachment" :value="__('Attachment')" />
                                    <input type="file" class="form-control" id="attachment" name="attachment">
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

                                <div class=" ">
                                    <div class="mt-4">
                                        <x-input-label for="question_topic" :value="__('Question Topic')" />
                                        <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_topic" name="question_topic" required>
                                            <option value="Family Issue">Family Issue</option>
                                            <option value="Solat">Solat</option>
                                            <option value="Doa">Doa</option>
                                            <option value="Perkawinan">Perkawinan</option>
                                            <option value="Budaya Islam">Budaya Islam</option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <x-input-label for="question_desc" :value="__('Question Description')" />
                                        <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="question_desc" name="question_desc" required></textarea>
                                    </div>
                                </div> --}}
                                    <!-- button -->
                                    <div class="mt-4">
                                        <x-primary-button class="mt-4">
                                            {{ __('Submit') }}
                                        </x-primary-button>
                                    </div>
                            </form>
                        </div>     
                    </div><!--end card-body-->
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
