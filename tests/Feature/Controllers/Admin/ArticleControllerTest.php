<?php

namespace Tests\Feature\Routes;

use App\Models\Article;
use App\Models\User;
use App\Repositories\ArticleRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     * @return void
     * @test
     */
    public function test_index()
    {
        User::factory(2)->create();
        Article::factory(4)->create();

        $response = $this->get('/admin/articles');

        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function article_edit_page_opened()
    {
        User::factory(2)->create();
        Article::factory(4)->create();

        $response = $this->get('/admin/articles/3');

        $response->assertStatus(200);
    }

    /**
     * @return void
     * @test
     */
    public function respond_404_if_not_existed_edit()
    {
        User::factory(1)->create();
        Article::factory(2)->create();

        $response = $this->get('/admin/articles/3');

        $response->assertStatus(404);
    }
}
