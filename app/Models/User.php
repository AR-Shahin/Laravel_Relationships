<?php

namespace App\Models;

use App\Enum\UserRoleEnum;
use App\Models\SkillUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // dynamic load
    // protected $with = ['profile', 'posts'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function profile()
    {
        return $this->hasOne(Profile::class)->withDefault([
            'country' => 'USA'
        ]);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    /**
     *  get last and first data
     */
    public function latestPost()
    {
        // return $this->hasOne(Post::class)->ofMany('view', 'min');
        return $this->hasOne(Post::class)->latestOfMany();
    }

    public function oldestPost()
    {
        return $this->hasOne(Post::class)->oldestOfMany();
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class)
            ->using(SkillUser::class)
            ->withTimestamps()
            ->as('my_pivot')
            ->withPivot('rate');
    }

    public function className(): string
    {
        // Old way -- we can use switch statement
        // if ($this->role === 'admin') {
        //     return 'bg-green-500';
        // } else if ($this->role === 'user') {
        //     return 'bg-red-500';
        // } else {
        //     return 'bg-pink-500';
        // }

        // New way
        // return [
        //     'admin' => 'bg-purple-500',
        //     'user' => 'bg-red-500',
        //     'visitor' => 'bg-pink-500',
        // ][$this->role] ?? 'bg-red-100';
    }

    public function role(): UserRoleEnum
    {
        return new UserRoleEnum($this->role);
    }
}
