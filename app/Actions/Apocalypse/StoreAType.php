<?php

namespace App\Actions\Apocalypse;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Validation\Validator;
use App\Models\Apocalypse;
use App\Models\Type;
use Illuminate\Support\Str;

class StoreAType
{
    use AsAction;

    public function handle(Apocalypse $apocalypse, $name, $flavor, $type, $rules, $attacks, $gear, $moves, $special, $luck, $history, $looks, $ratings, $improvements) : Type
    {
        return $apocalypse->types()->create([
            'slug' => Str::slug($name, '-'),
            'name' => $name,
            'flavor' => $flavor,
            'type' => $type,
            'rules' => $rules,
            'attacks' => $attacks,
            'gear' => $gear,
            'moves' => $moves,
            'special' => $special,
            'luck' => $luck,
            'history' => $history,
            'looks' => $looks,
            'ratings' => $ratings,
            'improvements' => $improvements
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
            'name' => 'required|string',
            'flavor' => 'required|string',
            'type' => 'required|string',
            'rules' => 'required|string',
            'attacks' => 'required|string',
            'gear' => 'required|string',
            'moves' => 'required|string',
            'special' => 'required|string',
            'luck' => 'required|string',
            'history' => 'required|string',
            'looks' => 'required|string',
            'ratings' => 'required|string',
            'improvements' => 'required|string'
        ];
    }

    public function asController(ActionRequest $request, Apocalypse $apocalypse)
    {
        $this->handle($apocalypse, $request->name, $request->flavor, $request->type, $request->rules, $request->attacks, $request->gear, $request->moves, $request->special, $request->luck, $request->history, $request->looks, $request->ratings, $request->improvements);

        return redirect(route('type.create', $apocalypse));
    }
}