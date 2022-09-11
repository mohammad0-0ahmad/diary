<?php

namespace Tests\Unit;

use Tests\TestCase;

class UpdateDiaryTest extends TestCase
{
    private static $newDiaryData = ["date" => "2022-09-06", "content" => "Diary after update."];

    public function setUp(): void
    {
        parent::setUp();
        $user = $this->getTestUser();
        $this->deleteAllTestUserDiaries($user);

        $date = "2022-09-05";
        $this->createNewDiary($user->id, $date, "Diary before update.");
        $testDiary = $this->getDiary($user->id, $date);
        $this->assertNotNull($testDiary);

        $this->diaryOwner = $user;
        $this->testDiary = $testDiary;
    }

    public function test_update_diary_with_unauthed_user()
    {
        $response = $this->patchJson(route("diaries.update", $this->testDiary->date), self::$newDiaryData);
        $response->assertUnauthorized();
    }

    public function test_update_diary()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->patchJson(route("diaries.update", $this->testDiary->date), self::$newDiaryData);

        $response->assertOK();

        $diaryAfterUpdate = $this->getDiary($this->diaryOwner->id, self::$newDiaryData["date"]);
        $this->assertEquals($diaryAfterUpdate->date, self::$newDiaryData["date"]);
        $this->assertEquals($diaryAfterUpdate->content, self::$newDiaryData["content"]);
    }

}