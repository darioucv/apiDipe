
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Cause</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                    action="{{route('causes.update',$cause)}}" 
                    method="POST" 
                    enctype="multipart/form-data">
                        <div class="form-group">
                            <label > Cause *</label>
                            <input type="text" name="cause" class="form-control" required value="{{ old('cause',$cause->cause) }}">
                        </div>
                        <div class="form-group">
                            <label > Description</label>
                            <textarea name="description" rows="6" class="form-control" required> {{ old('description',$cause->description) }}</textarea>
                        </div>

                        <div>
                            <div class="form-group">
                                @csrf
                                @method('PUT')
                                <input type="submit" value="Update" class="btn btn-sm btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
