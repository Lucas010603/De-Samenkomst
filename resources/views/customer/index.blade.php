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
        @foreach ($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->company }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>
                    <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-success">Bijwerken</a>
                    <a class="btn btn-danger" onclick="deleteCustomer({{$customer->id}})">Verwijderen</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            initializeDataTable();
        });

        function initializeDataTable() {
            $('#customerTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        }

        function deleteCustomer(id) {
            axios.put(`/api/customer/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.error(error);
                });
        }

    </script>

@endsection
