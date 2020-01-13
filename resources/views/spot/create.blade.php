@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add new spot</div>

                <div class="card-body">
                    <form action="/spots" enctype="multipart/form-data" method="POST">
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $spot->name }}" required/>

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
                                <input id="location" type="text" class="form-control" name="location" value="{{ old('location') ?? $spot->location }}" required/>

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
                                <select id="region" name="region" class="form-control" required>
                                    <option value="" selected>Select...</option>
                                    <option>Central</option>
                                    <option>Rotterdam-Zuid</option>
                                    <option>Rotterdam-Noord</option>
                                    <option>Blijdorp</option>
                                    <option>Feyenoord</option>
                                </select>
                            
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

                        <div class="form-group row">
                            <label for="website" class="col-md-2 col-form-label text-md-right">Website</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website') ?? $spot->website }}" required/>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="custom-control custom-switch ml-1">
                            <input type="checkbox" class="custom-control-input" name="visible" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Publish Post?</label>
                        </div>
                        
                        @csrf
                        <button type="submit" class="btn btn-primary mt-2">Add new spot</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
