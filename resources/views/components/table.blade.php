<table id="datatable" class="w-full bg-white">
    <thead class="thead-light">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse($users as $users)
            <tr>
                <td>{{ $users->id }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->email }}</td>
                <td>
                    <a href="{{ route('admin.edit', $users->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('user.delete', $users->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No user found.</td>
            </tr>
        @endforelse
    </tbody>
</table>