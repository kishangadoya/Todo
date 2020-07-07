<div>
	<div class="flex justify-center pb-4 px-4">
					<h2 class="text-lg pb-4">Add steps for task</h2>
					<span wire:click = "increment" class="fas fa-plus px-2 py-1 cursor-pointer"> </span>
				</div>

			@for($i=0; $i < $steps; $i++)
			<div class="flex justify-center py-2">	
				<input type="text" name="stpe" class="px-2 py-1 border rounded" placeholder="{{ 'Describe Steps ' . ($i+1) }}">
				<span class="fas fa-times text-red-400 p-2 " wire:click="remove"> </span>
			</div>
				
			@endfor
	 {{-- {{$steps}}  --}}
</div>
