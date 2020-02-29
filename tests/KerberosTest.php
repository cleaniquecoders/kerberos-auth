<?php

namespace CleaniqueCoders\KerberosAuth\Tests;

use CleaniqueCoders\KerberosAuth\Http\Middleware\KerberosMiddleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KerberosTest extends TestCase
{
    use Traits\UserTrait;

    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->migrate();
        $this->seedUsers();
    }

    /**
     * Do clean up on tear down.
     */
    protected function tearDown(): void
    {
        $this->cleanUp();
        parent::tearDown();
    }

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

    /** @test */
    public function it_has_kerberos_config()
    {
        $this->artisan('vendor:publish', [
            '--force' => true,
            '--tag'   => 'kerberos-auth-config',
        ]);

        $this->assertHasConfig('kerberos');
    }

    /** @test */
    public function it_can_login_when_kerberos_auth_is_enabled()
    {
        config([
            'kerberos.enabled' => true,
            'kerberos.model'   => \CleaniqueCoders\KerberosAuth\Tests\Stubs\Models\User::class,
        ]);

        $response = \Mockery::Mock(Response::class);
        $request  = Request::create('/', 'GET');
        $request->headers->set('X-REMOTE-USER', 'hi@phpunit.com');

        (new KerberosMiddleware())
            ->handle(
                $request,
                function () use ($response) {
                    return $response;
                }
            );
        $this->assertNotEmpty(auth()->user());
        $this->assertEquals('hi@phpunit.com', auth()->user()->email);
    }
}
