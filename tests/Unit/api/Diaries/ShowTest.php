<?php

namespace Tests\Unit;

use App\Models\Diary;
use Tests\TestCase;

class ShowDiaryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->testDiary = Diary::factory()->create([
            'owner' => $this->diaryOwner->id,
        ]);
        unset($this->testDiary['id']);
    }

    public function test_show_diary_with_unauthed_user()
    {
        $response = $this->getJson(route("diaries.show", $this->testDiary->date));
        $response->assertUnauthorized();
    }

    public function test_show_diary()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->getJson(route("diaries.show", $this->testDiary->date));
        $response->assertOK();
        $response->assertJson($this->testDiary->toArray());
    }

    public function test_show_unexist_diary()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->getJson(route("diaries.show", "2000-01-01"));
        $response->assertNotFound();
    }

}