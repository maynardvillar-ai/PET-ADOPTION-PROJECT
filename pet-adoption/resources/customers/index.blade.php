<h1>Customers</h1>

<a href="/customers/create">Add Customer</a>

<ul>
@foreach($customers as $customer)
    <li>
        {{ $customer->name }} - {{ $customer->email }}

        <a href="/customers/{{ $customer->id }}/edit">Edit</a>

        <form action="/customers/{{ $customer->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </li>
@endforeach
</ul>