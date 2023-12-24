<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mualaf Information') }}
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
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Name')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->name" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Phone Number')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->phone_number" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Country')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->country" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Previous Religion')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->previous_religion" disabled />
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Email')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->email" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Age')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->age" disabled />
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('City')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->city" disabled />
                                            </div>
                                        </div>

                                        <div class="form-group row p-3">
                                            <x-input-label class="col-sm-3 col-form-label" for="title" :value="__('Date of Syahadah')" />
                                            <div class="col-sm-6">
                                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$assignment->mualaf->syahadah_date" disabled />
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
                            <h2 class=" p-2 font-semibold text-lg text-gray-800 leading-tight text-center">{{ __('Mualaf Daily Progress') }}</h2>
                            <hr>
                            <div class="table-responsive dash-social">
                                <table id="datatable" class="w-full bg-white">
                                    <thead class="thead-light">
                                        <tr class="border-b-2">
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        @forelse($dailyProgress as $progressDaily) <!-- Fix variable name here -->
                                            <tr class="border-b-2">
                                                <td class="px-2 py-3 text-left">{{ $progressDaily->id }}</td>
                                                <td class="px-2 py-3 text-left">{{ $progressDaily->title }}</td>
                                                <td class="px-2 py-3 text-left">{{ $progressDaily->description }}</td>
                                                <td class="px-2 py-3 text-left">{{ $progressDaily->date }}</td>
                                                <td class="px-2 py-3 text-left">{{ $progressDaily->attachment }}</td>
                                                <td class="px-2 py-3 text-left">
                                                    <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                        <x-button-view><a href="{{ route('dailyprogress.view', $progressDaily->id) }}">View</a></x-button-view>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">No Progress Daily found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
