@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>Create new travel:</h4>

                        <form class="form-horizontal" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                <label for="type" class="col-md-4 control-label">Type</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control" name="type" value="{{ old('type') }}" required autofocus>

                                    @if ($errors->has('type'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                <label for="number" class="col-md-4 control-label">Number</label>

                                <div class="col-md-6">
                                    <input id="number" type="text" class="form-control" name="number" value="{{ old('number') }}" required>

                                    @if ($errors->has('number'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('departure') ? ' has-error' : '' }}">
                                <label for="departure" class="col-md-4 control-label">Departure</label>

                                <div class="col-md-6">
                                    <input id="departure" type="text" class="form-control" name="departure" value="{{ old('departure') }}" required>

                                    @if ($errors->has('departure'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('departure') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('arrival') ? ' has-error' : '' }}">
                                <label for="arrival" class="col-md-4 control-label">Arrival</label>

                                <div class="col-md-6">
                                    <input id="arrival" type="text" class="form-control" name="arrival" value="{{ old('arrival') }}" required>

                                    @if ($errors->has('arrival'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('arrival') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('seat') ? ' has-error' : '' }}">
                                <label for="seat" class="col-md-4 control-label">Seat (optionnal)</label>

                                <div class="col-md-6">
                                    <input id="seat" type="text" class="form-control" name="seat" value="{{ old('seat') }}">

                                    @if ($errors->has('seat'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('seat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('gate') ? ' has-error' : '' }}">
                                <label for="gate" class="col-md-4 control-label">Gate (optionnal)</label>

                                <div class="col-md-6">
                                    <input id="gate" type="text" class="form-control" name="gate" value="{{ old('gate') }}">

                                    @if ($errors->has('gate'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('gate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('baggage_drop') ? ' has-error' : '' }}">
                                <label for="baggage_drop" class="col-md-4 control-label">Baggage drop (optionnal)</label>

                                <div class="col-md-6">
                                    <input id="baggage_drop" type="text" class="form-control" name="baggage_drop" value="{{ old('baggage_drop') }}">

                                    @if ($errors->has('baggage_drop'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('baggage_drop') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('departure_date') ? ' has-error' : '' }}">
                                <label for="departure_date" class="col-md-4 control-label">Departure date</label>

                                <div class="col-md-6">
                                    <input id="departure_date" type="text" class="form-control" name="departure_date" value="{{ old('departure_date') }}">

                                    @if ($errors->has('departure_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('departure_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('arrival_date') ? ' has-error' : '' }}">
                                <label for="arrival_date" class="col-md-4 control-label">Arrival date</label>

                                <div class="col-md-6">
                                    <input id="arrival_date" type="text" class="form-control" name="arrival_date" value="{{ old('arrival_date') }}">

                                    @if ($errors->has('arrival_date'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('arrival_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Create
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
