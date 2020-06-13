	@if($todo->completed)
				<i class="fas fa-check text-green-400 cursor-pointer px-2"
				onclick="event.preventDefault();
				document.getElementById('form-incomplete-{{$todo->id}}').submit() ">
				</i>

				<form action="{{route('todo.incomplete',$todo->id)}}"
				 id="{{'form-incomplete-'.$todo->id}}" 
				 method="post" 
				 accept-charset="utf-8" 
				 style="display: none;">
					@csrf
					@method('delete')	
				</form>

				
			@else
				<i class="fas fa-check text-gray-300 cursor-pointer px-2"
				onclick="event.preventDefault();
				document.getElementById('form-complete-{{$todo->id}}').submit() ">
				</i>

				<form action="{{route('todo.complete',$todo->id)}}"
				 id="{{'form-complete-'.$todo->id}}" 
				 method="post" 
				 accept-charset="utf-8" 
				 style="display: none;">
					@csrf
					@method('put')	
				</form>
			@endif