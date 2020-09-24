<?php

namespace App\Http\Livewire;

use App\Models\UserFavorite as UserFavoriteModel;
use Livewire\Component;

class UserFavorite extends Component
{
    const STAR_FULL = 'fas';
    const STAR_EMPTY = 'far';

    public string $fontAwesomeClass = 'far';
    public string $address;

    /**
     * Pass wallet address initially and set FontAwesome class
     *
     * @param string $address
     * @return void
     */
    public function mount(string $address)
    {
        $this->address = $address;
        $this->fontAwesomeClass = auth()->user()->hasFavorite($address) ? self::STAR_FULL : self::STAR_EMPTY;
    }

    /**
     * Rendering the livewire view
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.user-favorite');
    }

    /**
     * Toggle between filled star and empty star
     *
     * @return void
     */
    public function toggle()
    {
        if ($this->fontAwesomeClass === self::STAR_EMPTY) {
            UserFavoriteModel::create([
                'user_id' => auth()->id(),
                'address' => $this->address,
            ]);
            $this->fontAwesomeClass = self::STAR_FULL;
        } elseif ($this->fontAwesomeClass === self::STAR_FULL) {
            UserFavoriteModel::where('user_id', auth()->id())
                            ->where('address', $this->address)
                            ->delete();
            $this->fontAwesomeClass = self::STAR_EMPTY;
        }
    }
}
