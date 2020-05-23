@extends('master')

@section('title', 'HomePage')

@section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    Output:
    
    
    <!-- {{ $noPlayer }} {{ $noCard }} {{ number_format($noCard, 0) }}
    <br>

    @foreach ($shuffled as $val)
        {{ $val->id }}:{{ $val->spade }}-{{ $val->number }}
    @endforeach -->

    <br>

    <ul>
    @foreach ($chunks as $index=>$chunk)
        <li>
        <strong>Player {{ $index+1 }}: </strong>
        @foreach ($chunk as $val)
            {{ $val->spade }}-{{ $val->number }},
        @endforeach
        </li>

        @if ($index >= $noPlayer-1 )
            @break
        @endif
    @endforeach
    </ul>

@endsection