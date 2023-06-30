<form id="userRegistrationForm" method="POST" action="{{ route('users.store') }}">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>
    <!-- Add other form fields -->
    <button type="submit">Register</button>
</form>
