@extends("components.main")

@section('content')
    @include('reservation.component-table', ['id' => 'reservationTable', 'reservations' => $reservations])

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
