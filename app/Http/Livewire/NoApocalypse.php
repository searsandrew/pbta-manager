<?php

namespace App\Http\Livewire;

use App\Models\Apocalypse;
use Livewire\Component;
use Illuminate\Support\Str;

class NoApocalypse extends Component
{
    public $creatingApocalypse = false;

    public function createApocalypse()
    {
        dd($this);
        $this->validate([
            'name' => 'required|string',
            'stats' => 'required|array',
            'luck' => 'required|integer',
            'harm' => 'required|integer',
            'experience' => 'required|integer',
        ]);

        Apocalypse::create([
            'slug' => Str::slug($this->name . '-' . Str::random(8), '-'),
            'name' => $this->name,
            'stats' => json_encode(explode(',', $this->stats)),
            'defaults' => json_encode([
                'luck' => $this->luck,
                'harm' => $this->harm,
                'unstable' => $this->unstable,
                'experience' => $this->experience,
            ]),
        ]);

        $this->creatingApocalypse = false;
        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.no-apocalypse');
    }
}
