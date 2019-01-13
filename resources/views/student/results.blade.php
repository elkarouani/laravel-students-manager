@extends('layouts.app')

@section('content')
	<div class="float-right">
		{!! Form::open(['action' => 'StudentsController@search', 'methode' => 'POST']) !!}
			<div class="form-group">
				{{Form::text('fname', '', ['placeholder' => 'first name'])}}
				{{Form::submit('Search', ['class'=>'btn btn-primary'])}}
			</div>
		{!! Form::close() !!}
	</div>
	<br><br>
	<div><h1 class="text-center">Results :</h1></div>
	<table class="table">
		<thead>
			<th>first name</th>
			<th>last name</th>
			<th>age</th>
			<th>email</th>
			<th>adresse</th>
			<th>actions</th>
		</thead>
		<tbody>
			@foreach ($students as $student)
				<form>
					<tr>
						<td>{{$student->first_name}}</td>
						<td>{{$student->last_name}}</td>
						<td>{{$student->age}}</td>
						<td>{{$student->adresse}}</td>
						<td>{{$student->email}}</td>
						<td>
							<button class="btn btn-primary"><i class="fa fa-edit"> Modify</i></button>
							<button class="btn btn-danger"><i class="fa fa-trash"> Delete</i></button>
						</td>
					</tr>
				</form>
			@endforeach
		</tbody>
	</table>
@endsection