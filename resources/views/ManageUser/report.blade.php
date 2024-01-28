<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-6 text-gray-900 justify-center">
                    <div class="col-xl-2 col-md-3 mr-4 sm:rounded-lg ">
                        <div class="card bg-primary text-white mb-4 l">
                            <div class="card-body text-sm">Total of Users
                                <h2 class="text-6xl">{{$Totalusers}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 ml-4 sm:rounded-lg ">
                        <div class="card  bg-purple-500 text-white mb-4 l">
                            <div class="card-body text-sm">Total of Daie
                                <h2 class="text-6xl">{{$Totaldaie}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 ml-4 sm:rounded-lg ">
                        <div class="card bg-orange-500 text-white mb-4 l">
                            <div class="card-body text-sm">Total of Mentor
                                <h2 class="text-6xl">{{$Totalmentor}}</h2>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class=" text-xs text-white stretched-link" href="#">View Details</a>
                                <div class=" text-xs text-white"><i class="fas fa-angle-right"></i> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-md-3 ml-4 sm:rounded-lg ">
                        <div class="card bg-green-500 text-white mb-4 l">
                            <div class="card-body text-sm">Total of Mualaf
                                <h2 class="text-6xl">{{$Totalmualaf}}</h2>
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
                            <form action="{{ route('user.search-data') }}" method="GET" class="px-4 py-2">
        
                                <x-text-input for="search" name="search"/>
                                <x-primary-button>{{ __('Search') }}</x-primary-button>
        
                            </form>
                        </div>
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="w-full bg-white">
                                <thead class="thead-light">
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Name</th>
                                        <th class="px-2 py-3 text-left">Email</th>
                                        <th class="px-2 py-3 text-left">Roles</th>
                                        <th class="px-2 py-3 text-left">Last Seen</th>
                                        <th class="px-2 py-3 text-left">Status Last Seen</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($usersD  as $user)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left">{{ $loop->iteration }}</td>
                                            <td class="px-2 py-3 text-left" >{{ $user->name }}</td>
                                            <td class="px-2 py-3 text-left">{{ $user->email }}</td>
                                            <td class="px-2 py-3 text-left">{{ $user->usertype }}</td>
                                            <td class="px-2 py-3 text-left">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                            <td class="px-2 py-3 text-left">
                                                @if(Cache::has('user-online-' . $user->id))
                                                <span class=" bg-green-500 text-white text-sm rounded-full p-2.5">Online</span>
                                                @else
                                                <span class=" bg-red-600 text-white text-sm rounded-full p-2.5">Offline</span>
                                                @endif
                                            </td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <x-button-view ><a href="{{ route('admin.view', $user->id) }}">View</a></x-button-view>
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
                    <div class="p-2">
                        {{$usersD->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>