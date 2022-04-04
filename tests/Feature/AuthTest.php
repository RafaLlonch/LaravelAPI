<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function registrar_usuario(){

        $this->withoutExceptionHandling();
        
        $response = $this->post('api/players', [
             'nickname' => 'Maria',
             'email' => 'maria@gmail.com',
             'role' => 'admin',
             'password' => '12345678'
         ]);

        $response->assertStatus(200);
        $this->assertCount(1, User::all());
    } 
    
    /** @test */
    public function registrar_password_incorrecto(){
        
        $response = $this->post('api/players', [
             'nickname' => 'Maria',
             'email' => 'maria@gmail.com',
             'role' => 'admin',
             'password' => '1234567'
         ]);

        $response->assertStatus(302);
    } 

    /** @test */
    public function registrar_email_repetido(){
        
        $response = $this->post('api/players', [
             'nickname' => 'Maria',
             'email' => 'maria@gmail.com',
             'role' => 'admin',
             'password' => '1234567'
         ]);

        $response->assertStatus(302);
    } 
    
    /** @test */
    public function login(){

        $response = $this->post('api/players', [
            'email' => 'maria@gmail.com',
            'password' => '12345678'
        ]);
        $response->assertStatus(200);
    }

    /** @test */
    public function email_password_necesario(){
        
        $response = $this->post('api/players', []);
            
        $response->assertStatus(302);
    }

    /** @test */
    public function sin_auth(){

        $response = $this->get('api/players');

        $response->assertStatus(500);
    }
}
