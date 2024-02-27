@extends("components.main")

@section('content')
    <h1>Klant aanmaken</h1>
    <form method="post" action="{{ route('api.user.store') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mailadres">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Naam"
                   data-error-message="Vul een naam in">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password"
                   data-error-message="Vul een wachtwoord in" placeholder="Wachtwoord">
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label"> Bevestig Wachtwoord</label>
            <input type="password" class="form-control" id="password_confirmation"
                   data-error-message="Bevestig wachtwoord" name="password_confirmation" placeholder="Wachtwoord">
            @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label"> Selecteer een rol</label>
            <select name="role_id" id="role_id" class="form-select" data-error-message="Selecteer een rol">
                <option selected disabled value="">Gebruikersrol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Opslaan">
        </div>
    </form>
@endsection
