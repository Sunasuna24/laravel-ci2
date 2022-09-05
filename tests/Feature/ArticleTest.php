<?php

namespace Tests\Feature;

use App\Article;
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
}
