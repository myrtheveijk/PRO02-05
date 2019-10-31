@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left">Details van: {{ $spot->name }}</h4> 
                    <a href="/spots"><button type="submit" class="btn btn-primary float-right">< Back</button></a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Region</th>
                                <th scope="col">Image</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $spot->name }}</td>
                                <td>{{ $spot->location }}</td>
                                <td>{{ $spot->region }}</td>
                                <td>{{ $spot->image }}</td>
                                <td>
                                    <a href="{{ route('spot.edit', $spot->id) }}"><button type="button" class="btn btn-primary float-left">Edit</button></a>

                                    <form action="/spots/{{ $spot->id}}" method="POST" class="float-left">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection