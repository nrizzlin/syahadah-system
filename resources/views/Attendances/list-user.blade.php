<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Clock-in/Clock-out') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="table-responsive dash-social">
                            
                            @if($attendances)
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
                                    @forelse($attendances as $attendances)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{ $attendances->id }}</td>
                                            <td class="px-2 py-3 text-left">{{ $attendances->user->name }}</td>
                                            <td class="px-2 py-3 text-left" >
                                            @if(isset($attendances->tasks) && is_array($attendances->tasks))
                                                @foreach($attendances->tasks as $task)
                                                    {{ $task }}<br>
                                                @endforeach
                                            @endif
                                            </td>
                                            <td class="px-2 py-3 text-left">{{ $attendances->clockIn }}</td>
                                            <td class="px-2 py-3 text-left">{{ $attendances->clockOut }}</td>
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
</x-app-layout>