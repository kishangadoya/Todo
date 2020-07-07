@extends('todos.layout')

@section('content')	

<div class="flex justify-between border-b pb-4 px-5">
	<h1 class="text-2xl">All your ToDos</h1>
	<a href="{{route('todo.create')}}" class="mx-5 py-2 px-1 text-blue-400 cursor-pointer  text-white "><i class="fas fa-plus-circle"></i></a>
</div>


<ul class="my-5">
	<x-alert>

	</x-alert>
		@forelse($todos as $todo)
			
				<li class="flex justify-between p-2">
					<div>
						@include('todos.completeButton')<!--Check icon at left side-->
					</div>
					@if($todo->completed)	
						<p class="line-through">{{ $todo -> title }}</p>			
					@else		
						<a class="cursor-pointer" href="{{ route('todo.show',$todo->id) }}">{{ $todo -> title }}</p>						
					@endif

			<div class="">
				
				<a href="{{ route('todo.edit',$todo->id) }}" class="text-orange-400 cursor-pointer text-white " class="px-2">
					<i class="fas fa-edit px-2"></i>
				</a>

				
					<i class="fas fa-trash text-red-500 px-2 cursor-pointer"
					 onclick="event.preventDefault();
					 if(confirm('Are you really want to Delete?'))
					 {
						document.getElementById('form-delete-{{$todo->id}}')
						.submit()
					}">
					 
						
					</i>
				

				<form action="{{route('todo.destroy',$todo->id)}}"
					 id="{{'form-delete-'.$todo->id}}" 
					 method="post" 
					 accept-charset="utf-8" 
					 style="display: none;">
						@csrf
						@method('delete')
				</form>	
				
			</div>
		</li>
		@empty
			<p>No task available,create one.</p>
		@endforelse

</ul>

@endsection