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
                        <div class="table-responsive dash-social">
                            <div class="flex justify-end items-center">
                                <form action="{{ route('search.user') }}" method="GET" class="px-4 py-2">

                                    <x-text-input for="search" name="search" />
                                    <x-primary-button>{{ __('Search') }}</x-primary-button>

                                </form>
                                <x-button-add x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-user')">{{ __('Add New User') }}
                                </x-button-add>
                            </div>

                            <x-modal name="add-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('user.add') }}" class="p-6">
                                    @csrf
                                    <!-- Name -->
                                    <div>
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- User Type -->
                                    <div class="mt-4">
                                        <x-input-label for="usertype" :value="__('User Type')" />

                                        <div class="grid grid-cols-2 gap-4 mt-1">
                                            <div class="flex items-center">
                                                <input type="checkbox" id="mualaf" name="usertype[]" value="mualaf" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()">
                                                <label for="mualaf" class="ml-2 text-sm font-medium text-gray-700">Mualaf</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="checkbox" id="daie" name="usertype[]" value="daie" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()">
                                                <label for="daie" class="ml-2 text-sm font-medium text-gray-700">Daie</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="checkbox" id="mentor" name="usertype[]" value="mentor" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()">
                                                <label for="mentor" class="ml-2 text-sm font-medium text-gray-700">Mentor</label>
                                            </div>

                                            <div class="flex items-center">
                                                <input type="checkbox" id="admin" name="usertype[]" value="admin" class="form-checkbox text-primary focus:ring-primary-dark h-4 w-4" onchange="toggleFields()">
                                                <label for="admin" class="ml-2 text-sm font-medium text-gray-700">Admin</label>
                                            </div>
                                        </div>

                                        <x-input-error :messages="$errors->get('usertype')" class="mt-2 text-red-500 text-sm" />
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

                                    <!-- Country -->
                                    <div class="mt-4" id="country">
                                        <x-input-label for="country" :value="__('Country')" />
                                        <select id="country" class="block mt-1 w-full" name="country" required onchange="toggleFields()">
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

                                    <!-- Phone Number -->
                                    <div class="mt-4" id="phone_number">
                                        <x-input-label for="phone_number" :value="__('Phone Number')" />
                                        <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')" />
                                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                    </div>

                                    <!-- Previous Religion (for Mualaf) -->
                                    <div class="mt-4" id="previous_religion">
                                        <x-input-label for="previous_religion" :value="__('Previous Religion')" />
                                        <x-text-input id="previous_religion" class="block mt-1 w-full" type="text" name="previous_religion" :value="old('previous_religion')" />
                                        <x-input-error :messages="$errors->get('previous_religion')" class="mt-2" />
                                    </div>

                                    <!-- Syahadah Date (for Mualaf) -->
                                    <div class="mt-4" id="syahadah_date">
                                        <x-input-label for="syahadah_date" :value="__('Syahadah Date')" />
                                        <input id="syahadah_date" class="block mt-1 w-full" type="date" name="syahadah_date" :value="old('syahadah_date')" />
                                        <x-input-error :messages="$errors->get('syahadah_date')" class="mt-2" />
                                    </div>

                                    <!-- Facebook Page -->
                                    <div class="mt-4" id="facebook_page">
                                        <x-input-label for="facebook_page" :value="__('Facebook Page')" />
                                        <x-text-input id="facebook_page" class="block mt-1 w-full" type="text" name="facebook_page" :value="old('facebook_page')" />
                                        <x-input-error :messages="$errors->get('facebook_page')" class="mt-2" />
                                    </div>

                                    <!-- Status -->
                                    <div class="mt-4" id="status">
                                        <x-input-label for="status" :value="__('Status')" />
                                        <x-text-input id="status" class="block mt-1 w-full" type="text" name="status" :value="old('status')" />
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

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Register') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>


                            <table id="datatable" class="w-full bg-white">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Name</th>
                                        <th class="px-2 py-3 text-left">Email</th>
                                        <th class="px-2 py-3 text-left">Roles</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($users as $user)
                                    <tr class="border-b-2">
                                        <td class="px-2 py-3 text-left">{{ $user->id }}</td>
                                        <td class="px-2 py-3 text-left">{{ $user->name }}</td>
                                        <td class="px-2 py-3 text-left">{{ $user->email }}</td>
                                        <td class="px-2 py-3 text-left">{{ $user->usertype }}</td>
                                        <td class="px-2 py-3 text-left">
                                            <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                <div class="inline-flex items-center px-4 py-2">
                                                    <x-button-edit><a href="{{ route('admin.edit', $user->id) }}">Edit</a></x-button-edit>
                                                </div>
                                                <x-button-view><a href="{{ route('admin.view', $user->id) }}">View</a></x-button-view>
                                                <form action="{{ route('user.delete', $user->id) }}" method="POST" class="px-4 py-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-button-delete onclick="return confirm('Are you sure?')">Delete</x-button-delete>
                                                </form>
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
                    <div class="p-2">{{$users->links()}}</div>
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
            hideFields(allFields);
        }

        function hideFields(fields) {
            fields.forEach(function(field) {
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