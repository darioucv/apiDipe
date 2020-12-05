@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                    action="{{route('categories.store')}}" 
                    method="POST"
                    enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label> Category *</label>
                            <input type="text" name="category" class = "form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Description *</label>
                            <textarea name="description" rows="6" class="form-control" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label> Image</label>
                            <input type="file" name="image">
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