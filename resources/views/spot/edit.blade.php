@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit spot</div>

                <div class="card-body">
                    <form action="{{ route('spot.update', $spot) }}" method="POST">
                        @method('post')

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name*</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $spot->name }}"/>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location" class="col-md-2 col-form-label text-md-right">Location*</label>
                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $spot->location }}"/>

                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="region" class="col-md-2 col-form-label text-md-right">Region*</label>
                            <div class="col-md-6">
                                <select id="region" name="region" class="form-control">
                                    <option selected>{{ $spot->region }}</option>
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
                            <label for="image" class="col-md-2 col-form-label text-md-right">Image*</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" value="/storage/{{ $spot->image }}"/>
                                <img class="w-50 mt-1" src='/storage/{{ $spot->image }}'>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="website" class="col-md-2 col-form-label text-md-right">Website*</label>
                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ $spot->website }}"/>

                                @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" name="visible" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                        </div>

                        @csrf
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection