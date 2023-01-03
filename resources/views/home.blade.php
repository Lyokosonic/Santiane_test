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
                    @if (Session::has('errors'))
                        <div class="alert alert-danger">{{ Session::get('errors') }}</div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif

                    <h3>Create new travel:</h3>
                        <form method="POST">
                            {{ csrf_field() }}

                            <label for="name">Name</label>
                            <input type="text" name="name" id="name">

                            <label for="description">Description</label>
                            <input type="text" name="description" id="description">

                            <h4>Etapes</h4>
                            <div id="steps">
                                @foreach (session('steps', []) as $index => $step)
                                    <div class="step">
                                        <div>
                                            <label for="steps[{{ $index }}][type]">Type</label>
                                            <input type="text" name="steps[{{ $index }}][type]" id="steps[{{ $index }}][type]" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][transport_number]">Transport number</label>
                                            <input type="text" name="steps[{{ $index }}][transport_number]" id="steps[{{ $index }}][transport_number]" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][departure_date]">Departure date</label>
                                            <input type="datetime-local" name="steps[{{ $index }}][departure_date]" id="steps[{{ $index }}][departure_date]" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][arrival_date]">Arrival date</label>
                                            <input type="datetime-local" name="steps[{{ $index }}][arrival_date]" id="steps[{{ $index }}][arrival_date]" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][departure]">Departure</label>
                                            <input type="text" name="steps[{{ $index }}][departure]" id="steps[{{ $index }}][departure]" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][arrival]">Arrival</label>
                                            <input type="text" name="steps[{{ $index }}][arrival]" id="steps[{{ $index }}][arrival]" class="form-control" required>
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][seat]">Seat</label>
                                            <input type="text" name="steps[{{ $index }}][seat]" id="steps[{{ $index }}][seat]" class="form-control">
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][gate]">Gate</label>
                                            <input type="text" name="steps[{{ $index }}][gate]" id="steps[{{ $index }}][gate]" class="form-control">
                                        </div>
                                        <div>
                                            <label for="steps[{{ $index }}][baggage_drop]">Baggage_drop</label>
                                            <input type="text" name="steps[{{ $index }}][baggage_drop]" id="steps[{{ $index }}][baggage_drop]" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="addStep()">Add step</button>

                            <button type="submit">Create voyage</button>
                        </form>
                        <script type="text/javascript">
                            console.log("HERE");
                            var i = 1;
                            function addStep() {
                                console.log("I Click");
                                const steps = document.getElementById('steps');
                                const step = document.createElement('div');
                                step.innerHTML = '<div class="step">' +
                                    '<h5>Step' + i + '</h5><div><label for="steps[' + i + '][type]">Type</label>' +
                                    '<input type="text" name="steps[' + i + '][type]" id="steps[' + i + '][type]" class="form-control" required></div>' +

                                    '<div><label for="steps[' + i + '][transport_number]">Transport number</label>' +
                                    '<input type="text" name="steps[' + i + '][transport_number]" id="steps[' + i + '][transport_number]" class="form-control" required></div>' +

                                    '<div><label for="steps[' + i + '][departure_date]">Departure date</label>' +
                                    '<input type="datetime-local" name="steps[' + i + '][departure_date]" id="steps[' + i + '][departure_date]" class="form-control" required></div>' +

                                    '<div><label for="steps[' + i + '][arrival_date]">Arrival date</label>' +
                                    '<input type="datetime-local" name="steps[' + i + '][arrival_date]" id="steps[' + i + '][arrival_date]" class="form-control" required></div>' +

                                    '<div><label for="steps[' + i + '][departure]">Departure</label>' +
                                    '<input type="text" name="steps[' + i + '][departure]" id="steps[' + i + '][departure]" class="form-control" required></div>' +

                                    '<div><label for="steps[' + i + '][arrival]">Arrival</label>' +
                                    '<input type="text" name="steps[' + i + '][arrival]" id="steps[' + i + '][arrival]" class="form-control" required></div>' +

                                    '<div><label for="steps[' + i + '][seat]">Seat</label>' +
                                    '<input type="text" name="steps[' + i + '][seat]" id="steps[' + i + '][seat]" class="form-control"></div>' +

                                    '<div><label for="steps[' + i + '][gate]">Gate</label>' +
                                    '<input type="text" name="steps[' + i + '][gate]" id="steps[' + i + '][gate]" class="form-control"></div>' +

                                    '<div><label for="steps[' + i + '][baggage_drop]">Baggage drop</label>' +
                                    '<input type="text" name="steps[' + i + '][baggage_drop]" id="steps[' + i + '][baggage_drop]" class="form-control"></div>' +
                                    '</div>';
                                steps.appendChild(step);
                                i++;
                            };
                        </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
