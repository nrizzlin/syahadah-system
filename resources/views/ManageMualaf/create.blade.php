<x-app-layout>
    @include('sweetalert::alert')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mualaf Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="table-responsive dash-social">
                            <div class="flex justify-end items-center">
                                <form action="{{ route('search.mualaf') }}" method="GET" class="px-4 py-2">
                                    <x-text-input for="search" name="search"/>
                                    <x-primary-button>{{ __('Search') }}</x-primary-button>
                                </form>

                                <x-button-add x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'add-user')"
                                    >{{ __('Add New Mualaf') }}
                                </x-button-add>
                            </div>

                            <x-modal name="add-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('mualaf.add') }}" class="p-6">
                                    @csrf

                                    <h2 class="font-semibold text-xl text-gray-800 leading-tight p-2">
                                        {{ __('Registration Mualaf') }}
                                    </h2><hr>
                                    <!-- Name -->
                                    <div class="mt-4" >
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
                                        <select id="usertype" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="usertype" required>
                                            <option value="mualaf">Mualaf</option>
                                        </select>
                                        <x-input-error :messages="$errors->get('usertype')" class="mt-2" />
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
                                        <select id="country" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" name="country" required>
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
                                        <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="mt-4">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                        type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />

                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ml-4">
                                            {{ __('Register') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </x-modal>
                            
                            @if($mualafUsers)
                            <table id="datatable" class="w-full bg-white">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Name</th>
                                        <th class="px-2 py-3 text-left">Email</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($mualafUsers as $users)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{ $loop->iteration }}</td>
                                            <td class="px-2 py-3 text-left" >{{ $users->name }}</td>
                                            <td class="px-2 py-3 text-left">{{ $users->email }}</td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <div class="inline-flex items-center px-4 py-2">
                                                        <x-button-edit ><a href="{{ route('mualaf.edit', $users->id) }}">Edit</a></x-button-edit>
                                                    </div>
                                                    <x-button-view ><a href="{{ route('mualaf.view', $users->id) }}">View</a></x-button-view>
                                                    <form action="{{ route('mualaf.delete', $users->id) }}" method="POST" class="px-4 py-2">
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
                            @else
                                <p>No user found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
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
