@extends("components.main")

@section('content')
    <table id="userTable" class="table">
        <thead>

        <tr>
            <th scope="col">Email</th>
            <th scope="col">Naam</th>
            <th scope="col">Rol</th>
            <th scope="col">Actie</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->email }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role->name }}</td>

                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Bijwerken</a>
                    <a class="btn btn-danger" onclick="deleteUser({{$user->id}})">Verwijderen</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            $('#userTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });

        function deleteUser(id) {
            axios.put(`/api/user/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    </script>
@endsection
