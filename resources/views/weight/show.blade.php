@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Weight Detail</div>

                <div class="card-body">
                    <b>{{$weight->weight}}</b>
                    <p>{{$weight->created_at}}</p>
                </div>
            </div>

            <div class="mt-2">
                <a href="{{URL::previous()}}" class="btn btn-primary btn-sm">Back</a>
                <a href="/" class="btn btn-primary btn-sm">Menu</a>
            </div>

        </div>
    </div>
</div>
@endsection
