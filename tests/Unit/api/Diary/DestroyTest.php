<?php

namespace Tests\Unit;

use Tests\TestCase;

class DestroyDiaryTest extends TestCase
{
    private static $date = "2022-09-12";

    public function setUp(): void
    {
        parent::setUp();
        $user = $this->getTestUser();
        $this->deleteAllTestUserDiaries($user);
        $this->createNewDiary($user->id, self::$date, "Diary to delete");
        $testRecord = $this->getDiary($user->id, self::$date);
        $this->assertNotNull($testRecord);
        $this->diaryOwner = $user;
    }

    public function test_delete_diary_with_unauthed_user()
    {
        $response = $this->deleteJson(route('diary.destroy', self::$date));
        $response->assertUnauthorized();

        $testRecord = $this->getDiary($this->diaryOwner->id, self::$date);
        $this->assertNotNull($testRecord);
    }

    public function test_delete_user_diary()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->delete(route('diary.destroy', self::$date));
        $response->assertoK();

        $testRecord = $this->getDiary($this->diaryOwner->id, self::$date);
        $this->assertNull($testRecord);
    }

    public function test_request_to_diary_distroy_with_invalid_date()
    {
        $response = $this->actingAs($this->diaryOwner)
            ->delete(route('diary.destroy', "2016-02-30"));
        $response->assertNotFound();
    }
}