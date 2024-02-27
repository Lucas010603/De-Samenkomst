@extends("components.main")

@section('content')

    <div class="mb-3">
        <label for="userStatus" class="form-label"> Selecteer een filter optie</label>
        <select name="userStatus" id="userStatus" class="form-select" data-error-message="Selecteer een optie">
            <option selected value="Actieve gebruikers">Actieve gebruikers</option>
            <option value="all">Alle gebruikers</option>
            <option value="deleted">Verwijderde gebruikers</option>
        </select>
        @error('userStatus')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <table id="customerTable" class="table">

        <thead>

        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Bedrijf</th>
            <th scope="col">Email</th>
            <th scope="col">Telefoonnummer</th>
            <th scope="col">Actie</th>
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

                </td>
                <td>
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

        function fillDataTable(data) {
            console.log("Filtered Data:", data);
            var table = $('#customerTable').DataTable();
            table.clear().draw();
            data.forEach(function (customer) {
                table.row.add([
                    customer.name,
                    customer.company,
                    customer.email,
                    customer.phone,
                    `<a href="/customer/${customer.id}/edit" class="btn btn-success">Bijwerken</a>`,
                    `<button class="btn btn-danger" onclick="deleteCustomer(${customer.id})">Verwijderen</button>`
                ]).draw();
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

        document.getElementById('userStatus').addEventListener('change', function () {
            var status = this.value;
            axios.get(`/customer/customer/${status}`)
                .then(function (response) {
                    fillDataTable(response.data);
                })
                .catch(function (error) {
                    console.error(error);
                });
        });
    </script>

@endsection
