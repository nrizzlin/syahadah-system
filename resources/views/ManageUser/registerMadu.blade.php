<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Mad u Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="table-responsive dash-social">
                            <div class="flex justify-end items-center">
                                <x-button-add x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-madu')">{{ __('Add New Mad`u') }}
                                </x-button-add>
                            </div>
                            <x-modal name="add-madu" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('madu.add') }}" class="p-6">
                                    @csrf

                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                                        {{ __('Registration Mad u') }}
                                    </h2><hr>

                                    <!-- Name -->
                                    <div class="mt-4" id="name">
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Gender -->
                                    <div class="mt-4" id="gender">
                                        <x-input-label for="gender" :value="__('Gender')" />
                                        <div>
                                            <input type="radio" id="male" name="gender" value="male">
                                            <label for="male" class="ml-2">Male</label>

                                            <input type="radio" id="female" name="gender" value="female">
                                            <label for="female" class="ml-2">Female</label>
                                        </div>
                                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                                    </div>

                                    <!-- Age -->
                                    <div class="mt-4" id="age">
                                        <x-input-label for="age" :value="__('Age')" />
                                        <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" />
                                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                                    </div>
                                    
                                    <!-- Phone Number -->
                                    <div class="mt-4" id="phone">
                                        <x-input-label for="phone" :value="__('Phone Number')" />
                                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>

                                    <!-- Country -->
                                    <div class="mt-4" id="country">
                                        <x-input-label for="country" :value="__('Country')" />
                                        <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="country" required onchange="toggleFields()">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>

                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                    </div>

                                    <!-- City -->
                                    <div class="mt-4" id="city">
                                        <x-input-label for="city" :value="__('City')" />
                                        <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" />
                                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                                    </div>


                                    <!-- Previous Religion (for Mualaf) -->
                                    <div class="mt-4" id="religion">
                                        <x-input-label for="religion" :value="__('Religion')" />
                                        <x-text-input id="religion" class="block mt-1 w-full" type="text" name="religion" :value="old('religion')" />
                                        <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                                    </div>

                                    <div class="mt-4">
                                        <x-input-label  for="issue" :value="__('Issue ')" />
                                            <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="issue" name="issue" required>
                                                <option value="Misunderstanding About Islam">Misunderstanding About Islam</option>
                                                <option value="God Existence">God Existence</option>
                                                <option value="Fiqh">Fiqh</option>
                                                <option value="Prophet">Prophet</option>
                                                <option value="Sirah">Sirah</option>
                                                <option value="Ibadah">Ibadah</option>
                                            </select>
                                    </div>

                                    <div class="mt-4">
                                        <x-input-label for="note" :value="__('Description')" />
                                        <textarea class="block p-2.5 h-24 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="note" name="note" required></textarea>
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Register Mad`u') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>


                            <table id="datatable" class="w-full bg-white">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Name</th>
                                        <th class="px-2 py-3 text-left">Phone Number</th>
                                        <th class="px-2 py-3 text-left">Issue</th>
                                        <th class="px-2 py-3 text-left">Registered By</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($madu as $madu)
                                    <tr class="border-b-2">
                                        <td class="px-2 py-3 text-left">{{ $loop->iteration }}</td>
                                        <td class="px-2 py-3 text-left">{{ $madu->name }}</td>
                                        <td class="px-2 py-3 text-left">{{ $madu->phone }}</td>
                                        <td class="px-2 py-3 text-left">{{ $madu->issue }}</td>
                                        <td class="px-2 py-3 text-left">{{ $madu->user->name }}</td>
                                        <td class="px-2 py-3 text-left">
                                            <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                <x-button-view><a href="{{ route('madu.detail', $madu->id) }}">View Detail</a></x-button-view>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8">No user found.</td>
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