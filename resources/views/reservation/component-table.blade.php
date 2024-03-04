<div class="overflow-auto">
    <table id="{{$id}}" class="table">
        <thead>
        <tr>
            <th scope="col">Bedrijfsnaam</th>
            <th scope="col">Klantnaam</th>
            <th scope="col">Kamer naam</th>
            <th scope="col">Kamer nummer</th>
            <th scope="col">Contract</th>
            <th scope="col">Start</th>
            <th scope="col">Einde</th>
            <th scope="col">Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->customer->company ?? "n.v.t."}}</td>
                <td>{{ $reservation->customer->name ?? "n.v.t."}}</td>
                <td>{{ $reservation->room->name ?? "n.v.t."}}</td>
                <td>{{ $reservation->room->number ?? "n.v.t."}}</td>
                <td>{{ $reservation->is_contract ? "ja" : "nee"}}</td>
                <td>{{ $reservation->start->format("d-m-Y H:i")}}</td>
                <td>{{ $reservation->end->format("d-m-Y H:i")}}</td>
                <td>
                    <a href="{{ route('reservation.edit', ['id' => $reservation->id])}}" class="btn btn-success">Bijwerken</a>
                    <a class="btn btn-danger" onclick="deleteReservation({{$reservation->id}})">Annuleren</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#{{$id}}').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Dutch.json"
            }
        });
    });
</script>
