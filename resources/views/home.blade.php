@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('errors'))
                           <div class="alert alert-danger">
                              {{ session('errors') }}
                           </div>
                        @endif
                            {{ __('You are logged in!') }}

                        <h3>Create new travel:</h3>
                        <form method="POST">
                            {{ csrf_field() }}

                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control">

                            <label for="description">Description</label>
                            <input type="text" name="description" id="description" class="form-control">

                            <h4>Etapes</h4>
                            <div id="steps"></div>
                            <button type="button" class="btn btn-primary" onclick="addStep()">Add step</button>

                            <button type="submit" class="btn btn-primary">Create voyage</button>
                        </form>
                        <script type="text/javascript">
                            var i = 1;
                            function addStep() {
                                const steps = document.getElementById('steps');
                                const step = document.createElement('div');
                                step.innerHTML = '<div class="step py-2">' +
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
                                    '</div>' +

                                    '<button type="button" class="btn btn-danger" onclick="removeStep(event)">Remove step</button>' +
                                    '</div>';
                                steps.appendChild(step);
                                i++;
                            }
                            function removeStep(event) {
                                event.preventDefault();
                                event.target.parentNode.remove();
                                i--;
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
