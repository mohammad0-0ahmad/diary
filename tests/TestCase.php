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

    protected function createNewDiary($owner, $date, $content, $privacy = null)
    {
        return Diary::create([
            'owner' => $owner,
            'privacy' => $privacy,
            'date' => $date,
            'content' => $content,
        ]);
    }

    protected function getDiary($owner, $date)
    {
        return Diary::where("owner", $owner)->where('date', $date)->first();
    }
}