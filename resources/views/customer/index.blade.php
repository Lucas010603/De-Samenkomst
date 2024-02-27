@extends("components.main")

@section('content')
    <table id="customerTable" class="table">
        <thead>
{{--        ToDo @Stef: change to dutch--}}
        <tr>
            <th scope="col">Company</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->company }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
{{--                    ToDo @Stef: route parameters cannot take a object as parameter, you can use ($customer->id) instead--}}
                    <a href="{{ route('customer.edit', ['customer' => $customer]) }}" class="btn btn-success">Edit</a>
{{--                    ToDo @Stef: use a js function to send the put request instead of a form inside a loop--}}
                    <form action="{{ route('customer.delete', $customer->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
        {{ $customers->links('pagination::bootstrap-5') }}

    </table>
{{--    {{ $customers->links() }}--}}

    <script>
        // @ToDo @Stef: change language to dutch (see resources/examples/data-dutch-lang-settings for example)
        $(document).ready(function() {
            $('#customerTable').DataTable({
                paging: false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });
    </script>
@endsection
