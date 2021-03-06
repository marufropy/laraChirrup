<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'avatar',
        'name', 
        'email', 
        'password'
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

    public function getAvatarAttribute($value)
    {
        // $avatarPath = 'storage/'.$value;
        // return asset($value ? : '/images/default-avatar.jpeg');
        if(isset($value))
        {
            return asset('storage/'.$value);
        }
        else
        {
            return asset('images/default-avatar.jpeg');
        }
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function timeline()
    {
        // return Tweet::where('user_id', $this->id)
        //     ->latest()
        //     ->get();

        $ids = $this->follows()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id', $ids)
            ->withLikes()
            ->latest()
            ->paginate(20);
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class)->latest();
    }

    public function following(User $user)
    {
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function toggleFollow(User $user)
    {
        if($this->following($user))
        {
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }

    public function getRouteKeyName()
    {
        return 'username';
    }

    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
