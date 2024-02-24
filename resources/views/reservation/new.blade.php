@extends("components.main")

@section('content')
    <h1>Klant aanmaken</h1>
    <form method="post" action="{{url('/api/reservation/store')}}">
        @csrf
        @method('post')
        <div class="container">
            <div class="row">

            </div>
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Klant / Bedrijf</label>
            <select name="company" id="company" class="form-select">
                <option  selected disabled >Klant / Bedrijf</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }} {{ $customer->company ?? '' }}</option>
                @endforeach
            </select>
            @error('company')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="room" class="form-label">Kamer</label>
            <select name="room" id="room" class="form-select">
                <option  selected disabled >Kamer</option>
                @foreach($rooms as $room)
                    <option value="{{ $room->id }}"> {{ $room->name ?? '' }} ({{ $room->number }})</option>
                @endforeach
            </select>
            @error('room')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start" class="form-label">Van</label>
            <input type="date" class="form-control" id="start" name="start">
            @error('start')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="end" class="form-label">Tot</label>
            <input type="date" class="form-control" id="end" name="end">
            @error('end')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Opslaan">
        </div>
    </form>
@endsection
