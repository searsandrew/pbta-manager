<?php

namespace App\Actions\Apocalypse;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Validation\Validator;
use App\Models\Apocalypse;
use Illuminate\Support\Str;

class StoreAnApocalypse
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

    public function getControllerMiddleware(): array
    {
        return ['auth'];
    }

    public function authorize(ActionRequest $request): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:apocalypses,name',
            'stats' => 'required|string',
            'luck' => 'required|integer',
            'harm' => 'required|integer',
            'unstable' => 'required|integer',
            'experience' => 'required|integer',
        ];
    }

    public function asController(ActionRequest $request)
    {
        $arrayStats = explode(',', $request->stats);
        $arraySlugged = array_map(function($value) { 
            return Str::slug($value); 
        }, $arrayStats);

        $defaults = json_encode([
            'luck' => $request->luck,
            'harm' => $request->harm,
            'unstable' => $request->unstable,
            'experience' => $request->experience,
        ]);

        $this->handle($request->name, json_encode($arraySlugged), $defaults);

        return redirect(route('class.create'));
    }
}