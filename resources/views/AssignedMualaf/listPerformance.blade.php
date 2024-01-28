<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mualaf Performance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="w-full bg-white">
                                <thead>
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Mualaf Name</th>
                                        <th class="px-2 py-3 text-left">Written Mentor</th>
                                        <th class="px-2 py-3 text-left">Date</th>
                                        <th class="px-2 py-3 text-left">Performance</th>
                                        <th class="px-2 py-3 text-left">View Detail</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($performances as $performance)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{$loop->iteration}}</td>
                                            <td class="px-2 py-3 text-left">{{$performance->assignedMualaf->mualaf->name}}</td>
                                            <td class="px-2 py-3 text-left">{{$performance->assignedMualaf->mentor->name }}</td>
                                            <td class="px-2 py-3 text-left">{{$performance->date}}</td>
                                            <td class="px-2 py-3 text-left">
                                                <span class="@if($performance->result_status == 'Good') bg-yellow-400 text-white text-sm rounded-full p-2.5 @elseif($performance->result_status == 'Poor') bg-red-700 text-white text-sm rounded-full p-2.5 @elseif($performance->result_status == 'Excellent') bg-green-500 text-white text-sm rounded-full p-2.5 @endif">
                                                    {{$performance->result_status}}
                                                </span>
                                            </td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <div class="inline-flex items-center px-4 py-2">
                                                        <x-button-view> <a href="{{ route('assign.viewDetail', $performance->assignedMualaf->id) }}">View</a></x-button-view>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">No performance evaluations found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
