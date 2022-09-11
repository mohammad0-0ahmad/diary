<?php

namespace Tests\Unit;

use Tests\TestCase;

class ShowDiariesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $user = $this->getTestUser();
        $this->deleteAllTestUserDiaries($user);

        $date1 = "2022-09-02";
        $this->createNewDiary($user->id, $date1, "Diary to show.");
        $testDiary1 = $this->getDiary($user->id, $date1);
        $this->assertNotNull($testDiary1);

        $date2 = "2022-09-03";
        $this->createNewDiary($user->id, $date2, "Diary to show.");
        $testDiary2 = $this->getDiary($user->id, $date2);
        $this->assertNotNull($testDiary2);

        $this->diaryOwner = $user;
        $this->testDiaries = [$testDiary1->toArray(), $testDiary2->toArray()];
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