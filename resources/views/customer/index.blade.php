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
        </tbody>

    </table>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable({
                "processing": false,
                "serverSide": true,
                "ajax": "{{ route('customer.filter') }}",
                "columns": [
                    { "data": "company" },
                    { "data": "email" },
                    { "data": "phone" },
                    { "data": "actions", "orderable": false, "searchable": false }
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });
    </script>
@endsection
