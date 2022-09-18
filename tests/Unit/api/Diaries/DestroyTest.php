<?php

namespace Tests\Unit;

use App\Models\Diary;
use Tests\TestCase;

class DestroyDiaryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->diaryToBeDeleted = Diary::factory()->create(['owner' => $this->diaryOwner->id]);
    }

    public function test_delete_diary_with_unauthed_user()
    {
        $response = $this->deleteJson(route('diaries.destroy', $this->diaryToBeDeleted->date));
        $response->assertUnauthorized();

        $testRecord = $this->getDiary($this->diaryOwner->id, $this->diaryToBeDeleted->date);
        $this->assertNotNull($testRecord);
    }

    public function test_delete_user_diary()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->delete(route('diaries.destroy', $this->diaryToBeDeleted->date));
        $response->assertoK();

        $testRecord = $this->getDiary($this->diaryOwner->id, $this->diaryToBeDeleted->date);
        $this->assertNull($testRecord);
    }

    public function test_request_to_diary_distroy_with_invalid_date()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->delete(route('diaries.destroy', "2016-02-30"));
        $response->assertNotFound();
    }
}