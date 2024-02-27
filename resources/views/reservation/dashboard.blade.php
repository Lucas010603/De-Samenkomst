@extends("components.main")
@section('content')
    <h2>Reserveringen van vandaag</h2>
    @include('reservation.component-table', ['id' => "almostExpiredTable", 'reservations' => $reservations])
    <h2>Bijna verlopen huurcontracten</h2>
    @include('reservation.component-table', ['id' => "reservationTable",'reservations' => $almostExpired])
    <script>
        function deleteReservation(id){
            axios.put(`/api/reservation/delete/${id}`)
                .then(response => {
                    window.location.reload();
                })
                .catch(error => {

                });
        }
    </script>
@endsection
