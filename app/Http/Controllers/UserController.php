<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Auth;

class UserController extends Controller
{
	public function uploadAvatar(Request $request)
	{
		if($request->hasfile('image'))
		{
			User::uploadAvatar($request->image);
			return redirect()->back()->with('message','Image Uploaded !');//Sucess message
			

			//Whenever you are writing variable name donot quoted with single quote...
		}		
		return redirect()->back()->with('error','Image not Uploaded !');//Error message

	}



	public function index()
	{
	 	//*******************ROW QUERY DEMO **************

//1)Create operation:

		// DB::insert('insert into users (name,email,password)
		// 	values (?,?,?)', [
		// 		'Kishan','brijesh1.gadoya.90@gmail.com','123',
		// 	]);

//2)Read operation:

		// $users = DB::select ('select * from users');
		// return $users;

//3)Update operation:

		//DB::update('update users set name = ? where id = 20', ['bitfumesssss']);
		//return DB::select ('select * from users');//without variable
		//return $users;

//4)Delete operation:

	 	// DB::delete('delete  from users where id = 1');

		// $users = DB::select ('select * from users');
		// return $users;



	 	//*******************Eloquent QUERY DEMO **************


//1) Record select using 'Eloquent' :

		// $user = new User();
	    //return $user::all();//gives all record
	    //dd($user);


//2) Record insert using 'Eloquent' :

	 	// $user->name = 		'Rama';
	 	// $user->email =  	'rama.90@gmail.com';
	 	// $user->password = 	 bcrypt('123');
	 	// $user->save();
	 	//return $user::all();//used here to show the result of above query

//3) Record delete using 'Eloquent' :

	 	//user::where('id', 18) ->delete();

//4) Record update using 'Eloquent' :

		// user:: where('id',20)->update(['name' => 'Kishan Gadoya']);
		// $user = new User();
	 //    return $user::all();//gives all record

//Data insert through Array Method
		// $data = [
		// 	'name' => 'akash',
		// 	'email' => 'akash@b.c',
		// 	'password' => '123',
		// ];
	  	//User :: create($data);
		// $user = new User();
		// return $user::all();




		return view('home');
	}
}
