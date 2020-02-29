<?php

namespace CleaniqueCoders\KerberosAuth\Tests\Stubs\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = ['id'];
    protected $table   = 'users';
}
