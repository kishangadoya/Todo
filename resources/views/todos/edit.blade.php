@extends('todos.layout')

@section('content')
	{{-- {{$todo->title}} --}}


	<div class="flex justify-between border-b pb-4 px-5">
		<h1 class="text-2xl pb-4">Update this To-Do List</h1>
		<a href="{{route('todo.index')}}" class="mx-5 py-2 px-1 text-gray-400 cursor-pointer  text-white "><i class="fas fa-arrow-left"></i></a>
	</div>

	
		<x-alert>
			
		</x-alert>
	
		<form method="post" action="{{route( 'todo.update' ,$todo->id )}}" class="py-5" >
			@csrf
			@method('patch')

			<div class="py-1">
				<input type="text" name="title" value="{{$todo->title}}" class="px-2 py-2 border rounded" placeholder="Title ">
			</div>

			<div class="py-1">
				<textarea name="description" class="p-2 rounded border" placeholder="Description">{{$todo->description}}</textarea>
			</div>


			<div class="py-1">
			  	<input type="submit" name="submit" value="Update" class="p-2 border rounded">
			</div>

			
		</form>
		

@endsection
