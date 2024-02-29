@extends("components.main")

@section('content')
    <h1>Reservering bijwerken</h1>
    <form method="post" action="{{ route('api.reservation.update', ['id' => $reservation->id]) }}" data-handle-errors>
        @csrf
        <div class="container">
            <div class="row">

            </div>
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Klant / Bedrijf</label>
            <select name="customer_id" id="company" class="form-select"
                    data-error-message="Selecteer een geldige klant of bedrijf">
                <option selected disabled value="">Klant / Bedrijf</option>
                @foreach($customers as $customer)
                    <option {{$customer->id == $reservation->customer->id ? "selected" : ""}} value="{{ $customer->id }}">{{ $customer->company ?? $customer->name ?? "n.v.t." }} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Kamer</label>
            <select name="room_id" id="room" class="form-select" data-error-message="Selecteer een geldige kamer">
                <option selected disabled value="">Kamer</option>
                @foreach($rooms as $room)
                    <option {{$room->id == $reservation->room->id ? "selected" : ""}} value="{{ $room->id }}"> {{ $room->name ?? '' }}
                        ({{ $room->number }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start" class="form-label">Van</label>
            <input type="datetime-local" class="form-control" id="start" disabled
                   data-error-message="vul een geldige start datum en tijd in"
                   value="{{ \Carbon\Carbon::parse($reservation->start)->format('Y-m-d\TH:i') }}">
        </div>
        <div class="mb-3">
            <label for="end" class="form-label">Tot</label>
            <input type="datetime-local" class="form-control" id="end"
                   disabled
                   data-error-message="vul een geldige eind datum en tijd in"
                   value="{{ \Carbon\Carbon::parse($reservation->end)->format('Y-m-d\TH:i') }}">
        </div>
        <div class="mb-3">
            <input type="button" onclick="extendReservation()" class="btn btn-primary" value="Verlengen">
            <input type="submit" class="btn btn-primary" value="Bijwerken">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Klant bijwerken mislukt. probeer het nog eens.
        </div>
    @endif
    <script>
        let reservationId = @json($reservation->id)

        function extendReservation() {
            axios.put(`/api/reservation/extend/${reservationId}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {
                    console.log(error)
                });
        }
    </script>
@endsection
