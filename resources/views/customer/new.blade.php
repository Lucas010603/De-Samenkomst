@extends("components.main")

@section('content')
    <h1>Klant aanmaken</h1>
    <form method="post" action="{{route('api.customer.store')}}" data-handle-errors>
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="Name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="Name" name="Name" placeholder="Naam"
                   data-error-message="Vul een Naam in">

        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Bedrijfsnaam</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Bedrijfsnaam"
                   data-error-message="Vul een Bedrijfsnaam in">

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mailadres"
                   data-error-message="Vul een geldig e-mail in">

        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefoonnummer</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="06123456789"
                   data-error-message="Vul een geldig telefoonnummer in">

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
