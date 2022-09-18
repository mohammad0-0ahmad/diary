<?php

namespace Tests;

use App\Models\Diary;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->diaryOwner = $this->user;
    }

    protected function getDiary($owner, $date)
    {
        return Diary::where("owner", $owner)->where('date', $date)->first();
    }
}