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
                            <div class="flex justify-between items-center mt-4">
                                <button id="showMualafList" class="px-4 py-2 bg-blue-500 text-white rounded">Mualaf List</button>
                                <button id="showMentorList" class="px-4 py-2 bg-blue-500 text-white rounded">Mentor List</button>
                                <button id="showAssignForm" class="px-4 py-2 bg-blue-500 text-white rounded">Assign Mualaf</button>
                            </div>

                        
                        <div id="MualafList" class="toggleable p-6 text-gray-900">
                            <h2 class="text-lg font-medium text-gray-900 text-center">{{ __('Mualaf List') }}</h2>

                            <div class="table-responsive dash-social">
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
                                                            <x-button-view ><a href="{{ route('mualaf.viewInfo', $users->id) }}">View</a></x-button-view>
                                                        </div>
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

                        <div id="MentorList" class="toggleable p-6 text-gray-900">
                            <h2 class="text-lg font-medium text-gray-900 text-center">{{ __('Mentor List') }}</h2>

                            <div class="table-responsive dash-social">
                                <table id="datatable" class="w-full bg-white">
                                    <thead>
                                        <tr class="border-b-2">
                                            <th class="px-2 py-3 text-left">No</th>
                                            <th class="px-2 py-3 text-left">Name</th>
                                            <th class="px-2 py-3 text-left">Email</th>
                                            <th class="px-2 py-3 text-left">Specialist</th>
                                            <th class="px-2 py-3 text-left">Action</th>
                                        </tr>
                                    </thead>
    
                                    <tbody>
                                        @forelse($mentors as $mentor)
                                            <tr class="border-b-2">
                                                <td class="px-2 py-3 text-left">{{ $mentor->id }}</td>
                                                <td class="px-2 py-3 text-left" >{{ $mentor->name }}</td>
                                                <td class="px-2 py-3 text-left">{{ $mentor->email }}</td>
                                                <td class="px-2 py-3 text-left">{{ optional($mentor->specialist)->category }}</td>
                                                <td class="px-2 py-3 text-left">
                                                    <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                        <div class="inline-flex items-center px-4 py-2">
                                                            <x-button-view ><a href="">View</a></x-button-view>
                                                        </div>
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

                        <div id="assignMualaf" class="toggleable p-6 text-gray-900">
                            <h2 class="text-lg font-medium text-gray-900 text-center">
                                {{ __('Assigned Mualaf to Mentor') }}</h2>

                            <form id="assignForm" action="{{ route('admin.store-assign') }}" method="POST" enctype="multipart/form-data">
                                @csrf
    
                                <div class="mt-4">
                                    <x-input-label for='mualaf' :value="__('Select Mualaf')"/>
                                    <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="mualaf" name="mualaf" required>
                                        @foreach ($mualafs as $mualaf)
                                            <option value="{{$mualaf->id}}">{{$mualaf->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="mt-4">
                                    <x-input-label for='mentor' :value="__('Select Mentor')"/>
                                    <select class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="mentor" name="mentors[]" required multiple>
                                        @foreach ($mentors as $mentor)
                                            <option value="{{$mentor->id}}">{{$mentor->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="flex items-center mt-4">
                                    <x-primary-button>{{ __('Assign Mualaf') }}</x-primary-button>
                                </div>
                            </form>  
                        </div>
                    </div><!--end card-body-->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Button elements
            const showMualafListBtn = document.getElementById('showMualafList');
            const showMentorListBtn = document.getElementById('showMentorList');
            const showAssignFormBtn = document.getElementById('showAssignForm');
            
            // Get all div elements with the class 'toggleable'
            const toggleableDivs = document.querySelectorAll('.toggleable');
            
            // Event listeners
            showMualafListBtn.addEventListener('click', showMualafList);
            showMentorListBtn.addEventListener('click', showMentorList);
            showAssignFormBtn.addEventListener('click', showAssignForm);
    
            // Hide all div sections initially
            toggleableDivs.forEach(function(div) {
                div.classList.add('hidden');
            });
    
            function showMualafList() {
                toggleableDivs.forEach(function(div) {
                    div.classList.add('hidden');
                });
                MualafList.classList.toggle('hidden');
            }
    
            function showMentorList() {
                toggleableDivs.forEach(function(div) {
                    div.classList.add('hidden');
                });
                MentorList.classList.toggle('hidden');
            }
    
            function showAssignForm() {
                toggleableDivs.forEach(function(div) {
                    div.classList.add('hidden');
                });
                assignMualaf.classList.toggle('hidden');
            }
        });
    </script>
</x-app-layout>
