<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resources Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('List of Resources') }}s</h2>

                            <div class="flex justify-end">
                                <x-button-add><a href="{{ route('resources.create') }}">Add New Resources</a></x-button-add>
                            </div>
                        {{-- <a href="{{ route('daie.journals.create') }}" class="btn btn-success">Add Journal</a> --}}
                        
                        <div class="table-responsive dash-social">
                        
                            @if($resources)
                            <table id="datatable" class="w-full bg-white">
                                <thead class="thead-light">
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Title</th>
                                        <th class="px-2 py-3 text-left">Description</th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($resources as $resources)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left" >{{ $resources->id }}</td>
                                            <td class="px-2 py-3 text-left">{{ $resources->title }}</td>
                                            <td class="px-2 py-3 text-left">{{ $resources->description }}</td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <div class="inline-flex items-center px-4 py-2">
                                                        <x-button-edit ><a href="{{ route('resources.edit', $resources->id) }}">Edit</a></x-button-edit>
                                                    </div>
                                                    <x-button-view ><a href="{{ route('resources.view', $resources->id) }}">View</a></x-button-view>
                                                    <form action="{{ route('resources.destroy', $resources->id) }}" method="POST" class="px-4 py-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button-delete onclick="return confirm('Are you sure?')">Delete</x-button-delete>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No event found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @else
                                <p>No event found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
