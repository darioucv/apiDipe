@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    Diseases
                    <a href="{{ route('diseases.create') }}"class="btn btn-sm btn-primary float-right" >Crear</a>

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
                                <th>T&iacute;tulo</th>
                                <th colspan=2 >&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($diseases as $disease)
                                <tr>
                                    <td> {{$disease->id}} </td>
                                    <td> {{$disease->disease}} </td>
                                    <td>
                                        <a href="{{route('diseases.edit',$disease)}}" class="  float-right btn btn-sm btn-primary">
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
