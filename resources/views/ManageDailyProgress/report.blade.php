<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Progress Daily Mualaf') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 m-4 text-gray-900 justify-center">
                    {{-- {{ __("You're logged in as Admin!") }} --}}
                    <div class="col-xl-3 col-md-3 mr-4 sm:rounded-lg ">
                        <div class="card bg-primary text-white mb-4 l">
                            <div class="card-body text-sm">Total Daily Progress Mualaf
                                <h2 class="text-6xl">{{$TotalDP}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3 ml-4">
                        <div class="card bg-purple-500 text-white mb-4">
                            <div class="card-body text-sm">Total Daily Progress Mualaf This Month
                                <h2 class="text-6xl">{{$TotalDPMonth}}</h2>
                                <h2 class="text-6xl"></h2>
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
                            <form action="{{ route('dailyprogress.search-data') }}" method="GET" class="px-4 py-2">
        
                                <x-text-input for="search" name="search"/>
                                <x-primary-button>{{ __('Search') }}</x-primary-button>
        
                            </form>
                        </div>
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="w-full bg-white">
                                <thead class="thead-light">
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Title</th>
                                        <th class="px-2 py-3 text-left">Date</th>
                                        <th class="px-2 py-3 text-left">Writen By</th>
                                        <th class="px-2 py-3 text-left">Status</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($progressdailyD as $progressdailys)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left" >{{ $loop->iteration }}</td>
                                            <td class="px-2 py-3 text-left">{{ $progressdailys->title }}</td>
                                            <td class="px-2 py-3 text-left">{{ $progressdailys->date->format('d-m-Y')}}</td>
                                            <td class="px-2 py-3 text-left">{{ $progressdailys->user->name }}</td>
                                            <td class="px-2 py-3 text-left">
                                                <span class="@if($progressdailys->status== 'Moderate') bg-yellow-400 text-white text-sm rounded-full p-2.5 @elseif($progressdailys->status == 'Worst') bg-red-700 text-white text-sm rounded-full p-2.5 @elseif($progressdailys->status == 'Good') bg-green-500 text-white text-sm rounded-full p-2.5 @endif">
                                                    {{ $progressdailys->status}}
                                                </span></td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <x-button-view ><a href="{{ route('dailyprogress.view', $progressdailys->id) }}">View</a></x-button-view>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No Progress Daily found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="p-2">
                        {{$progressdailyD->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>