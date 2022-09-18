<?php

namespace Tests\Unit;

use App\Models\Diary;
use Tests\TestCase;

class ShowDiariesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->testDiaries = array_map(function ($date) {
            $diary = Diary::factory()->create([
                'owner' => $this->diaryOwner->id,
                'date' => $date,
            ])->toArray();
            unset($diary["id"]);

            return $diary;
        }, ['2022-09-12', '2022-09-11']);
    }

    public function test_show_diaries_with_unauthed_user()
    {
        $response = $this->getJson(route("diaries.index"));
        $response->assertUnauthorized();
    }

    public function test_show_all_user_diaries()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->getJson(route("diaries.index"));
        $response->assertOK();
        $response->assertJson($this->testDiaries);
    }
}