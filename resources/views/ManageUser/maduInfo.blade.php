<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mad u Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        <div class="w-full">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Mad`u Information') }}</h2>
                            <form method="post"  class="p-6">
                                @csrf
        
                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$madu->name" disabled />
                                    
                                </div>
      
                                <!-- Gender -->
                                <div class="mt-4" id="gender">
                                    <x-input-label for="gender" :value="__('Gender')" />
                                    <x-text-input id="gender" class="block mt-1 w-full" type="text" name="gender" :value="$madu->gender" disabled />
                                </div>


                                <div class="mt-4" id="age">
                                    <x-input-label for="age" :value="__('Age')" />
                                    <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="$madu->age" disabled />
                                </div>

                                <!-- Phone Number -->
                                <div class="mt-4" id="phone">
                                    <x-input-label for="phone" :value="__('Phone Number')" />
                                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$madu->phone" disabled />
                                </div>


                                <!-- Country -->
                                <div class="mt-4" id="country">
                                    <x-input-label for="country" :value="__('Country')" />
                                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" :value="$madu->country" disabled />
                                </div>

                                <!-- City -->
                                <div class="mt-4" id="city">
                                    <x-input-label for="city" :value="__('City')" />
                                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="$madu->city" disabled />
                                </div>
                                
                                <!-- Previous Religion (for Mualaf) -->
                                <div class="mt-4" id="religion">
                                    <x-input-label for="religion" :value="__('Religion')" />
                                    <x-text-input id="religion" class="block mt-1 w-full" type="text" name="religion" :value="$madu->religion" disabled />
                                    <x-input-error :messages="$errors->get('religion')" class="mt-2" />
                                </div>

                                <div class="mt-4" id="issue">
                                    <x-input-label for="issue" :value="__('Issue')" />
                                    <x-text-input id="issue" class="block mt-1 w-full" type="text" name="issue" :value="$madu->issue" disabled />
                                    <x-input-error :messages="$errors->get('issue')" class="mt-2" />
                                </div>

                                <div class="mt-4">
                                    <x-input-label for="note" :value="__('Description')" />
                                    <x-input-textarea id="note" name="note" disabled>{{ $madu->note }}</x-input-textarea>
                                </div>

                                <div class="mt-4" id="daie_id">
                                    <x-input-label for="daie_id" :value="__('Register By')" />
                                    <x-text-input id="daie_id" class="block mt-1 w-full" type="text" name="daie_id" :value="$madu->user->name" disabled />
                                    <x-input-error :messages="$errors->get('daie_id')" class="mt-2" />
                                </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-button-back><a href="{{ route('madu.index') }}">BACK</a></x-button-back>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
