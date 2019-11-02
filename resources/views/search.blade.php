@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/"> < Back</a>
    
    @if(isset($details))
        <h2>Search result for {{ $query }} is :</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Region</th>
                </tr>
            </thead>
            <tbody>
                @foreach($details as $spot)
                <tr>
                    <td>{{ $spot->name }}</td>
                    <td>{{ $spot->location }}</td>
                    <td>{{ $spot->region }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    @if(isset($errorMessage))
       <br> {{ $errorMessage }}
    @endif
</div>
@endsection