<?php

namespace App\Http\Livewire\Province;

use Livewire\Component;
use App\Models\Province;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProvinceCreate extends Component
{
    use LivewireAlert;
    public $name;
    public $description;
    public $state = "ACTIVO";
    public $slug;
    public function render()
    {
        return view('livewire.province.province-create');
    }
    protected $rules = [
        'name' => 'required|max:100|min:2|unique:provinces,name',
        'state' => 'required',
    ];

        public function submit()
        {
            $this->validate();
            Province::create([
                'name' => $this->name,
                'description' => $this->description,
                'state' => $this->state,
                'slug' => Str::uuid(),
            ]);

            $this->cleanInputs();
            $this->confirm('Registro creado correctamente', [
                'icon' => 'success',
                'toast' => false,
                'position' => 'center',
                'showConfirmButton' => true,
                'showCancelButton' => false,
                'cancelButtonText' => 'Cancelar',
                'confirmButtonText' => 'Aceptar',
                'onConfirmed' => 'confirmed',
            ]);
        }

    public function cleanInputs()
    {
        $this->name = "";
        $this->description = "";
    }
    protected $listeners = [
        'confirmed',
    ];
         public function confirmed()
     {
         return redirect()->route('provinces.dashboard');
     }
}
