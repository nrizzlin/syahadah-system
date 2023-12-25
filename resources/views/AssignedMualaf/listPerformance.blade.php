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
                                    @forelse($assignedMualafs as $assignedMualaf)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{$loop->iteration}}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->mualaf->name}}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->mentor->name }}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->evaluations->first()->date}}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->evaluations->first()->result_status}}</td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <div class="inline-flex items-center px-4 py-2">
                                                        <x-button-view> <a href="{{ route('assign.viewDetail', $assignedMualaf->id) }}">View</a></x-button-view>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
