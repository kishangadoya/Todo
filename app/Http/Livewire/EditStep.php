<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditStep extends Component
{
	public $steps = [];

	public function mount($steps)
    {
    	//dd($steps->toArray());
        $this->steps = $steps->toArray();
    }

	public function increment()
	{
		$this-> steps[] = count($this->steps);
	}

	public function remove($index)
	{	
		unset($this->steps[$index]);
		$this-> steps--;

	}
    public function render()
    {
        return view('livewire.edit-step');
    }
}
