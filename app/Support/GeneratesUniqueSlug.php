<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GeneratesUniqueSlug
{
    /**
     * @param  class-string<Model>  $modelClass
     */
    public static function from(string $value, string $modelClass, ?int $ignoreId = null): string
    {
        $slug = Str::slug($value);
        $original = $slug;
        $count = 1;

        while (
            $modelClass::query()
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $original.'-'.$count;
            $count++;
        }

        return $slug;
    }
}
