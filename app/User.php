<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
// �_���폜
// use Illuminate\Database\Eloquent\SoftDeletes;

// model���p�����Ă��Ȃ����߂�db:seed���ɐݒ肵�Ă������[�V�������s����
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
    
    // �_���폜
    // use SoftDeletes;
    
    // protected $tables = 'Users';
    // protected $dates = ['deleted_at'];
}
