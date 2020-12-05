@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                    action="{{route('users.store')}}" 
                    method="POST"
                    enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label> Name *</label>
                            <input type="text" name="name" class = "form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Email *</label>
                            <input name="email" type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Password *</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection