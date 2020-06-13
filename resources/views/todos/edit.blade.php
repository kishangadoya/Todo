@extends('todos.layout')

@section('content')
	{{-- {{$todo->title}} --}}
	<h1 class="text-2xl border-b pb-4">Update this To-Do List</h1>
		<x-alert>
			
		</x-alert>
	
		<form method="post" action="{{route( 'todo.update' ,$todo->id )}}" class="py-5" >
			@csrf
			@method('patch')
			<input type="text" name="title" value="{{$todo->title}}" class="px-2 py-2 border rounded">
			<input type="submit" name="submit" value="Update" class="p-2 border rounded">
		</form>
		<a href="{{route('todo.index')}}" class="m-5 py-1 px-1 bg-white-400  border cursor-pointer text-black rounded">Back</a>
@endsection
