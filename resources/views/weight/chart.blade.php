@extends('layouts.app')


@section('content')


@auth
    <div style="width: 50%" class="container">
        <h1 class="text-center">My Weight</h1>
        {!! $weightsChart->container() !!}
    </div>
@endauth



@endsection

@push('scripts')
  
        {{-- ChartScript --}}
        @isset($weightsChart)
        {!! $weightsChart->script() !!}
        @endisset
   

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>



@endpush





