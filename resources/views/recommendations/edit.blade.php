
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Recommendation</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form 
                    action="{{route('recommendations.update',$recommendation)}}" 
                    method="POST" 
                    enctype="multipart/form-data">
                        <div class="form-group">
                            <label > Recommendation *</label>
                            <input type="text" name="recommendation" class="form-control" required value="{{ old('recommendation',$recommendation->recommendation) }}">
                        </div>
                        <div class="form-group">
                            <label > Concept</label>
                            <textarea name="concept" rows="6" class="form-control" required> {{ old('concept',$recommendation->concept) }}</textarea>
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
