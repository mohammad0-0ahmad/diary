<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DiaryPrivacy implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {

        switch ($attributes["privacy"]) {
            case null:
                return "public";
                break;

            case "[]":
                return "private";
                break;

            default:
                return $attributes["privacy"];
        }
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        switch ($value) {
            case "public":
                return null;
                break;

            case "private":
                return "[]";
                break;

            default:
                return $value;
        }
    }
}