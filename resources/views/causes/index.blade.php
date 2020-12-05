@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    Causes
                    <a href="{{ route('causes.create') }}"class="btn btn-sm btn-primary float-right" >Crear</a>

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
                                <th>Causes</th>
                                <th colspan=2 >&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($causes as $cause)
                                <tr>
                                    <td> {{$cause->id}} </td>
                                    <td> {{$cause->cause}} </td>
                                    <td>
                                        <a href="{{route('causes.edit',$cause)}}" class="  float-right btn btn-sm btn-primary">
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
