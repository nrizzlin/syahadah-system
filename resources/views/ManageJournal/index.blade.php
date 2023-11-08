<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Journal Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="w-full">

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Your Journal') }}s</h2>

                            <div class="flex justify-end">
                                <x-button-add><a href="{{ route('journals.create') }}">Add Journal</a></x-button-add>
                            </div>
                        {{-- <a href="{{ route('daie.journals.create') }}" class="btn btn-success">Add Journal</a> --}}
                        
                        <div class="table-responsive dash-social">
                        
                            @if($journals)
                            <table id="datatable" class="w-full bg-white">
                                <thead class="thead-light">
                                    <tr class="border-b-2">
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($journals as $journal)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left" >{{ $journal->id }}</td>
                                            <td class="px-2 py-3 text-left">{{ $journal->title }}</td>
                                            <td class="px-2 py-3 text-left">{{ $journal->description }}</td>
                                            <td class="px-2 py-3 text-left">{{ $journal->date }}</td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <div class="inline-flex items-center px-4 py-2">
                                                        <x-button-view ><a href="{{ route('journal.view', $journal->id) }}">View</a></x-button-view>
                                                    </div>
                                                    <x-button-edit ><a href="{{ route('journals.edit', $journal->id) }}">Edit</a></x-button-edit>
                                                    <form action="{{ route('journals.destroy', $journal->id) }}" method="POST" class="px-4 py-2">
                                                        @csrf
                                                        @method('DELETE')
                                                        <x-button-delete onclick="return confirm('Are you sure?')">Delete</x-button-delete>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">No journals found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            @else
                                <p>No journals found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
