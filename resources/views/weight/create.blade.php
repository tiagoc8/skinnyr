@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Insert New Weight</div>
                    <div class="card-body">
                        <form action="/weight" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input  type="text" class="form-control{{$errors->has('weight') ? ' border-danger' : ''}}" id="weight" name="weight" value="{{old('weight')}}">
                                <small class="form-text text-danger">{!! $errors->first('weight') !!}</small>
                            </div>
                            <div class="form-group">
                                <label for="created_at">Date</label>
                                <input required type="date" class="form-control" id="created_at" name="created_at">
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Save weight">
                        </form>
                        <a class="btn btn-primary float-right" href="/weight"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection