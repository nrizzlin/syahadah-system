<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Mualaf Performance') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 text-gray-900 justify-center">
                    <div class="col-xl-3 col-md-3 ml-4 sm:rounded-lg ">
                        <div class="card bg-primary text-white mb-4 l">
                            <div class="card-body text-sm">Total of Mualaf Poor Performance
                                <h2 class="text-6xl">{{$poorCount}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 ml-4 sm:rounded-lg ">
                        <div class="card  bg-purple-500 text-white mb-4 l">
                            <div class="card-body text-sm">Total of Mualaf Good Performance
                                <h2 class="text-6xl">{{$goodCount}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 ml-4 sm:rounded-lg ">
                        <div class="card bg-orange-500 text-white mb-4 l">
                            <div class="card-body text-sm">Total of Mualaf Excellent Performance
                                <h2 class="text-6xl">{{$excellentCount}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>           
                </div>

                <div class="p-4 m-1 text-gray-900">
                    <div class="w-fit">
                        <div class="flex justify-end items-center">
                        </div>
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="w-full bg-white">
                                <thead class="thead-light">
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Mualaf Name</th>
                                        <th class="px-2 py-3 text-left">Listed Mentor</th>
                                        <th class="px-2 py-3 text-left">Date Assign</th>
                                        <th class="px-2 py-3 text-left">Performance</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($assignedMualafs as $assignedMualaf)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{$loop->iteration}}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->mualaf->name}}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->mentor->name}}</td>
                                            <td class="px-2 py-3 text-left">{{$assignedMualaf->created_at->format('Y-m-d')}}</td>
                                            <td class="px-2 py-3 text-left">
                                                <span class="@if($assignedMualaf->evaluations->first()->result_status == 'Good') bg-yellow-400 text-white text-sm rounded-full p-2.5 @elseif($assignedMualaf->evaluations->first()->result_status == 'Poor') bg-red-700 text-white text-sm rounded-full p-2.5 @elseif($assignedMualaf->evaluations->first()->result_status == 'Excellent') bg-green-500 text-white text-sm rounded-full p-2.5 @endif">
                                                    {{$assignedMualaf->evaluations->first()->result_status}}
                                                </span></td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <x-button-view> <a href="{{ route('assign.viewDetail', $assignedMualaf->id) }}">View</a></x-button-view>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No performance mualaf  found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>