<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function uploadAvatar($image)
    {
        $filename = ($image->getClientOriginalName() );              
            (new self())->deleteOldImage();//Used to update image and delete older image.
            $image -> storeAs('images',$filename,'public');
            auth()->user()->update(['avatar' => $filename]);
    }

    protected function deleteOldImage()
    {
        if($this->avatar){
            Storage::delete('/public/images/' . Auth::user()->avatar);
        }
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);//->orderBy('completed')->get();
    }




//MUTATORs working function
    // public function setPasswordAttribute($password)
    // {
    //     $this -> attributes['password'] = bcrypt($password);
    // }

//ACCESSORs working function

    // public function getNameAttribute($name)
    // {
    //     return 'My name is: '. ucfirst ($name);
    // }
}
