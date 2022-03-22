@extends('app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
<div class="card card-default">
    <a class="btn btn-primary" href="{{ route('home') }}">Back to Home</a>
    <div class="card-header">
        <form class="row row-cols-auto g-1">
            <div class="col">
                <input class="form-control" type="text" name="q" value="{{ $q }}" placeholder="Search here..." />
            </div>
            <div class="col">
                <button class="btn btn-success">Refresh</button>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="{{ route('dummyCrud.create') }}">Add</a>
            </div>
        </form>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-bordered table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>dummyCrud Name</th>
                    <th>Contact Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php $no = 1 ?>
            @foreach($dummyCruds as $dummyCrud)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $dummyCrud->customer_name }}</td>
                <td>{{ $dummyCrud->contact_name }}</td>
                <td>{{ $dummyCrud->address }}</td>
                <td>{{ $dummyCrud->city }}</td>
                <td>
                    <a class="btn btn-sm btn-warning" href="{{ route('dummyCrud.edit', $dummyCrud) }}">Edit</a>
                    <form method="POST" action="{{ route('dummyCrud.destroy', $dummyCrud) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection