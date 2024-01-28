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
                            {{ __('Update User Information') }}
                        </h2>
                        <form method="post" action="{{ route('user.update', $users->id) }}" class="p-6"  enctype="multipart/form-data">
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

                            <div class="mt-4" id="specialist_id">
                                <x-input-label for="specialist_id" :value="__('Specialist Category')" />
                                <select id="specialist_id" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="specialist_id">
                                    <option value="">Select Specialist Category</option>
                                    @foreach ($specialists as $specialist)
                                        <option value="{{ $specialist->id }}" @if($users->specialist_id == $specialist->id) selected @endif>{{ $specialist->category }}</option>
                                     @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('specialist_category')" class="mt-2" />
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
                                <select id="country" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="country" required>
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
                                <input id="syahadah_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" type="date" name="syahadah_date" :value="$users->syahadah_date" />
                                <x-input-error :messages="$errors->get('syahadah_date')" class="mt-2" />
                            </div>


                            <!-- Supporting Documents -->
                            <div class="mt-4" id="attachment">
                                <x-input-label for="attachment" :value="__('Supporting Documents')" />
                                <input id="attachment" type="file" class="block mt-1 w-full" name="attachment">
                            </div>
                            
                            <!-- Current Supporting Documents -->
                            <div class="mt-4" id="current_attachement">
                                <x-input-label for="current_attachement" :value="__('Supporting Documents')" />
                                <div class="block mt-1 w-full">
                                    {{ $users->attachment}}
                                    <x-button-view><a href="{{ route('viewfile', $users->attachment) }}">View</a></x-button-view>
                                </div>
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
                                <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                    <option value="active">active</option>
                                    <option value="unactive">unactive</option>
                                </select>
                            </div>

                            <div class="flex items-center mt-4">
                                <x-button-edit>{{ __('Update') }}</x-button-edit>
                                <div class=" ml-2 flex items-center justify-end">
                                    <x-button-back><a href="{{ url()->previous() }}">BACK</a></x-button-back>
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
        // Trigger toggleFields when the page loads
        document.addEventListener("DOMContentLoaded", function () {
            toggleFields();
        });
    
        function toggleFields() {
            var userTypeCheckboxes = document.getElementsByName('usertype[]');
            var selectedUserTypes = Array.from(userTypeCheckboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);
    
            // Hide all fields first
            hideAllFields();
    
            // Show fields based on selected user types
            if (selectedUserTypes.includes('mualaf')) {
                showFields(['name','gender', 'age', 'country', 'city', 'email', 'phone_number', 'previous_religion', 'syahadah_date', 'facebook_page', 'status','attachment','current_attachement']);
            }
    
            if (selectedUserTypes.includes('mentor') || selectedUserTypes.includes('admin') || selectedUserTypes.includes('daie')) {
                showFields(['name','gender', 'age', 'country', 'city', 'email', 'phone_number', 'facebook_page', 'status','specialist_id']);
            }
        }
    
        function hideAllFields() {
            var allFields = ['gender', 'age', 'country', 'city', 'phone_number', 'previous_religion', 'syahadah_date', 'facebook_page', 'status','specialist_id','attachment','current_attachement'];
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