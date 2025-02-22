<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_user_can_create_order()
    {
        $this->actingAs($this->user);

        $orderData = [
            'product_name' => 'Test Product',
            'amount' => 10,
        ];

        $response = $this->postJson('/api/order', $orderData);

        $response->assertStatus(201)
            ->assertJsonFragment(['product_name' => 'Test Product']);
    }

    public function test_user_can_not_access_other_user_order()
    {
        $other_user = User::factory()->create();

        $this->actingAs($this->user);

        $order = Order::factory()->create(['user_id' => $other_user->id]);

        $response = $this->getJson('/api/order/'.$order->id);

        $response->assertStatus(404);
    }

    public function test_user_can_view_orders()
    {
        $this->actingAs($this->user);

        Order::factory()->create(['user_id' => $this->user->id]);

        $response = $this->getJson('/api/order');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => ['id', 'product_name', 'amount', 'status', 'user_id'],
            ]);
    }

    public function test_user_can_update_order()
    {
        $this->actingAs($this->user);
        $order = Order::factory()->create(['user_id' => $this->user->id]);

        $updateData = [
            'product_name' => 'Updated Product',
            'status' => 'delivered',
            'amount'=>20
        ];

        $response = $this->putJson("/api/order/{$order->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment(['product_name' => 'Updated Product']);
    }

    public function test_user_can_delete_order()
    {
        $this->actingAs($this->user);
        $order = Order::factory()->create(['user_id' => $this->user->id]);

        $response = $this->deleteJson("/api/order/{$order->id}");

        $response->assertStatus(200)
            ->assertJson(['message' => 'Order deleted successfully']);
    }

    public function test_unauthenticated_user_cannot_access_orders()
    {
        $response = $this->getJson('/api/order');
        $response->assertStatus(401);
    }
}
