@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Spots</div>

                <div class="card-body">

                    <a href="/spots/create"><button type="submit" class="btn btn-primary float-right">Add new spot</button></a>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Region</th>
                                <!-- <th scope="col">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($spots as $spot)
                            <tr>
                                <th scope="row">{{ $spot->id }}</th>
                                <td>{{ $spot->name }}</td>
                                <td>{{ $spot->location }}</td>
                                <td>{{ $spot->region }}</td>
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
