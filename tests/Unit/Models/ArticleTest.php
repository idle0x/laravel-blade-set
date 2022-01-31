<?php

namespace Tests\Unit\Models;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_slug()
    {
        User::factory(1)->create();
        $article = Article::factory(1)->create(['title' => 'Test title.']);
        $this->assertEquals($article[0]->slug, 'test-title');
    }

    public function test_search()
    {
        User::factory(5)->create();
        Article::factory(25)->create();

        Article::factory()->create(['title' => 'TestX']);
        Article::factory()->create(['title' => 'TestX scx']);
        Article::factory()->create(['title' => 'TestX scxch']);

        $this->assertCount(0, Article::search('Chupackabra')->get());
        $this->assertCount(2, Article::search('scx')->get());
        $this->assertCount(3, Article::search('testx')->get());

    }
}
