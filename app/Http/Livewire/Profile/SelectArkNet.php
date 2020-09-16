<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class SelectArkNet extends Component
{
    public $net;

    /**
     * Init
     *
     * @return void
     */
    public function mount()
    {
        $this->net = auth()->user()->net;
    }

    /**
     * Rendering the livewire view
     *
     * @return void
     */
    public function render()
    {
        return view('profile.select-ark-net');
    }

    /**
     * Updates the `net` on logged in user
     *
     * @return void
     */
    public function updateArkNet()
    {
        $user = auth()->user();
        $user->net = $this->net;
        $user->save();
    }
}
