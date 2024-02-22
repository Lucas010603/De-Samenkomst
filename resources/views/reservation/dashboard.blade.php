@extends("components.main")

@section("content")
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad culpa cumque eos et fuga fugiat impedit incidunt, laboriosam libero nisi nobis, non perferendis reiciendis suscipit temporibus unde. A ab alias autem beatae commodi consectetur corporis cupiditate deleniti distinctio dolorem doloribus earum enim eos est ex fugiat fugit id inventore itaque iusto, laboriosam laudantium maxime nemo obcaecati officia omnis pariatur perspiciatis quisquam repellat temporibus unde velit vitae voluptatum. Culpa in ipsa optio perferendis quidem? A ab accusantium aspernatur autem consequuntur cum cumque dicta eligendi enim fugit harum iste itaque iure minus, nam neque officiis optio repellat sit soluta veniam voluptatibus?
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            alert("jQuery is working in child view!");
        });
    </script>
@endsection
