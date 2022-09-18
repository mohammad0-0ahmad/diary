<?php

namespace Tests\Unit;

use App\Models\Diary;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class StoreDiaryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        $this->testDiary = Diary::factory()->make();
    }

    private function createNewDiaryViaApiEndpoint()
    {
        $diaryData = [
            'owner' => $this->user->id,
            'date' => $this->testDiary->date,
            'content' => $this->testDiary->content,
        ];

        $response = $this->actingAs($this->user)
            ->postJson(route('diaries.store'), $diaryData);

        return $response;
    }

    public function test_create_new_diary_with_unauthed_user()
    {
        $response = $this->postJson(route('diaries.store', $this->testDiary));
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function test_create_new_diary()
    {
        $response = $this->createNewDiaryViaApiEndpoint();
        $response->assertCreated();
        $response->assertJsonPath("content", $this->testDiary->content);
        $response->assertJsonPath("date", $this->testDiary->date);
    }

    public function test_create_new_diary_with_an_already_exist_date()
    {
        $this->createNewDiaryViaApiEndpoint();
        $response = $this->createNewDiaryViaApiEndpoint();
        $response->assertStatus(Response::HTTP_CONFLICT);
        $this->assertTrue(isset($response->getData()->msg));
    }

}