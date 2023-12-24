<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assign Mualaf') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">{{ __('Assign Mualaf Detail Info') }}</h2>
                        <div class="container p-4 ">
                            <form method="post"  class="p-6">
                                @csrf
                                <div class="row">
                                    <div class="col-6 p-2">
                                        <div class="form-group row p-3">
                                            <h2 class="font-semibold text-lg text-gray-800 leading-tight text-center">{{ __('Mualaf Information') }}</h2>
                                        </div>
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Name')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->name" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Email')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->email" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Phone Number')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->phone_number" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Age')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->age" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Country')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->country" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('City')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->city" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Previous Religion')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->previous_religion" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Date of Syahadah')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->syahadah_date" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row p-3">
                                            <h2 class="font-semibold text-lg text-gray-800 leading-tight text-center">{{ __('Mentor Information') }}</h2>
                                        </div>
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Name')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mentor->name" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Email')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mentor->email" disabled />
                                            </div>
                                        </div>
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Phone Number')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mentor->phone_number" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Age')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mentor->age" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Country')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mentor->country" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('City')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mentor->city" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Specialist Category')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="optional($assignment->mentor->specialist)->category" disabled />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 flex items-center">
                                        <x-button-back><a href="{{ route('assign.list') }}">BACK</a></x-button-back>
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
