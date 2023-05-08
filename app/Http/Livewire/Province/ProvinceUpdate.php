<?php

namespace App\Http\Livewire\Province;

use Livewire\Component;
use App\Models\Province;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProvinceUpdate extends Component
{
    use LivewireAlert;
    public $Province;
    public $name;
    public $description;
    public $state;
    public function render()
    {
        return view('livewire.province.province-update');
    }
    public function mount($slug)
    {
        $this->Province = Province::where('slug', $slug)->firstOrFail();
        if ($this->Province) {
            $this->name = $this->Province->name;
            $this->description = $this->Province->description;
            $this->state = $this->Province->state;
        }
    }
    protected $rules = [

        'name' => 'required|max:100|min:2|unique:municipalities,name',
        'state' => 'required',
    ];
    public function submit()
    {
        $this->rules['name'] = 'required|unique:provinces,name,' . $this->Province->id;
        $this->validate();

        $this->Province->update([
            'name' => $this->name,
            'description' => $this->description,
            'state' => $this->state,
        ]);
        $this->alert('success', 'Registro actualizado correctamente', [
            'toast' => true,
            'position' => 'top-end',
        ]);

    }
    protected $listeners = [
        'confirmed',
    ];

}
