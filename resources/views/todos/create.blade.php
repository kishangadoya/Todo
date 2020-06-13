@extends('todos.layout')

@section('content')
	<h1 class="text-2xl border-b pb-4">What next you need To-Do</h1>
		<x-alert>
			
		</x-alert>
		<form method="post" action="{{route('todo.store')}}" class="py-5" >
			@csrf
			<input type="text" name="title" class="px-2 py-2 border rounded">
			<input type="submit" name="submit" value="Create" class="p-2 border rounded">
		</form>
		<a href="{{route('todo.index')}}" class="m-5 py-1 px-1 bg-white-400  border cursor-pointer text-black rounded">Back</a>
@endsection