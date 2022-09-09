<?php

namespace Tests;

use App\Models\Diary;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function getTestUser($testUserEmailSuffix = "")
    {
        $user = User::firstWhere('email', "test$testUserEmailSuffix@diary.se");
        return $user;
    }

    protected function deleteAllTestUserDiaries($user)
    {
        return Diary::where('owner', $user->id)->delete();
    }

    protected function createNewDiary($user, $date, $content)
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
}
