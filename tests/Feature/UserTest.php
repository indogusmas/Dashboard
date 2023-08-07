<?php

beforeEach(function(){
    $this->user = createUser();
});

it('user has not login cannot be access user page ', function () {
    $response = $this->get('/manageuser');

    $response->assertStatus(302);
});


it('user login can access user page',function(){
    $this->actingAs($this->user)
        ->get('/manageuser')
        ->assertStatus(200)
        ->assertSee(__('User'))
        ->assertSee(__('admin@admin.com')); #user from factory
});

