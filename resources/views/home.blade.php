@extends('layouts.app')

@section('content')


    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-header"> Facebook </div>

                    <div class="col-sm-6 col-12">
                        <label for="valid-state">Url</label>
                        <input type="text" class="form-control is-valid" id="valid-state" placeholder="Valid" value="http://localhost:8000/{{ auth()->id() }}/facebook/permission" required="">
                        <div class="valid-feedback"></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ $facebook_login_url }}" class="btn btn-sm btn-facebook" > Please Login in fb </a>
                    </div>
                </div>
            </div>
        </div>














    </div>






@endsection
