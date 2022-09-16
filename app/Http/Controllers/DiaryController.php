<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\GetDiaries;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use MySQL\Error\Server as MySqlError;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use \Illuminate\Database\QueryException;

class DiaryController extends Controller
{
    use GetDiaries;

    public function index()
    {
        return $this->getCurrentUserDiaries();
    }

    //TODO: Delete after code review.
    // This and all related tests are not required for this app functionality, but just to have more code in this repo.
    public function show($date)
    {
        try {
            $data = Diary::where("owner", auth()->user()->id)
                ->where("date", $date)
                ->limit(1)
                ->get()
                ->toArray();

            if (count($data)) {
                return Response::json($data[0], ResponseCode::HTTP_OK);
            } else {
                return response(null, ResponseCode::HTTP_NOT_FOUND);
            }

        } catch (Throwable $th) {
            var_dump($th);
            return response($null, ResponseCode::HTTP_BAD_REQUEST);
        }
    }

    public function store()
    {
        $date = request('date');
        try {
            $newDiary = Diary::create([
                'owner' => auth()->user()->id,
                'privacy' => request('privacy'),
                'date' => $date,
                'content' => request('content'),
            ])->toArray();

            return Response::json($newDiary, ResponseCode::HTTP_CREATED);

        } catch (QueryException $e) {
            $status;
            $data = [];
            switch ($e->errorInfo[1]) {
                case MySqlError::ER_DUP_ENTRY:
                    $status = ResponseCode::HTTP_CONFLICT;
                    $data = [
                        'msg' => __('diary.error.dup_diary', ['date' => $date]),
                    ];
                    break;
                default:
                    $status = ResponseCode::HTTP_BAD_REQUEST;
            }
            return Response::json($data, $status);
        }
    }

    public function update($date)
    {
        try {
            $newData = [
                "content" => request("content"),
                "date" => request("date"),
            ];

            $newData = array_filter($newData, function ($item) {
                return isset($item) ? true : false;
            });

            Diary::where([
                'owner' => auth()->user()->id,
                'date' => $date,
            ])
                ->limit(1)
                ->update($newData);

            // Could be better if it be returned with the previous query.
            $updatedDiary = Diary::where([
                'owner' => auth()->user()->id,
                'date' => $newData["date"] ?? $date,
            ])->first();

            return Response::json($updatedDiary, ResponseCode::HTTP_OK);
        } catch (QueryException $e) {
            return response(null, ResponseCode::HTTP_BAD_REQUEST);
        }
    }

    public function destroy($date)
    {
        try {
            Diary::where([
                'owner' => auth()->user()->id,
                'date' => $date,
            ])
                ->limit(1)
                ->delete();

            return response(null, ResponseCode::HTTP_OK);
        } catch (QueryException $e) {
            return response(null, ResponseCode::HTTP_BAD_REQUEST);
        }
    }
}