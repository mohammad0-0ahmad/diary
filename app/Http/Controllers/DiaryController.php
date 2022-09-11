<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use MySQL\Error\Server as MySqlError;
use Symfony\Component\HttpFoundation\Response as ResponseCode;
use \Illuminate\Database\QueryException;

class DiaryController extends Controller
{
    public function store()
    {
        $date = request('date');
        try {
            Diary::create([
                'owner' => request('owner'),
                'privacy' => request('privacy'),
                'date' => $date,
                'content' => request('content'),
            ]);

            return response(null, ResponseCode::HTTP_CREATED);

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
                    ResponseCode::HTTP_BAD_REQUEST;
            }
            return Response::json($data, $status);
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