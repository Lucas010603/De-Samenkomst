<form method="post" action="{{url('/api/...')}}" data-handle-errors>
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="example-input" class="form-label">example input</label>
        <input type="text" class="form-control" id="example-input" name="example-input" data-error-message="Example error message">
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Opslaan">
    </div>
</form>
@if(count($errors))
    <div id="form-submit-fail" class="alert alert-danger" role="alert">
        Example Example
    </div>
@endif
