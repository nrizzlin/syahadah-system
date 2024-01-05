<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Users Attendances') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                            <td class="px-2 py-3 text-left">{{ $loop->iteration }}</td>
                                            <td class="px-2 py-3 text-left">{{ $attendance->user->name }}</td>
                                            <td class="px-2 py-3 text-left" >
                                                
                                            @if(isset($attendance->tasks) && is_array($attendance->tasks))
                                                @foreach($attendance->tasks as $task)
                                                <span class="bg-purple-500 text-white text-sm rounded-full p-2.5">{{ $task }}</span>
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