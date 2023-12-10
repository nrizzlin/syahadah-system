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
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('User Management') }}
                        </h2>
                        <form method="post" action="{{ route('user.update', $users->id) }}" class="p-6">
                            @csrf
                            @method('PUT')


                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$users->name" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$users->email" required autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- User Type -->
                            <div class="mt-4">
                                <x-input-label for="usertype" :value="__('User Type')" />

                                <div class="grid grid-cols-2 gap-4 mt-1">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="mualaf" name="usertype[]" value="mualaf" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()" @if(in_array('mualaf', $userTypes)) checked @endif>
                                        <label for="mualaf" class="ml-2 text-sm font-medium text-gray-700">Mualaf</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" id="daie" name="usertype[]" value="daie" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()" @if(in_array('daie', $userTypes)) checked @endif>
                                        <label for="daie" class="ml-2 text-sm font-medium text-gray-700">Daie</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" id="mentor" name="usertype[]" value="mentor" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()" @if(in_array('mentor', $userTypes)) checked @endif>
                                        <label for="mentor" class="ml-2 text-sm font-medium text-gray-700">Mentor</label>
                                    </div>

                                    <div class="flex items-center">
                                        <input type="checkbox" id="admin" name="usertype[]" value="admin" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()" @if(in_array('admin', $userTypes)) checked @endif>
                                        <label for="admin" class="ml-2 text-sm font-medium text-gray-700">Admin</label>
                                    </div>
                                </div>

                                <x-input-error :messages="$errors->get('usertype')" class="mt-2 text-red-500 text-sm" />
                            </div>


                            <!-- Gender -->
                            <div class="mt-4" id="gender">
                                <x-input-label for="gender" :value="__('Gender')" />
                                <div>
                                    <input type="radio" id="male" name="gender" value="male" @if($users->gender === 'male') checked @endif>
                                    <label for="male" class="ml-2">Male</label>

                                    <input type="radio" id="female" name="gender" value="female" @if($users->gender === 'female') checked @endif>
                                    <label for="female" class="ml-2">Female</label>
                                </div>
                                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                            </div>

                            <!-- Age -->
                            <div class="mt-4" id="age">
                                <x-input-label for="age" :value="__('Age')" />
                                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="$users->age" />
                                <x-input-error :messages="$errors->get('age')" class="mt-2" />
                            </div>

                            <!-- Country -->
                            <div class="mt-4" id="country">
                                <x-input-label for="country" :value="__('Country')" />
                                <select id="country" class="block mt-1 w-full" name="country" required>
                                    @foreach ($countries as $country)
                                    <option value="{{ $country }}" @if($users->country === $country) selected @endif>{{ $country }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('country')" class="mt-2" />
                            </div>

                            <!-- City -->
                            <div class="mt-4" id="city">
                                <x-input-label for="city" :value="__('City')" />
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$users->city" />
                                <x-input-error :messages="$errors->get('city')" class="mt-2" />
                            </div>

                            <!-- Phone Number -->
                            <div class="mt-4" id="phone_number">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$users->phone_number" />
                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                            </div>

                            <!-- Previous Religion (for Mualaf) -->
                            <div class="mt-4" id="previous_religion">
                                <x-input-label for="previous_religion" :value="__('Previous Religion')" />
                                <x-text-input id="previous_religion" class="block mt-1 w-full" type="text" name="previous_religion" :value="$users->previous_religion" />
                                <x-input-error :messages="$errors->get('previous_religion')" class="mt-2" />
                            </div>

                            <!-- Syahadah Date (for Mualaf) -->
                            <div class="mt-4" id="syahadah_date">
                                <x-input-label for="syahadah_date" :value="__('Syahadah Date')" />
                                <input id="syahadah_date" class="block mt-1 w-full" type="date" name="syahadah_date" :value="$users->syahadah_date" />
                                <x-input-error :messages="$errors->get('syahadah_date')" class="mt-2" />
                            </div>

                            <!-- Facebook Page -->
                            <div class="mt-4" id="facebook_page">
                                <x-input-label for="facebook_page" :value="__('Facebook Page')" />
                                <x-text-input id="facebook_page" class="block mt-1 w-full" type="text" name="facebook_page" :value="$users->facebook_page" />
                                <x-input-error :messages="$errors->get('facebook_page')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div class="mt-4" id="status">
                                <x-input-label for="status" :value="__('Status')" />
                                <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="$users->status" />
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center mt-4">
                                <x-button-edit>{{ __('Update') }}</x-button-edit>
                                <div class=" ml-2 flex items-center justify-end">
                                    <x-button-back><a href="{{ route('list_users') }}">BACK</a></x-button-back>
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


    <script>
        function toggleFields() {
            var userType = document.getElementById('usertype').value;

            // Hide all fields first
            hideAllFields();

            // Show fields based on user type
            if (userType === 'mentor' || userType === 'admin' || userType === 'daie') {
                showFields(['gender', 'age', 'country', 'city', 'email', 'phone_number', 'facebook_page', 'status']);
            }

            if (userType === 'mualaf') {
                showFields(['gender', 'age', 'country', 'city', 'email', 'phone_number', 'previous_religion', 'syahadah_date', 'facebook_page', 'status']);
            }
        }

        function hideAllFields() {
            var allFields = ['gender', 'age', 'country', 'city', 'email', 'phone_number', 'previous_religion', 'syahadah_date', 'facebook_page', 'status'];
            allFields.forEach(function(field) {
                document.getElementById(field).style.display = 'none';
            });
        }

        function showFields(fields) {
            fields.forEach(function(field) {
                document.getElementById(field).style.display = 'block';
            });
        }
    </script>
</x-app-layout>