<?php

namespace App\Actions\Apocalypse;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Validation\Validator;
use App\Models\Apocalypse;
use Illuminate\Support\Str;

class StoreAType
{
    use AsAction;

    public function handle($name, $stats, $defaults) : Apocalypse
    {
        return Apocalypse::create([
            'slug' => Str::slug($name, '-'),
            'name' => $name,
            'stats' => $stats,
            'defaults' => $defaults,
        ]);
    }
}