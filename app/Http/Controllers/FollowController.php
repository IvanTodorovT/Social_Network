<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FollowController extends Controller {
	public function follow(){
		
		$data = ['error'=>[]];
		$user_id = Input::get('user_id');
		try{
			//insert 
		}catch(Exception $e){
			$data['error'] = 'erorr following asda.sd..';
		}
		return response()->json($data);
	}
}