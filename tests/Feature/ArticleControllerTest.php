<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('articles.index'));

        $response->assertStatus(200)
                 ->assertViewIs('articles.index');
    }

    /**
     * @test
     */
    public function ゲストユーザーが投稿画面にアクセスできるか()
    {
        $response = $this->get(route('articles.create'));

        $response->assertRedirect(route('login'));
    }
}
