<?php

use App\Models\MenuList;

beforeEach(function(){
    $this->user = createUser();
});

it('user unauthentication access page menulist', function () {
    $this->get('/managemenulist')
        ->assertStatus(302)
        ->assertRedirect('/login');

});

it('has a menulist page empty',function(){ 
    $this->actingAs($this->user)
        ->get('/managemenulist')
        ->assertStatus(200)
        ->assertSee(__('Menu'))
        ->assertSee(__('Data Empty'));
        
});

it('menulist page contains non empty table', function(){
    
    #create dummy menu end status
    
    createStatus(); # Pest.php

    $menu = MenuList::create([
        'title' => 'menu page',
        'link'  => '/managemenu',
        'icon'  => 'fa setting',
        'parent_id' => null,
        'level'     => 1,
        'sequence'  => 1,
        'status_id'    => 1,
    ]);

    $this->actingAs($this->user)
        ->get('/managemenulist')
        ->assertStatus(200)
        ->assertDontSee(__('Data Empty'))
        ->assertSee('menu page')
        ->assertViewHas('menulist',function($collection) use ($menu){
            return $collection->contains($menu);
        });
});

it('view detail menu page', function(){
    #create dummy menu end status
    
    createStatus(); # Pest.php

    $menu = MenuList::create([
        'title' => 'menu page',
        'link'  => '/managemenu',
        'icon'  => 'fa setting',
        'parent_id' => null,
        'level'     => 1,
        'sequence'  => 1,
        'status_id'    => 1,
    ]);

    $this->actingAs($this->user)
        ->get('/managemenulist/'.$menu->id)
        ->assertStatus(200)
        ->assertDontSee(__('Data Empty'))
        ->assertSee('menu page')
        ->assertSee('active');
});