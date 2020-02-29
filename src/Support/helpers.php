<?php

/*
 * Check Kerberos Auth Status
 */
if (! function_exists('isKerberosEnabled')) {
    function isKerberosEnabled()
    {
        return config('auth.kerberos.enabled');
    }
}

/*
 * Get Kerberos Auth User
 */
if (! function_exists('getKerberosUser')) {
    function getKerberosUser()
    {
        return config('kerberos.model')::query()
            ->where(config('kerberos.identifier'), getUsernameFromRequest())
            ->firstOrFail();
    }
}

/*
 * Get Username from Header
 */
if (! function_exists('getUsernameFromRequest')) {
    function getUsernameFromRequest()
    {
        return strtolower(
            request()->header(
                config('kerberos.header_key')
            )
        );
    }
}
