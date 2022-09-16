<?php
namespace App\Http\Controllers\Traits;

use App\Models\Diary;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

trait GetDiaries
{
    public function getCurrentUserDiaries()
    {
        try {
            $data = Diary::where("owner", auth()->user()->id)
                ->orderBy('date', 'DESC')
                ->get();

            if (isset($data)) {
                return Response::json($data, ResponseCode::HTTP_OK);
            } else {
                return response(null, ResponseCode::HTTP_NOT_FOUND);
            }

        } catch (Throwable $th) {
            var_dump($th);
            return response($null, ResponseCode::HTTP_BAD_REQUEST);
        }
    }
}