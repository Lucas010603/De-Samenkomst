@extends("components.main")

@section("content")
    <h1>Klant aanmaken</h1>
    <form method="post" action="{{url('/api/customer/store')}}">
        @csrf
        @method('post')
        <div class="mb-3">
            <label for="company" class="form-label">Kamernummer</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Kamernummer">
            @error('room number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Kamernaam</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Kamernaam">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Maximale Capaciteit</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Voor hoeveel personen is het kantoor">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Opslaan">
        </div>
    </form>
@endsection

@section('scripts')
@endsection
