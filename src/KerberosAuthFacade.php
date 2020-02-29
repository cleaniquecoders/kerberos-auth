<?php

namespace CleaniqueCoders\KerberosAuth;

/*
 * This file is part of kerberos-auth
 *
 * @license MIT
 * @package kerberos-auth
 */

use Illuminate\Support\Facades\Facade;

class KerberosAuthFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'KerberosAuth';
    }
}
