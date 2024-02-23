@extends("components.main")

@section("content")
<table class="table">
    <thead>
    <tr>
        <th scope="col">Kamer Nummer</th>
        <th scope="col">Kamer Naam</th>
        <th scope="col">Maximale Capaciteit</th>
        <th scope="col">Tafelindeling</th>
        <th scope="col">Aantal Monitoren</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($rooms as $room)
        <tr>
            <td>{{ $room->number }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->max_capacity }}</td>
            <td>{{ $room->table_configuration }}</td>
            <td>{{ $room->monitor }}</td>
            <td></td>
            <td>
{{--                <a href="{{ route('customer.edit', ['customer' => $customer]) }}" class="btn btn-success">Edit</a>--}}

{{--                <form action="{{ route('customer.delete', $customer->id) }}" method="POST" style="display: inline;">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                </form>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection

@section('scripts')
@endsection
