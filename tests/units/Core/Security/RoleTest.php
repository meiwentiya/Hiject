<?php

/*
 * This file is part of Hiject.
 *
 * Copyright (C) 2016 Hiject Team
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Hiject\Core\Security\Role;

require_once __DIR__.'/../../Base.php';

class RoleTest extends Base
{
    public function testIsCustomRole()
    {
        $role = new Role();
        $this->assertFalse($role->isCustomProjectRole(Role::PROJECT_MANAGER));
        $this->assertFalse($role->isCustomProjectRole(Role::PROJECT_MEMBER));
        $this->assertFalse($role->isCustomProjectRole(Role::PROJECT_VIEWER));
        $this->assertFalse($role->isCustomProjectRole(''));
        $this->assertTrue($role->isCustomProjectRole('Custom Role'));
    }

    public function testGetRoleName()
    {
        $role = new Role();
        $this->assertEquals('Project Manager', $role->getRoleName(Role::PROJECT_MANAGER));
        $this->assertEquals('Project Member', $role->getRoleName(Role::PROJECT_MEMBER));
        $this->assertEquals('Project Viewer', $role->getRoleName(Role::PROJECT_VIEWER));
        $this->assertEquals('Administrator', $role->getRoleName(Role::APP_ADMIN));
        $this->assertEquals('Manager', $role->getRoleName(Role::APP_MANAGER));
        $this->assertEquals('User', $role->getRoleName(Role::APP_USER));
        $this->assertEquals('Unknown', $role->getRoleName('Foobar'));
    }

    public function testGetters()
    {
        $role = new Role();
        $this->assertCount(3, $role->getApplicationRoles());
        $this->assertCount(3, $role->getProjectRoles());
    }
}