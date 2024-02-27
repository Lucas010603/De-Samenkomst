@extends("components.main")

@section('content')
    <h1>Klant Bewerken</h1>
    <form method="post" action="{{ route('api.customer.update', ['id' => $customer->id]) }}" data-handle-errors>
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Naam</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="name"
                   value="{{$customer->name}}">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="company" class="form-label">Bedrijfsnaam</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="Bedrijfsnaam"
                   value="{{$customer->company}}">
            @error('company')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mailadres</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="E-mailadres"
                   value="{{$customer->email}}">
            @error('email')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telefoonnummer</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="06123456789"
                   value="{{$customer->phone}}">
            @error('phone')
            <div class=" text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Bijwerken">
        </div>
    </form>
@endsection
