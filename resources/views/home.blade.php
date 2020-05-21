@extends('master')

@section('title', 'HomePage')

@section('content')

    Input:

    <form action="/dist" method="post">
        <input type="text" name="noPlayer" placeholder="Number Of Players"
            class="@error('title') is-invalid @enderror">

        {{ csrf_field() }}
        <button type="submit">Submit</button>

        @error('noPlayer')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </form>

    
    
    <br>


@endsection