
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                    action="{{route('users.update',$user)}}" 
                    method="POST">
                        <div class="form-group">
                            <label > Name *</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name',$user->name) }}">
                        </div>
                        
                        <div class="form-group">
                            <label> Password *</label>
                            <input name="password" type="password" class="form-control" required>
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
