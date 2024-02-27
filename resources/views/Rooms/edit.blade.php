@extends("components.main")

@section('content')
    <h1>Kamer bijwerken</h1>
    <form method="post" action="{{ route('api.room.update', ['id' => $rooms->id]) }}" data-handle-errors>
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Kamernummer</label>
            <input type="number" class="form-control" id="company" name="number" placeholder="123" value="{{$rooms->number}}" data-error-message="Geef een geldig kamer nummer op">
        </div>
        <div class="mb-3">
            <label class="form-label">Kamernaam</label>
            <input type="text" class="form-control" id="email" name="name" placeholder="Kamernaam" value="{{$rooms->name}}" data-error-message="Geef een geldige kamernaam op">
        </div>
        <div class="mb-3">
            <label class="form-label">Maximale Capaciteit</label>
            <input type="text" class="form-control" id="phone" name="max_capacity" placeholder="Voor hoeveel personen is het kantoor" value="{{$rooms->max_capacity}}" data-error-message="Specificeer het maximale aantal personen dat in de ruimte kan verblijven.">
        </div>
        <label class="form-label">Kamer Type</label>
        <select name="type_id" id="room" class="form-select" data-error-message="Selecteer een geldig type kamer">
            <option  selected disabled value="">Kamer Type</option>
            @foreach($roomTypes as $roomType)
                <option value="{{ $roomType->id }}" {{ $rooms->type->id == $roomType->id ? 'selected' : '' }}>
                    {{ $roomType->name }}
                </option>
            @endforeach
        </select>
        <br>
        <div class="mb-3">
            <label class="form-label">Tafel Indeling</label>
            <input type="text" class="form-control" id="phone" name="table_configuration" placeholder="Voor hoeveel personen is het kantoor" value="{{$rooms->table_configuration}}" data-error-message="Specificeer het maximale aantal personen dat in de ruimte kan verblijven.">
        </div>
        <div class="mb-3">
            <label class="form-label">Aantal Monitoren</label>
            <input type="text" class="form-control" id="phone" name="monitor" placeholder="Voor hoeveel personen is het kantoor" value="{{$rooms->monitor}}" data-error-message="Specificeer het maximale aantal personen dat in de ruimte kan verblijven.">
        </div>
        <div class="mb-3">
            <input type="submit" value="Opslaan">
        </div>
    </form>
    @if(count($errors))
        <div id="form-submit-fail" class="alert alert-danger" role="alert">
            Klant bijwerken mislukt. probeer het nog eens.
        </div>
    @endif
@endsection
@section('scripts')
    <script>

    </script>
@endsection
