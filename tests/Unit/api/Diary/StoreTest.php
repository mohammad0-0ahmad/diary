<?php

namespace Tests\Unit;

use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class StoreDiaryTest extends TestCase
{
    private static $date = "2022/2/2";

    private function createNewDiaryViaApiEndpoint($user, $date, $content)
    {
        $diaryData = [
            'owner' => $user->id,
            'date' => $date,
            'content' => $content,
        ];

        $response = $this->actingAs($user)
            ->postJson(route('diary.store'), $diaryData);

        return $response;
    }

    public function test_create_new_diary_with_unauthed_user()
    {
        $response = $this->postJson(route('diary.store'));
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function test_create_new_diary_with_unexist_date()
    {
        $this->deleteAllTestUserDiaries($this->getTestUser());
        $response = $this->createNewDiaryViaApiEndpoint($this->getTestUser(), self::$date, "test content");
        $response->assertCreated();
    }

    public function test_create_new_diary_with_an_already_exist_date()
    {
        $response = $this->createNewDiaryViaApiEndpoint($this->getTestUser(), self::$date, "test content");
        $response->assertStatus(Response::HTTP_CONFLICT);
        $this->assertTrue(isset($response->getData()->msg));
    }

}