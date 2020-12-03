@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{$disease->disease}}</h5>
                        <p class="card-text">
                            {{$disease->concept}} 
                        </p>
                        <p class="card-text">
                            Popurality: {{$disease->popurality}}
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                &ndash; {{$disease->category->category}}
                            </em>
                            
                        </p>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection