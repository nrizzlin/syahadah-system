
<x-app-layout>
    @include('sweetalert::alert')

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

                            <x-modal name="add-user" :show="$errors->has('userDeletion') || $errors->has('name') || $errors->has('email') || $errors->has('usertype') || $errors->has('specialist_id') || $errors->has('gender') || $errors->has('age') || $errors->has('country') || $errors->has('city') || $errors->has('phone_number') || $errors->has('previous_religion') || $errors->has('syahadah_date') || $errors->has('facebook_page') || $errors->has('status') || $errors->has('password')" focusable>
                                <form method="post" action="{{ route('user.add') }}" class="p-6" enctype="multipart/form-data">
                                    @csrf

                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                                        {{ __('Registration User') }}
                                    </h2><hr>

                                    <!-- Name -->
                                    <div class="mt-4" id="name">
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>

                                    <!-- Email Address -->
                                    <div class="mt-4" id="email">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- User Type -->
                                    <div class="mt-4" id="usertype" >
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

                                    <div class="mt-4" id="specialist_id">
                                        <x-input-label for="specialist_id" :value="__('Specialist Category')" />
                                        <select id="specialist_id" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="specialist_id">
                                            <option value="">Select Specialist Category</option>
                                            @foreach ($specialists as $specialist)
                                                <option value="{{ $specialist->id }}">{{ $specialist->category }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('specialist_category')" class="mt-2" />
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
                                        <select id="country" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="country" required onchange="toggleFields()">
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
                                        <input id="syahadah_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" type="date" name="syahadah_date" :value="old('syahadah_date')" />
                                        <x-input-error :messages="$errors->get('syahadah_date')" class="mt-2" />
                                    </div>

                                    <!-- Supporting Documents -->
                                    <div class="mt-4" id="attachment">
                                        <x-input-label for="attachment" :value="__('Supporting Documents')" />
                                        <input id="attachment" type="file" class="block mt-1 w-full" name="attachment">
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
                                        <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="status" name="status" required>
                                            <option value="active">active</option>
                                            <option value="unactive">unactive</option>
                                        </select>
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
                                        <td class="px-2 py-3 text-left">{{ $loop->iteration }}</td>
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
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <x-button-delete class="confirm-button">Delete</x-button-delete>
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
            var userTypeCheckboxes = document.getElementsByName('usertype[]');
            var selectedUserTypes = Array.from(userTypeCheckboxes).filter(checkbox => checkbox.checked).map(checkbox => checkbox.value);
            
            // Hide all fields first
            hideAllFields();
    
            // Show fields based on selected user types
            if (selectedUserTypes.includes('mualaf')) {
                showFields(['name','gender', 'age', 'country', 'city', 'email', 'phone_number', 'previous_religion', 'syahadah_date', 'facebook_page', 'status','attachment']);
            }
    
            if (selectedUserTypes.includes('mentor') || selectedUserTypes.includes('admin') || selectedUserTypes.includes('daie')) {
                showFields(['name','gender', 'age', 'country', 'city', 'email', 'phone_number', 'facebook_page', 'status','specialist_id']);
            }
        }
    
        function hideAllFields() {
            var allFields = ['gender', 'age', 'country', 'city', 'phone_number', 'previous_religion', 'syahadah_date', 'facebook_page', 'status','specialist_id','attachment'];
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">

    $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
</x-app-layout>