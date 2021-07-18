@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>


            </div>
        </div>
        <div class="card-body">
            <h2>Choose Ad Account(s)</h2>

            <select id="cars" name="cars">
                @foreach($adAccounts as $value)
                    <option value="{{ $value['id']}}">{{ $value['name']}}</option>
                @endforeach
            </select>

            <br>

            <h2>Choose Page(s)</h2>


                <select id="cars" name="cars">
                    @foreach($pageLists as $page)
                    <option value="{{ $page['id']}}">{{ $page['name']}}</option>
                    @endforeach
                </select>

{{--            <br>--}}

{{--            <h2>Choose Catalogue(s)</h2>--}}

{{--            <select id="cars" name="cars">--}}
{{--                @foreach($pageLists as $page)--}}
{{--                    <option value="{{ $page['id']}}">{{ $page['name']}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}

            <br>
            <h2>Choose Pixel(s)</h2>

            <select id="cars" name="cars">
                @foreach($pixelLists as $pixel)
                    <option value="{{ $pixel['id']}}">{{ $pixel['name']}}</option>
                @endforeach
            </select>

            <br>
            <h2>Choose Instagram Account(s)</h2>

            <select id="cars" name="cars">
                @foreach($igLists as $ig)
                    <option value="{{ $ig['id']}}">{{ $ig['username']}}</option>
                @endforeach
            </select>


        </div>
    </div>
@endsection
