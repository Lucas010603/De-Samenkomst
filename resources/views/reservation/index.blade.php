@extends("components.main")

@section('content')
    @include('reservation.component-table', ['id' => 'reservationTable', 'reservations' => $reservations])
@endsection
