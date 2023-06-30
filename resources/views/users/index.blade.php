<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>State</th>
            <th>DOB</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->state }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                </form>
                <a href="{{ route('users.approve', $user->id) }}">Approve</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
