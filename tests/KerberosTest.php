<?php

namespace CleaniqueCoders\KerberosAuth\Tests;

class KerberosTest extends TestCase
{
    /** @test */
    public function it_has_is_kerberos_enabled_helper()
    {
        $this->assertHasHelper('isKerberosEnabled');
    }

    /** @test */
    public function it_has_get_kerberos_user_helper()
    {
        $this->assertHasHelper('getKerberosUser');
    }

    /** @test */
    public function it_has_get_username_from_request_helper()
    {
        $this->assertHasHelper('getUsernameFromRequest');
    }
}
