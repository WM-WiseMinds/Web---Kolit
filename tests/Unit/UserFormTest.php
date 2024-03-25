<?php

namespace Tests\Unit;


use App\Livewire\UserForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Livewire\Livewire;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserFormTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_renders_component_succesfully()
    {
        // Test UserForm render method
        Livewire::test(UserForm::class)
            ->assertStatus(200);
    }

    /** @test */
    public function it_resets_create_form()
    {
        // Test UserForm resetCreateForm method
        Livewire::test(UserForm::class)
            ->set('name', 'Test Name')
            ->set('email', 'test@example.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->set('role_name', 'admin')
            ->call('resetCreateForm')
            ->assertSet('name', '')
            ->assertSet('email', '')
            ->assertSet('password', '')
            ->assertSet('password_confirmation', '')
            ->assertSet('role_name', '');
    }

    /** @test */
    public function it_stores_a_new_user()
    {
        // Create a role
        Role::create(['name' => 'admin']);

        // Test UserForm store method
        Livewire::test(UserForm::class)
            ->set('name', 'Test Name')
            ->set('email', 'test@example.com')
            ->set('password', 'password')
            ->set('password_confirmation', 'password')
            ->set('role_name', 'admin')
            ->call('store');

        // Assert a new user was stored
        $this->assertDatabaseHas('users', [
            'name' => 'Test Name',
            'email' => 'test@example.com',
        ]);

        // Assert the user has the correct role
        $user = User::where('email', 'test@example.com')->first();
        $this->assertTrue($user->hasRole('admin'));
    }

    /** @test */
    public function it_updates_an_existing_user()
    {
        // Create a user and a role
        $user = User::factory()->create();
        Role::create(['name' => 'admin']);

        // Test UserForm update method
        Livewire::test(UserForm::class)
            ->set('user_id', $user->id)
            ->set('name', 'Updated Name')
            ->set('email', 'updated@example.com')
            ->set('password', 'updatedpassword')
            ->set('password_confirmation', 'updatedpassword')
            ->set('role_name', 'admin')
            ->call('store');

        // Assert the user was updated
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);

        // Assert the user has the correct role
        $updatedUser = User::find($user->id);
        $this->assertTrue($updatedUser->hasRole('admin'));
    }

    /** @test */
    public function it_mounts_with_an_existing_user()
    {
        // Create a user
        $user = User::factory()->create();

        // Test UserForm mount method
        $component = Livewire::test(UserForm::class, ['rowId' => $user->id]);

        // Assert the component has the correct user data
        $this->assertEquals($user->id, $component->get('user_id'));
        $this->assertEquals($user->name, $component->get('name'));
        $this->assertEquals($user->email, $component->get('email'));
    }
}
