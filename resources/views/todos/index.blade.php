@extends('layouts.app')

@section('content')
<h2>Todos</h2>
<a href="{{route("todo.create")}}"> Create New Todo </a>
<table>
	<thead> 
		<th>Title</th>
		<th>Snippet</th>
		<th>Created</th>
		<th></th>
	</thead>
	<tbody> 

		@forelse ($todos as $todo)
			<tr>
				<td>{{ $todo->title }}</td>
				<td>{{ $todo->body }}</td>
				<td>{{ $todo->created_at }}</td>
				<td><a href="#"> read more </a></td>
			</tr>

		@empty
			<h4> nah </h4>
		@endforelse

	</tbody>
</table>

@endsection