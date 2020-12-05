@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    Recommendations
                    <a href="{{ route('recommendations.create') }}"class="btn btn-sm btn-primary float-right" >Crear</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table" >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Recommendations</th>
                                <th colspan=2 >&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($recommendations as $recommendation)
                                <tr>
                                    <td> {{$recommendation->id}} </td>
                                    <td> {{$recommendation->recommendation}} </td>
                                    <td>
                                        <a href="{{route('recommendations.edit',$recommendation)}}" class="  float-right btn btn-sm btn-primary">
                                            Editar
                                        </a>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
