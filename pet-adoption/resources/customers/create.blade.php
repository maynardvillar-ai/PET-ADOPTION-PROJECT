<h1>Create Customer</h1>

<form action="/customers" method="POST">
    @csrf
    Name: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    <button type="submit">Save</button>
</form>