@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add new spot</div>

                <div class="card-body">
                    <form action="/spots" enctype="multipart/form-data" method="POST">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required/>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-2 col-form-label text-md-right">Location</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control" name="location" required/>
                            
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-2 col-form-label text-md-right">Region</label>
                            <div class="col-md-6">
                                <input id="region" type="text" class="form-control" name="region" required/>
                            
                                @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-2 col-form-label text-md-right">Image</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control-file" name="image"/>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @csrf
                        <button type="submit" class="btn btn-primary">Add new spot</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
