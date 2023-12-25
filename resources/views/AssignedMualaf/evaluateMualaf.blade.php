<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Evaluate Mualaf') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="container p-4 ">
                            <h2 class=" p-2 font-semibold text-lg text-gray-800 leading-tight text-center">{{ __('Evaluate Mualaf Performance') }}</h2>
                            <hr>
                            <form action="{{ route('assign.evaluate') }}" method="POST" enctype="multipart/form-data" class="p-6">
                                @csrf
                                <input type="hidden" name="assigned_id" value="{{ optional($assignment)->id }}">
                                <div class="row">
                                    <div class="col-6 p-2">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Name')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->name" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="syahadah_date" :value="__('Syahadah Date')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="syahadah_date" :value="$assignment->mualaf->syahadah_date" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="age" :value="__('Age')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="age" :value="$assignment->mualaf->age" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="date" :value="__('Date')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="date" name="date" :value="old('date')" required autofocus autocomplete="name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 p-2">
                                        <div class="form-group row p-3" id="performance">
                                            <x-input-label class="col-sm-3 col-form-label" for="performance" :value="__('Mualaf Performance')" />
                                            <div class="col-sm-6">
                                                <div class="grid grid-cols-2 gap-4 mt-1">
                                                    <div class="items-center">
                                                        <input type="checkbox" id="p1" name="performance[]" value="Undestanding of Faith" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4">
                                                        <label for="p1" class="ml-2 text-sm font-medium text-gray-700">Undestanding of Faith</label>
                                                    </div>
        
                                                    <div class="items-center">
                                                        <input type="checkbox" id="p2" name="performance[]" value="Prayer" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p2" class="ml-2 text-sm font-medium text-gray-700">Prayer</label>
                                                    </div>
        
                                                    <div class="items-center">
                                                        <input type="checkbox" id="p3" name="performance[]" value="Learning and Recitation of Al-Quran" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p3" class="ml-2 text-sm font-medium text-gray-700">Learning and Recitation of Al-Quran</label>
                                                    </div>
        
                                                    <div class="items-center">
                                                        <input type="checkbox" id="p4" name="performance[]" value="Morality and Character" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p4" class="ml-2 text-sm font-medium text-gray-700">Morality and Character</label>
                                                    </div>

                                                    <div class="items-center">
                                                        <input type="checkbox" id="p5" name="performance[]" value="Fasting" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4">
                                                        <label for="p5" class="ml-2 text-sm font-medium text-gray-700">Fasting</label>
                                                    </div>

                                                    <div class="items-center">
                                                        <input type="checkbox" id="p6" name="performance[]" value="Charity" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4">
                                                        <label for="p6" class="ml-2 text-sm font-medium text-gray-700">Charity</label>
                                                    </div>

                                                    <div class="items-center">
                                                        <input type="checkbox" id="p7" name="performance[]" value="Connection with Muslim Community" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p7" class="ml-2 text-sm font-medium text-gray-700">Connection with Muslim Community</label>
                                                    </div>

                                                    <div class="items-center">
                                                        <input type="checkbox" id="p8" name="performance[]" value="Continue Learning" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p8" class="ml-2 text-sm font-medium text-gray-700">Continue Learning</label>
                                                    </div>

                                                    <div class="items-center">
                                                        <input type="checkbox" id="p9" name="performance[]" value="Lifestyle Choice" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p9" class="ml-2 text-sm font-medium text-gray-700">Lifestyle Choice</label>
                                                    </div>

                                                    <div class="items-center">
                                                        <input type="checkbox" id="p10" name="performance[]" value="Personal Reflection" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" >
                                                        <label for="p10" class="ml-2 text-sm font-medium text-gray-700">Personal Reflection</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="note" :value="__('Note')" />
                                            <div class="col-sm-6">
                                                <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="note" name="note" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end">
                                    <x-primary-button >{{ __('Submit') }}</x-primary-button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
