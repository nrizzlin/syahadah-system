<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mualaf Performance Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="container p-4 ">
                            <h2 class=" p-2 font-semibold text-lg text-gray-800 leading-tight text-center">{{ __('Mualaf Detail Information') }}</h2>
                            <hr>
                            <form method="post"  class="p-6">
                                @csrf
                                <div class="row">
                                    <div class="col-6 p-2">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Mualaf Name')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mualaf->name" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Phone Number')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mualaf->phone_number" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Previous Religion')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mualaf->previous_religion" disabled />
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Email')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mualaf->email" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Country')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mualaf->country" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Date of Syahadah')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mualaf->syahadah_date" disabled />
                                            </div>
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

    <div class=" py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="container p-4 ">
                            <h2 class=" p-2 font-semibold text-lg text-gray-800 leading-tight text-center">{{ __('Performance Detail') }}</h2>
                            <hr>
                            <form method="post"  class="p-6">
                                @csrf
                                <div class="row">
                                    <div class="col-6 p-2">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Written Mentor Name')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->mentor->name" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Date Evaluate')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->evaluations->first()->date" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Performance')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" disabled> {{ $assignedMualaf->evaluations->first()->performance }}</textarea>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Note')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="description" name="description" disabled> {{ $assignedMualaf->evaluations->first()->note }}</textarea>

                                                {{-- <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignedMualaf->evaluations->first()->note" disabled /> --}}
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Status Performance')" />
                                            <div class="col-sm-6">
                                                <span class="@if($assignedMualaf->evaluations->first()->result_status == 'Good') bg-yellow-400 text-white text-sm rounded-full p-2.5 @elseif($assignedMualaf->evaluations->first()->result_status == 'Poor') bg-red-700 text-white text-sm rounded-full p-2.5 @elseif($assignedMualaf->evaluations->first()->result_status == 'Excellent') bg-green-500 text-white text-sm rounded-full p-2.5 @endif">
                                                    {{$assignedMualaf->evaluations->first()->result_status}}
                                                </span>
                                            </div>
                                        </div>                                   
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
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
