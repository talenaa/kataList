<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\ShoppingList;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShoppingListTest extends TestCase
{
   use RefreshDatabase;

   public function test_CheckIfCanReceiveAllEntryOfListInJsonFile(){
    $list = ShoppingList::factory(2)->create();

    $response = $this->get(route('apihome'));
   
    $response->assertStatus(200)
             ->assertJsonCount(2);
   }
}
