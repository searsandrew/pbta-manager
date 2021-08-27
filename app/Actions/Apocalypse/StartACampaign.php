<?php

namespace App\Actions\Apocalypse;

use App\Models\Apocalypse;
use App\Models\Campaign;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

use Auth;

class StartACampaign
{
    use AsAction;

    public function handle($name, $apocalypse) : Campaign
    {
        $name = Faker::create()->lexify('???');
        return Campaign::create([
            'slug' => Str::slug($name . '-' . Str::random(8), '-'),
            'name' => $name,
            'apocalypse_id' => $apocalypse->id,
            'user_id' => Auth::user()->id,
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

    public function asController(ActionRequest $request, Apocalypse $apocalypse)
    {
        $campaign = $this->handle($request->name, $apocalypse);

        return redirect(route('campaign.show', $campaign));
    }
}