<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Attendances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 m-4 text-gray-900 justify-center">
                    {{-- {{ __("You're logged in as Admin!") }} --}}
                    <div class="col-xl-2 col-md-3 mr-4 sm:rounded-lg ">
                        <div class="card bg-primary text-white mb-4 l">
                            <div class="card-body text-sm">Total User Clock-in 
                                <h2 class="text-6xl">{{$clockInCount}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 ml-4">
                        <div class="card bg-purple-500 text-white mb-4">
                            <div class="card-body text-sm">Total User Clock-out 
                                <h2 class="text-6xl">{{$clockOutCount}}</h2>
                            </div>
                            <div class=" card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link text-end" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 ml-4 ">
                        <div class="card bg-primary text-white mb-4 l">
                            <div class="card-body text-sm">Total User Attendances 
                                <h2 class="text-6xl">{{$usersWithAttendanceCount}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 ml-4">
                        <div class="card bg-purple-500 text-white mb-4">
                            <div class="card-body text-sm">Total User Not Attendances 
                                <h2 class="text-6xl">{{$usersWithoutAttendanceCount}}</h2>
                            </div>
                            <div class=" card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link text-end" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 m-2 text-gray-900">
                    <div class="w-fit">
                        <div class="flex justify-end items-center">
                            <form action="{{ route('search.attendance') }}" method="GET" class="px-4 py-2">
        
                                <x-text-input for="search" name="search"/>
                                <x-primary-button>{{ __('Search') }}</x-primary-button>
        
                            </form>
                        </div>
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="w-full bg-white">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Name</th>
                                        <th class="px-2 py-3 text-left">Task</th>
                                        <th class="px-2 py-3 text-left">Clock In </th>
                                        <th class="px-2 py-3 text-left">Clock Out </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($attendances as $attendance)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{ $attendance->id }}</td>
                                            <td class="px-2 py-3 text-left">{{ $attendance->user->name }}</td>
                                            <td class="px-2 py-3 text-left" >
                                            @if(isset($attendance->tasks) && is_array($attendance->tasks))
                                                @foreach($attendance->tasks as $task)
                                                    {{ $task }}<br>
                                                @endforeach
                                            @endif
                                            </td>
                                            <td class="px-2 py-3 text-left">{{ $attendance->clockIn }}</td>
                                            <td class="px-2 py-3 text-left">{{ $attendance->clockOut }}</td>
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
                    <div class="p-2">
                        {{$attendances->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>