<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\CrudController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends CrudController
{
    const SORT = 'name';

    public function getModelName(): string
    {
        return User::class;
    }
}
