@extends("components.main")

@section('content')
    <h1>Reservering aanmaken</h1>
    <form method="post" action="{{route('api.reservation.store')}}" data-handle-errors>
        @csrf
        @method('post')
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
                    <option value="{{ $customer->id }}">{{ $customer->name }} {{ $customer->company ?? '' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Kamer</label>
            <select name="room_id" id="room" class="form-select" data-error-message="Selecteer een geldige kamer">
                <option selected disabled value="">Kamer</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}"> {{ $room->name ?? '' }} ({{ $room->number }})</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="start" class="form-label">Van</label>
            <input type="datetime-local" class="form-control" id="start" name="start"
                   data-error-message="vul een geldige start datum in">
        </div>
        <div class="mb-3">
            <label for="end" class="form-label">Tot</label>
            <input type="datetime-local" class="form-control" id="end" name="end"
                   data-error-message="vul een geldige eind datum in">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Klant aanmaken mislukt. probeer het nog eens.
        </div>
    @endif
@endsection
@section('scripts')
    <script>

    </script>
@endsection
