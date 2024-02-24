@extends("components.main")

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/datatable.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">



    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <table id="customerTable" class="table">
        <thead>
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
                    <a href="{{ route('customer.edit', ['customer' => $customer]) }}" class="btn btn-success">Edit</a>

                    <form action="{{ route('customer.delete', $customer->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>
@endsection
