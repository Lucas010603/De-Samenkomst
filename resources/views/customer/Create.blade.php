@extends("components.main")

@section('content')
    <h1>Create Customer</h1>
    <form method="post" action="{{url('/customer/store')}}">
        @csrf
        @method('post')

        <div class="mb-3">
            <label for="company" class="form-label">Company name</label>
            <input type="text" class="form-control" id="company" name="company" placeholder="example company">
            @error('company')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="06123456789">
            @error('phone')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <input type="submit" value="Create Customer">
        </div>
    </form>
@endsection
