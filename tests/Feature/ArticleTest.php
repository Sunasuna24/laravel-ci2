<?php

namespace Tests\Feature;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function 引数がNULLのときにlikedbyがfalseを返すかどうか()
    {
        $article = factory(Article::class)->create();
        $result = $article->isLikedBy(null);
        $this->assertFalse($result);
    }

    /**
     * @test
     */
    public function ユーザーが記事をいいねしているときにtrueが返る()
    {
        $article = factory(Article::class)->create();
        $user = factory(User::class)->create();
        $article->likes()->attach($user);

        $result = $article->isLikedBy($user);

        $this->assertTrue($result);
    }
}
