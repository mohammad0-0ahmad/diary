<?php

namespace Tests\Unit;

use Tests\TestCase;

class ShowDiaryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $user = $this->getTestUser();
        $this->deleteAllTestUserDiaries($user);

        $date = "2022-09-01";
        $this->createNewDiary($user->id, $date, "Diary to show.");
        $testDiary = $this->getDiary($user->id, $date);
        $this->assertNotNull($testDiary);

        $this->diaryOwner = $user;
        $this->testDiary = $testDiary;
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