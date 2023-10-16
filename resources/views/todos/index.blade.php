@extends('layouts.app')

@section('content')
<h2>Todos</h2>
<a href="{{route("todo.create")}}"> Create New Todo </a>
<table class='table'>
	<thead class='thead-dark'> 
		<th scope="col">Title</th>
		<th scope="col">Snippet</th>
		<th scope="col">Created</th>
		<th scope="col"></th>
	</thead>
	<tbody> 

		@forelse ($todos as $todo)
			<tr>
				<td>{{ $todo->title }}</td>
				<td>{{ $todo->body }}</td>
				<td>{{ $todo->created_at }}</td>
				<td><a href="{{route('todo.show', $todo->id)}}"> read more </a></td>
			</tr>

		@empty
			<h4> nah </h4>
		@endforelse

	</tbody>
</table>

@endsection