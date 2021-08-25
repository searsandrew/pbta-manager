<?php

namespace App\Actions\Apocalypse;

use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\ActionRequest;
use Illuminate\Validation\Validator;
use App\Models\Apocalypse;
use App\Models\Campaign;
use Illuminate\Support\Str;

use Auth;

class StartACampaign
{
    use AsAction;

    public function handle($name, $apocalypse) : Campaign
    {
        return Auth::user()->campaign()->create([
            'slug' => Str::slug($this->name . '-' . Str::random(8), '-'),
            'name' => $name,
            'apocalypse_id' => $apocalypse,
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
        ];
    }

    public function asController(ActionRequest $request, Apocalypse $apocalypse)
    {
        $campaign = $this->handle($request->name, $apocalypse);

        return redirect(route('campaign.show', $campaign));
    }
}