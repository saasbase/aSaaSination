<?php

namespace Core\Tests;

use Core\Abstracts\TestCase;
use Modules\User\Models\User;

class OwnershipPolicyTest extends TestCase
{
    public function testAccessPolicy()
    {
        $user  = $this->actAsRandomUser();
        $user2 = User::fromFactory()->create();
        $this->assertTrue($user->can('access', get_authenticated_user()));
        $this->assertFalse($user2->can('access', get_authenticated_user()));
    }
}
