@extends("components.main")

@section("content")
    <div class="overflow-auto">
    <table id="roomTable" class="table">
        <thead>
        <tr>
            <th scope="col">Kamer Nummer</th>
            <th scope="col">Kamer Naam</th>
            <th scope="col">Maximale Capaciteit</th>
            <th scope="col">Tafelindeling</th>
            <th scope="col">Monitoren</th>
            @if(auth()->user()->role->name == "beheerder")
                <th scope="col">Acties</th>
            @endif
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
                @if(auth()->user()->role->name == "beheerder")
                    <td>
                        <a href="{{ route('room.edit', ['id' => $room->id]) }}" class="btn btn-success">Bijwerken</a>
                        <a class="btn btn-danger" onclick="deleteRoom({{$room->id}})">Verwijderen</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <script>
        $(document).ready(function () {
            $('#roomTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
                }
            });
        });

        function deleteRoom(id) {
            axios.put(`/api/room/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error);
                });
        }
    </script>
@endsection
