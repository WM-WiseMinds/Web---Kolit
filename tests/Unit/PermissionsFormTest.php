<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Livewire\PermissionsForm;
use Spatie\Permission\Models\Permission;

class PermissionsFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_component_renders_successfully()
    {
        Livewire::test(PermissionsForm::class)
            ->assertStatus(200);
    }

    public function test_form_reset_successfully()
    {
        Livewire::test(PermissionsForm::class)
            ->set('name', 'Some Permission')
            ->call('resetCreateForm')
            ->assertSet('name', '');
    }

    public function test_permission_creates_or_updates_successfully()
    {
        $permissionName = 'Unique Permission';

        Livewire::test(PermissionsForm::class)
            ->set('name', $permissionName)
            ->call('store');

        $this->assertTrue(Permission::where('name', $permissionName)->exists());

        // Update test
        $updatedPermissionName = 'Updated Permission';
        $permissionId = Permission::where('name', $permissionName)->first()->id;

        Livewire::test(PermissionsForm::class)
            ->set('id', $permissionId)
            ->set('name', $updatedPermissionName)
            ->call('store');

        $this->assertFalse(Permission::where('name', $permissionName)->exists());
        $this->assertTrue(Permission::where('name', $updatedPermissionName)->exists());
    }

    public function test_mount_method_successfully_sets_permission()
    {
        $existingPermission = Permission::create(['name' => 'Existing Permission', 'guard_name' => 'web']);
        $permissionId = $existingPermission->id;

        Livewire::test(PermissionsForm::class, ['rowId' => $permissionId])
            ->assertSet('name', 'Existing Permission')
            ->assertSet('id', $permissionId);
    }
}
