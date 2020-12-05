@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
                <div class="card mb-4">
                    <div class="card-body">
                        @if ($disease->image)
                            <img src="{{$disease->get_image}}" class="card-img-top">
                        @endif
                        <h5 class="card-title">{{$disease->disease}}</h5>
                        <p class="card-text">
                            {{$disease->concept}} 
                        </p>
                        <p class="card-text">
                            Popurality: {{$disease->popularity}}
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