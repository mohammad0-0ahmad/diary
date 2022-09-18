<?php

namespace Tests\Unit;

use App\Models\Diary;
use Tests\TestCase;

class UpdateDiaryTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
        $this->testDiary = Diary::factory()->create([
            'owner' => $this->diaryOwner->id,
        ]);
        $this->newDiaryData = ["date" => "2022-09-06", "content" => "Diary after update."];
    }

    public function test_update_diary_with_unauthed_user()
    {
        $response = $this->patchJson(route("diaries.update", $this->testDiary->date), $this->newDiaryData);
        $response->assertUnauthorized();
    }

    public function test_update_diary()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->patchJson(route("diaries.update", $this->testDiary->date), $this->newDiaryData);

        $response->assertOK();

        $diaryAfterUpdate = $this->getDiary($this->diaryOwner->id, $this->newDiaryData["date"]);
        $this->assertEquals($diaryAfterUpdate->date, $this->newDiaryData["date"]);
        $this->assertEquals($diaryAfterUpdate->content, $this->newDiaryData["content"]);

        $response->assertJson($diaryAfterUpdate->toArray(), true);
    }
}