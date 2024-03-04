@extends("components.main")

@section('content')
    <div class="mb-3">
        <label for="userStatus" class="form-label"> Selecteer een filter optie</label>
        <select name="userStatus" id="userStatus" class="form-select" data-error-message="Selecteer een optie">
            <option selected value="active">Actieve gebruikers</option>
            <option value="all">Alle gebruikers</option>
            <option value="deleted">Verwijderde gebruikers</option>
        </select>
    </div>
<div class="overflow-auto">
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
</div>
    <script>
        $(document).ready(function () {
            $('#customerTable').DataTable({
                "processing": false,
                "serverSide": true,
                "ajax": {
                    "url": "{{ route('customer.filter') }}",
                    "type": "GET",
                    "data": function (d) {
                        d.filter = $('#userStatus').val(); // Set the 'filter' parameter value
                    }
                },
                "columns": [
                    {"data": "name"},
                    {"data": "company"},
                    {"data": "email"},
                    {"data": "phone"},
                    {"data": "actions", "orderable": false, "searchable": false}
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });

            $('#userStatus').on('change', function () {
                $('#customerTable').DataTable().ajax.reload();
            });
        });

        function toggleStatus(id) {
            axios.put(`/api/customer/toggle/status/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {

                });
        }
    </script>
@endsection
