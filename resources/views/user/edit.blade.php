@extends("components.main")

@section('content')
    <h1>Klant Bewerken</h1>
    <form method="post" action="{{ route('api.user.update', ['id' => $user->id]) }}" data-handle-errors>

        @csrf


        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="text" class="form-control" id="email" name="email" data-error-message="Vul een E-mail in"
                   placeholder="E-mailadres"
                   value="{{$user->email}}">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name" placeholder="Name"
                   data-error-message="Vul een Naam in"
                   value="{{$user->name}}">
            @error('name')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label"> Selecteer een rol</label>
            <select name="role_id" id="role_id" class="form-select" data-error-message="Selecteer een rol">
                <option disabled value="">Gebruikersrol</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}"
                            @if($user->role_id == $role->id) selected @endif>{{ $role->name }}</option>
                @endforeach
            </select>
            @error('role_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Bijwerken">
        </div>
    </form>
@endsection
