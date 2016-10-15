<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FollowController extends Controller {
	public function follow(){
		
		$data = ['error'=>[]];
		$user_id = Input::get('user_id');
		try{
			DB::table('users_friends')->insert(
					array('user_id' => Auth::user()->id, 'friend_id' => $user_id)
					);
		}catch(Exception $e){
			$data['error'] = 'erorr following asda.sd..';
		}
		return response()->json($data);
	}
}