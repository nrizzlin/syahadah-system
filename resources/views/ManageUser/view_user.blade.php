<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div class="w-full">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                                {{ __('User Information') }}</h2><hr>
                            <form method="post"  class="p-6">
                                @csrf
        
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$users->name" disabled />
                                    
                                </div>
        
                                <!-- Email Address -->
                                <div class="mt-4">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$users->email" disabled />
                                    
                                </div>
        
                                <!-- User Type -->
                                <div class="mt-4">
                                    <x-input-label for="usertype" :value="__('User Type')" />
                                    <x-text-input id="usertype" class="block mt-1 w-full" type="text" name="usertype" :value="$users->usertype" disabled />

                                </div>
        
                                <!-- Gender -->
                                <div class="mt-4" id="gender">
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="$users->gender" disabled />
                                </div>
        
                                                            <!-- Additional Fields based on User Type -->
                            @if($users->usertype == 'mentor' || $users->usertype == 'admin' || $users->usertype == 'daie')
                            <!-- Age -->
                            <div class="mt-4" id="age">
                                <x-input-label for="age" :value="__('Age')" />
                                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="$users->age" disabled />
                            </div>

                            <!-- Country -->
                            <div class="mt-4" id="country">
                                <x-input-label for="country" :value="__('Country')" />
                                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="$users->country" disabled />
                            </div>

                            <!-- City -->
                            <div class="mt-4" id="city">
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$users->city" disabled />
                            </div>

                            <!-- Phone Number -->
                            <div class="mt-4" id="phone_number">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$users->phone_number" disabled />
                            </div>

                            <!-- Additional Fields for mentor, admin, and daie -->

                            @else($users->usertype == 'mualaf')
                            <div class="mt-4" id="age">
                                <x-input-label for="age" :value="__('Age')" />
                                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="$users->age" disabled />
                            </div>

                            <!-- Country -->
                            <div class="mt-4" id="country">
                                <x-input-label for="country" :value="__('Country')" />
                                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="$users->country" disabled />
                            </div>

                            <!-- City -->
                            <div class="mt-4" id="city">
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$users->city" disabled />
                            </div>

                            <!-- Phone Number -->
                            <div class="mt-4" id="phone_number">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$users->phone_number" disabled />
                            </div>
                                <!-- Previous Religion (for Mualaf) -->
                                <div class="mt-4" id="previous_religion">
                                    <x-input-label for="previous_religion" :value="__('Previous Religion')" />
                                    <x-text-input id="previous_religion" class="block mt-1 w-full" type="text" name="previous_religion" :value="$users->previous_religion" disabled />
                                    <x-input-error :messages="$errors->get('previous_religion')" class="mt-2" />
                                </div>

                                <!-- Syahadah Date (for Mualaf) -->
                                <div class="mt-4" id="syahadah_date">
                                    <x-input-label for="syahadah_date" :value="__('Syahadah Date')" />
                                    <x-text-input id="syahadah_date" class="block mt-1 w-full" type="text" name="syahadah_date" :value="$users->syahadah_date" disabled />
                                    <x-input-error :messages="$errors->get('syahadah_date')" class="mt-2" />
                                </div>
                            @endif

    

                        <!-- Common Fields for all User Types -->
                        <div class="mt-4" id="facebook_page">
                            <x-input-label for="facebook_page" :value="__('Facebook Page')" />
                            <x-text-input id="facebook_page" class="block mt-1 w-full" type="text" name="facebook_page" :value="$users->facebook_page" disabled />
                            <x-input-error :messages="$errors->get('facebook_page')" class="mt-2" />
                        </div>

                        <div class="mt-4" id="status">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="$users->status" disabled />
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="$users->password" disabled />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-button-back><a href="{{ url()->previous() }}">BACK</a></x-button-back>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
