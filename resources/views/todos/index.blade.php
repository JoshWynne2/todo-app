@extends('layouts.todolay')

@section('content')
<h1 class="text-xl">Todos</h1>
<a href="{{route("todo.create")}}"> Create New Todo </a>
<div class="w-75">
<table class='table-fixed border-solid border-2 border-slate-400'>
	<thead class="bg-slate-600"> 
		<th class="px-4 py-2">Title</th>
		<th class="px-4 py-2">Snippet</th>
		<th class="px-4 py-2">Created</th>
		<th class="px-4 py-2"></th>
	</thead>
	<tbody> 

		@forelse ($todos as $todo)
		@if ($loop->iteration % 2 == 0)
			<tr class="bg-slate-900 hover:bg-slate-700">
		@else
			<tr class ="bg-slate-800 hover:bg-slate-700">
		@endif
				<td class="px-3 w-2/6">{{ $todo->title }}</td>
				<td class="px-3 w-2/6">{{ $todo->body }}</td>
				<td class="px-3 w-1/6">{{ $todo->created_at }}</td>
				<td class="px-3 w-1/6 text-center"><a href="{{route('todo.show', $todo->id)}}"> read more </a></td>
			</tr>

		@empty
			<h4> You have no Todos! </h4>
		@endforelse

	</tbody>
</table>
</div>
@endsection