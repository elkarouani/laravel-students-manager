@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Student</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'StudentsController@store', 'methode' => 'POST']) !!}
						<div class="form-group">
							{{Form::label('title', 'First Name')}}
							{{Form::text('fname', '', ['class' => 'form-control', 'placeholder' => 'first name'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Last Name')}}
							{{Form::text('lname', '', ['class' => 'form-control', 'placeholder' => 'last name'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Age')}}
							{{Form::number('age', '', ['class' => 'form-control', 'placeholder' => 'age'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Email')}}
							{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'email'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Adresse')}}
							{{Form::text('adresse', '', ['class' => 'form-control', 'placeholder' => 'adresse'])}}
						</div>
						{{Form::submit('Save', ['class'=>'btn btn-primary'])}}
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection