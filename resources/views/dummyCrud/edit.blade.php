@extends('app')
@section('content')
<div class="row">
    <div class="col-md-6">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('dummyCrud.update', $dummyCrud) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Customer Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="customer_name" value="{{ old('customer_name', $dummyCrud->customer_name) }}" />
            </div>
            <div class="mb-3">
                <label>Contact Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="contact_name" value="{{ old('contact_name', $dummyCrud->contact_name) }}" />
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input class="form-control" type="text" name="address" value="{{ old('address', $dummyCrud->address) }}" />
            </div>
            <div class="mb-3">
                <label>City</label>
                <input class="form-control" type="text" name="city" value="{{ old('city', $dummyCrud->city) }}" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Save</button>
                <a class="btn btn-danger" href="{{ route('dummyCrud.index') }}">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection