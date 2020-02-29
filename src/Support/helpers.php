<?php

use Illuminate\Http\Request;

/*
 * Check Kerberos Auth Status
 */
if (! function_exists('isKerberosEnabled')) {
    function isKerberosEnabled()
    {
        return config('kerberos.enabled');
    }
}

/*
 * Get Kerberos Auth User
 */
if (! function_exists('getKerberosUser')) {
    function getKerberosUser(Request $request)
    {
        return config('kerberos.model')::query()
            ->where(config('kerberos.identifier'), getUsernameFromRequest($request))
            ->firstOrFail();
    }
}

/*
 * Get Username from Header
 */
if (! function_exists('getUsernameFromRequest')) {
    function getUsernameFromRequest(Request $request)
    {
        return $request->header(
            config('kerberos.header_key')
        );
    }
}
