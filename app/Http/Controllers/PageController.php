<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuthExceptions\JWTException;

use App\User;

class PageController extends Controller
{
	public function currentUser() {
		$user = [];

		if (Auth::check()) {
		    $user = Auth::user();
		} else {
			$token = JWTAuth::getToken();
			if ($token) {
				$user = JWTAuth::toUser($this->token);
			}			
		}

	    return $user;
	}

	public function home() {
		$user = $this->currentUser();

	    \JavaScript::put([
	        'user' => $user
	    ]);

		return view('index');
	}

}
