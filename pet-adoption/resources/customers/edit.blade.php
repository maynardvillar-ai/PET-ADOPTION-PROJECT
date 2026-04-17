<h1>Edit Customer</h1>

<form action="/customers/{{ $customer->id }}" method="POST">
    @csrf
    @method('PUT')

    Name: <input type="text" name="name" value="{{ $customer->name }}"><br>
    Email: <input type="email" name="email" value="{{ $customer->email }}"><br>

    <button type="submit">Update</button>
</form>