<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use DB;
use Auth;
use Exception;

class FollowController extends Controller {

	public function follow(){
		
		$data = ['error'=>[]];
		$user_id = Input::get('user_id');
		try{
			DB::table('users_friends')->insert(
					array('user_id' => Auth::user()->id, 'friend_id' => $user_id)
					);
		}catch(Exception $e){
			$data['error'] = "Error following user.";
		}
		return response()->json($data);
	}
	
	public function unfollow(){
		$data = ['error'=>[]];
		return response()->json($data);
	}
}