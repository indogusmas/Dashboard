<?php

use App\Models\User;



beforeEach(function(){
  
});

it('has login page', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

it('login success', function(){

    User::create([
        'name'      => 'admin',
        'email'     => 'admin@gmail.com',
        'password'  => '1234567'
    ]);

    $response = $this->post('/login',[
        'email'     => 'admin@gmail.com',
        'password'  => "1234567"
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/dashboard');
});

it('login failed', function(){
    $response = $this->post('/login',[
        'email'         =>'someoneelse@gmail.com',
        'password'      => '12312312312',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/');
});
