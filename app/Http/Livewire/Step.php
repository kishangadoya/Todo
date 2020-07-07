<?php

namespace App\Http\Livewire;

use App\Post;
use Livewire\Component;

class Step extends Component
{
	public $steps = 0;

	public function increment()
	{

		$this-> steps++;
	}
	public function remove()
	{
		$this-> steps--;
	}

    public function render()
    {
        return view('livewire.step');
    }
}
