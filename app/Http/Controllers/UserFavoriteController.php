<?php

namespace App\Http\Controllers;

use App\Models\UserFavorite;

class UserFavoriteController extends Controller
{
    /**
     * Show a list of all the current users favorite wallets
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userFavorites = UserFavorite::where('user_id', auth()->id())->get();

        return view('user_favorite.index', compact('userFavorites'));
    }
}
