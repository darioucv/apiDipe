@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> 
                    Categories
                    <a href="{{ route('categories.create') }}"class="btn btn-sm btn-primary float-right" >Crear</a>

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
                                <th>Categories</th>
                                <th colspan=2 >&nbsp;</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td> {{$category->id}} </td>
                                    <td> {{$category->category}} </td>
                                    <td>
                                        <a href="{{route('categories.edit',$category)}}" class="  float-right btn btn-sm btn-primary">
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
