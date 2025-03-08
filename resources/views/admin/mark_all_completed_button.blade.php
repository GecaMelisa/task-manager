@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route(config('admin.route.prefix') . 'mark-all-completed') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i> Mark All as Completed
    </button>
</form>
