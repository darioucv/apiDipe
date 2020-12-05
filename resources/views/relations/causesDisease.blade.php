@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Disease - Cause</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form 
                    action="/saveCausesDisease" 
                    method="POST"
                    enctype="multipart/form-data"
                    >
                    
                    <div class="form-group">
                        <label> Disease:  </label> {{$disease->disease}}
                        <input type="text" name="disease_id1" class = "form-control" value="{{$disease->id}}" required>
                    </div>
                    <div class="form-group">
                        <h3>Cause</h3>
                        <select name="cause_id">
                            @foreach($causes as $cause)
                                <option value="{{$cause->id}}">{{$cause->cause}}</option>
                            @endforeach    
                        </select>
                    </div>
                    <div class="form-group">
                        @csrf
                        <input type="submit" value="Enviar" class="btn btn-sm btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
