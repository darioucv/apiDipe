@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($diseases as $disease)
                <div class="card mb-4">
                    <div class="card-body">
                        @if ($disease->image)
                        @endif
                            <img src="diseasese/{{$disease->image}}" class="card-img-top">
                        <h5 class="card-title">{{$disease->disease}}</h5>
                        <p class="card-text">
                            <a href="{{ route ('disease', $disease)}}">Leer m&aacute;s</a>
                        </p>
                        <p class="text-muted mb-0">
                            <em>
                                &ndash; {{$disease->category->category}}
                            </em>
                            
                        </p>
                    </div>
                </div>
            @endforeach 
            {{ $diseases->links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection