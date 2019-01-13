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
				<tr>
					<td>{{$student->first_name}}</td>
					<td>{{$student->last_name}}</td>
					<td>{{$student->age}}</td>
					<td>{{$student->adresse}}</td>
					<td>{{$student->email}}</td>
					<td>
						{!! Form::open(['action' => ['StudentsController@destroy', $student->id], 'methode' => 'POST']) !!}
							{{Form::hidden('_method', 'DELETE')}}
							<a href="{{ url('/') }}/students/{{$student->id}}/edit" class="btn btn-primary" >
								<i class="fa fa-edit"> Edit</i>
							</a>
							{{Form::Button('<i class="fa fa-trash"> Delete</i>', ['type' => 'submit', 'class'=>'btn btn-danger'])}}
						{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row justify-content-center">
		<i>{{ $students->links() }}</i>
	</div>
@endsection