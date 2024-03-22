<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;
use App\Livewire\RolesForm;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesFormTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        // Membuat beberapa permission untuk testing
        Permission::create(['name' => 'edit posts', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete posts', 'guard_name' => 'web']);
    }

    public function test_component_renders_successfully()
    {
        Livewire::test(RolesForm::class)
            ->assertStatus(200);
    }

    public function test_form_reset_successfully()
    {
        Livewire::test(RolesForm::class)
            ->set('name', 'Administrator')
            ->set('permissions_id', [1, 2])
            ->call('resetCreateForm')
            ->assertSet('name', '')
            ->assertSet('permissions_id', []);
    }

    public function test_role_can_be_created_successfully()
    {
        // $this->actingAs($this->user);

        $permissions = Permission::pluck('id')->toArray();

        Livewire::test(RolesForm::class)
            ->set('name', 'New Role')
            ->set('permissions_id', $permissions)
            ->call('store')
            ->assertHasNoErrors();

        $this->assertTrue(Role::where('name', 'New Role')->exists());
        $role = Role::where('name', 'New Role')->first();
        $expectedPermissions = $permissions;
        sort($expectedPermissions);

        $actualPermissions = $role->permissions->pluck('id')->toArray();
        sort($actualPermissions);

        $this->assertEquals($expectedPermissions, $actualPermissions);
    }

    public function test_role_can_be_updated_successfully()
    {
        // $this->actingAs($this->user);

        // Siapkan role dan permissions yang ada
        $role = Role::create(['name' => 'Existing Role', 'guard_name' => 'web']);
        $existingPermissions = Permission::pluck('id')->take(2)->toArray();
        $role->syncPermissions($existingPermissions);

        // Definisikan permissions baru untuk update
        $newPermissions = Permission::pluck('id')->take(3)->toArray();

        Livewire::test(RolesForm::class)
            ->set('id', $role->id)
            ->set('name', 'Updated Role')
            ->set('permissions_id', $newPermissions)
            ->call('store')
            ->assertHasNoErrors();

        // Periksa database untuk memastikan role diperbarui
        $this->assertDatabaseHas('roles', [
            'id' => $role->id,
            'name' => 'Updated Role',
        ]);

        // Verifikasi bahwa permissions role telah diperbarui
        $updatedRole = Role::find($role->id);
        $expectedNewPermissions = $newPermissions;
        sort($expectedNewPermissions);

        $actualNewPermissions = $updatedRole->permissions->pluck('id')->toArray();
        sort($actualNewPermissions);

        $this->assertEquals($expectedNewPermissions, $actualNewPermissions);
    }


    public function test_mount_method_successfully_sets_role_data()
    {
        $role = Role::create(['name' => 'Editor', 'guard_name' => 'web']);
        $role->givePermissionTo(['edit posts', 'delete posts']);

        Livewire::test(RolesForm::class, ['rowId' => $role->id])
            ->assertSet('name', 'Editor')
            ->assertSet('permissions_id', $role->permissions->pluck('id')->toArray());
    }
}
