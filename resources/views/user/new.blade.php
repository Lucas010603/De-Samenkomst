@extends("components.main")

@section('content')
    <h1>Klant aanmaken</h1>
    <form method="post" action="{{ route('api.user.store') }}" data-handle-errors>
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mailadres"
                   data-error-message="vul een geldig e-mail in">

        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Naam "
                   data-error-message="vul een Naam in"
                   data-error-message="Vul een naam in">

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="password" name="password"
                   data-error-message="Vul een wachtwoord in" placeholder="Wachtwoord"
                   data-error-message="vul een wachtwoord in">

        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label"> Bevestig Wachtwoord</label>
            <input type="password" class="form-control" id="password_confirmation"
                   data-error-message="Bevestig wachtwoord" name="password_confirmation" placeholder="Wachtwoord"
                   data-error-message="Bevestig wachtwoord">

        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label"> Selecteer een rol</label>
            <select name="role_id" id="role_id" class="form-select" data-error-message="Selecteer een rol">
                <option selected disabled value="">Gebruikersrol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>

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
