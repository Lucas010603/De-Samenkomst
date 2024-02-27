@extends("components.main")

@section('content')
    <table id="customerTable" class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Bedrijf</th>
            <th scope="col">Email</th>
            <th scope="col">Telefoonnummer</th>
            <th scope="col">Actie</th>
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
                    { "data": "name" },
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
