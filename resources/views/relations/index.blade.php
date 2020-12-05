@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Relations: Disease - Symptom - Cause - Recommendation</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Disease</th>
                                <th>Symptom</th>
                                <th>Cause</th>
                                <th>Recommendation</th>
                                <th colspan=2 >&nbsp;</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        @foreach($diseases as $disease)
                            <tr>
                                <td>{{$disease->id}}</td>
                                <td>{{$disease->disease}}</td>
                                <td>
                                @foreach($list_symptom_by_diseases as $list_symptom_by_disease)
                                    @if($list_symptom_by_disease->disease_id2 == $disease->id)
                                       {{$list_symptom_by_disease->symptom->symptom}} <br> <hr>
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                @foreach($list_cause_by_diseases as $list_cause_by_disease)
                                    @if($list_cause_by_disease->disease_id1 == $disease->id)
                                       {{$list_cause_by_disease->cause->cause}} <br> <hr>
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                @foreach($list_recommendation_by_diseases as $list_recommendation_by_disease)
                                    @if($list_recommendation_by_disease->disease_id3 == $disease->id)
                                       {{$list_recommendation_by_disease->recommendation->recommendation}} <br> <hr>
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                    <table class="table">
                                        <tr>
                                            <td class="border-0">
                                                <a href="/createCausesDisease/{{$disease->id}}" class="btn-block btn btn-sm btn-primary">
                                                    Cause
                                                </a>  
                                            </td>  
                                        </tr>
                                        <tr>
                                            <td class="border-0">
                                                <a href="/createSymptomsDisease/{{$disease->id}}" class="btn-block btn btn-sm btn-primary">
                                                    Symptom
                                                </a>  
                                            </td>  
                                        </tr>
                                        <tr>
                                            <td class="border-0">
                                                <a href="/createRecommendationsDisease/{{$disease->id}}" class="btn-block btn btn-sm btn-primary">
                                                    Recommendation
                                                </a>  
                                            </td>  
                                        </tr>
                                        
                                       
                                    </table>
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
