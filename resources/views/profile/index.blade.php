@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="float-left">Details van: {{ $profile->name }}</h4> 
                    <a href="/"><button type="submit" class="btn btn-primary float-right">< Back to homepage</button></a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $profile->name }}</td>
                                <td>{{ $profile->email }}</td>
                                <td>
                                    <a href="/profile/edit"><button type="button" class="btn btn-primary float-left">Edit</button></a>
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