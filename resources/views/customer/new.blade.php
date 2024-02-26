@extends("components.main")

@section('content')
    <h1>Klant aanmaken</h1>
    <form method="post" action="{{url('/api/customer/store')}}">
        @csrf
        @method('post')
{{--        ToDo @Stef: add optional field "naam"--}}
        <div class="mb-3">
            <label for="company" class="form-label">Bedrijfsnaam</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Bedrijfsnaam">
            @error('company')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mailadres">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefoonnummer</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="06123456789">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
@endsection
