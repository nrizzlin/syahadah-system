<x-app-layout>

    @include('sweetalert::alert')
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

                            <div class="flex justify-end items-center">
                                <form action="{{ route('search.resources') }}" method="GET" class="px-4 py-2">
    
                                    <x-text-input for="search" name="search"/>
                                    <x-primary-button>{{ __('Search') }}</x-primary-button>
    
                                </form>
                                <div class="flex justify-end">
                                    <x-button-add><a href="{{ route('resources.create') }}">Add New Resources</a></x-button-add>
                                </div>
                            </div>
                        <div class="table-responsive dash-social">
                            <table id="datatable" class="w-full bg-white">
                                <thead class="thead-light">
                                    <tr class="border-b-2">
                                        <th class="px-2 py-3 text-left">No</th>
                                        <th class="px-2 py-3 text-left">Title</th>
                                        <th class="px-2 py-3 text-left">Description</th>
                                        <th class="px-2 py-3 text-left">Category</th>
                                        <th class="px-2 py-3 text-left">Created at </th>
                                        <th class="px-2 py-3 text-left">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($resources as $resource)
                                        <tr class="border-b-2">
                                            <td class="px-2 py-3 text-left" >{{ $loop->iteration}}</td>
                                            <td class="px-2 py-3 text-left">{{ $resource->title }}</td>
                                            <td class="px-2 py-3 text-left">{{ $resource->description }}</td>
                                            <td class="px-2 py-3 text-left">{{ $resource->category }}</td>
                                            <td class="px-2 py-3 text-left">{{ $resource->created_at->format('d-m-Y')}}</td>
                                            <td class="px-2 py-3 text-left">
                                                <div class="flex justify-start inline-flex items-center px-4 py-2">
                                                    <div class="inline-flex items-center px-4 py-2">
                                                        <x-button-edit ><a href="{{ route('resources.edit', $resource->id) }}">Edit</a></x-button-edit>
                                                    </div>
                                                    <x-button-view ><a href="{{ route('resources.view', $resource->id) }}">View</a></x-button-view>
                                                    <form action="{{ route('resources.destroy', $resource->id) }}" method="POST" class="px-4 py-2">
                                                        @csrf
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <x-button-delete class="confirm-button">Delete</x-button-delete>
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
                        </div>
                    </div>
                    <div class="p-2">{{$resources->links()}}</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script type="text/javascript">

    $('.confirm-button').click(function(event) {
        var form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
</x-app-layout>
