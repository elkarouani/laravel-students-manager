@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Student</div>

                <div class="card-body">
                    {!! Form::open(['action' => ['StudentsController@update', $student->id], 'methode' => 'POST']) !!}
						<div class="form-group">
							{{Form::label('title', 'First Name')}}
							{{Form::text('fname', $student->first_name, ['class' => 'form-control', 'placeholder' => 'first name'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Last Name')}}
							{{Form::text('lname', $student->last_name, ['class' => 'form-control', 'placeholder' => 'last name'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Age')}}
							{{Form::number('age', $student->age, ['class' => 'form-control', 'placeholder' => 'age'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Email')}}
							{{Form::text('email', $student->email, ['class' => 'form-control', 'placeholder' => 'email'])}}
						</div>
						<div class="form-group">
							{{Form::label('title', 'Adresse')}}
							{{Form::text('adresse', $student->adresse, ['class' => 'form-control', 'placeholder' => 'adresse'])}}
						</div>
						{{Form::hidden('_method', 'PUT')}}
						{{Form::submit('Save', ['class'=>'btn btn-primary'])}}
					{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection