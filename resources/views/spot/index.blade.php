@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left">Spots</h4> 
                    <a href="/spots/create"><button type="submit" class="btn btn-primary float-right">Add new spot</button></a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Region</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($spots as $spot)
                            <tr>
                                <th scope="row">{{ $spot->id }}</th>
                                <td>{{ $spot->name }}</td>
                                <td>{{ $spot->location }}</td>
                                <td>{{ $spot->region }}</td>
                                <td>{{ $spot->image }}</td>
                                <td>
                                    <a href="{{ route('spot.show', $spot->id) }}"><button type="button" class="btn btn-primary float-left">Show</button></a>
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
