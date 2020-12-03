@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Diseases</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                    action="{{route('diseases.store')}}" 
                    method="POST"
                    enctype="multipart/form-data"
                    >
                        <div class="form-group">
                            <label> Disease *</label>
                            <input type="text" name="disease" class = "form-control" required>
                        </div>
                        <div class="form-group">
                            <label> Concept *</label>
                            <textarea name="concept" rows="6" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <select name="popurality">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3" >3</option>
                                <option value="4">4</option>
                                <option value="5" selected>5</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="category_id">
                                @foreach($categoryDiseases as $categoryDisease)
                                        <option value="{{$categoryDisease->id}}">{{$categoryDisease->category}}</option>
                                @endforeach    
                            </select>
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
