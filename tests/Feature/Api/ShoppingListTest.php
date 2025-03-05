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

   public function test_CheckIfCanDeleteEntryInListWithApi(){
    $list = ShoppingList::factory(2)->create();

        $response = $this->delete(route('apidestroy', 1));

        $this->assertDatabaseCount('shopping_lists', 1);

        $response = $this->get(route('apihome'));
        $response->assertJsonCount(1);
   }

   public function test_CheckIfCanCreateNewEntryInListWithJsonFile(){
    $response = $this->post(route('apistore'), ['name' => 'tomatoe']);

    $response = $this->get(route('apihome'));
    $response->assertStatus(200)
            ->assertJsonCount(1);
   }

   public function test_CheckIfCanUpdateProductInListWithJsonFile(){
    $response = $this->post(route('apistore'), [
        'name' => 'tomatoe',
    ]);

    $data = ['name' => 'tomatoe'];
    $response = $this->get(route('apihome'));
    $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);

    $response = $this->put('/api/list/update/1', [
        'name' => 'altered tomatoe',
    ]);

    $data = ['name' => 'altered tomatoe'];
    $response = $this->get(route('apihome'));
    $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
   }
}
