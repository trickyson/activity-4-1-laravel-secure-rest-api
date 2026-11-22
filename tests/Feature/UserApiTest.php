<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
class UserApiTest extends TestCase {
 use RefreshDatabase;
 public function test_get_users(): void {$this->getJson('/api/users')->assertOk()->assertJsonPath('data',[]);}
 public function test_create_user(): void {
  $this->postJson('/api/users',['name'=>'Sample Student','email'=>'sample@example.test','password'=>'SecurePass123!','password_confirmation'=>'SecurePass123!'])
   ->assertCreated()->assertJsonPath('data.email','sample@example.test')->assertJsonMissingPath('data.password');
  $this->assertDatabaseHas('users',['email'=>'sample@example.test']);
  $this->assertTrue(Hash::check('SecurePass123!',\App\Models\User::firstOrFail()->password));
 }
 public function test_validation(): void {
  $this->postJson('/api/users',['name'=>'','email'=>'invalid'])->assertUnprocessable()->assertJsonValidationErrors(['name','email','password']);
 }
 public function test_duplicate_email(): void {
  \App\Models\User::factory()->create(['email'=>'existing@example.test']);
  $this->postJson('/api/users',['name'=>'Another','email'=>'existing@example.test','password'=>'SecurePass123!','password_confirmation'=>'SecurePass123!'])
   ->assertUnprocessable()->assertJsonValidationErrors('email');
 }
}