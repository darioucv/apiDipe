@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Disease</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                    action="{{route('diseases.update',$disease)}}" 
                    method="POST" 
                    enctype="multipart/form-data">
                        <div class="form-group">
                            <label > Disease *</label>
                            <input type="text" name="disease" class="form-control" required value="{{ old('disease',$disease->disease) }}">
                        </div>
                        <div class="form-group">
                            <label > concept</label>
                            <textarea name="concept" rows="6" class="form-control" required> {{ old('concept',$disease->concept) }}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="popularity">
                                <optgroup label="Actual">
                                    <option value="{{$disease->popurality}}" selected="true" >{{$disease->popurality}}</option>
                                </optgroup>
                                <optgroup label="Elegir Nuevo">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="category_id">
                                <optgroup label="Actual">
                                    <option value="{{$categoryDiseaseID->id}}"selected="true" >{{$categoryDiseaseID->category}}</option>
                                </optgroup>
                                <optgroup label="Elegir Nuevo">
                                @foreach($categoryDiseases as $categoryDisease)
                                    <option value="{{$categoryDisease->id}}">{{$categoryDisease->category}}</option>
                                @endforeach    
                                </optgroup>
                            </select>
                        </div>

                        <div class="form-group">
                            <label > Image</label>
                            <input type="file" name="image">
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
