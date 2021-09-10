<?php

namespace App\Enum;

class UserRoleEnum
{
    public $role;

    function __construct($role)
    {
        $this->role = $role;
    }

    public function backgroundClass(): string
    {
        return [
            'admin' => 'bg-purple-500',
            'user' => 'bg-red-500',
            'visitor' => 'bg-pink-500',
        ][$this->role] ?? 'bg-red-100';
    }

    public function textClass(): string
    {
        return [
            'admin' => 'text-red-500',
            'user' => 'text-pink-500',
            'visitor' => 'text-green-500',
        ][$this->role] ?? 'text-red-100';
    }
}
