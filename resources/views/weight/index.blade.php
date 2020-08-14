@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">My Weight</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($weight as $weight)
                            <li class="list-group-item">                         
                                <a title="Show Details" href="/weight/{{$weight->id}}">{{$weight->weight}}kg</a>
                                <form class="float-right" style="display:inline" action="/weight/{{$weight->id}}" method="post">
                                    @csrf
                                    <a title="Edit" href="/weight/{{$weight->id}}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    @method("DELETE")
                                    <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                </form>
                                <span class="mx-2">{{$weight->created_at->diffForHumans()}}</span>
                            </li>                            
                        @endforeach
                    </ul>
                </div>
            </div>

            {!! $chart->container() !!}

            {!! $chart->script() !!}



            <div class="mt-2">
                <a href="/weight/create" class="btn btn-success btn-sm">New Weight</a>
            </div>
        </div>
    </div>
</div>


@endsection
