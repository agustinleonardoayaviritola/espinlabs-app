<?php

namespace App\Http\Livewire\Province;

use App\Models\Province;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ProvinceDataTable extends LivewireDatatable
{
    use LivewireAlert;

    public $model = Province::class;

    public function builder()
    {
        return (Province::query()
            ->where('provinces.state', '!=', 'ELIMINADO'));
    }
    public function columns()
    {
        return [

            Column::name('name')
                ->searchable()
               ->label('Nombre'),

            Column::name('description')
              ->label('Descripción'),

            Column::callback(['state'], function ($state) {
                return view('components.datatables.state-data-table', ['state' => $state]);
            })
                ->exportCallback(function ($state) {
                    $state == 'ACTIVO' ? $state = 'ACTIVO' : $state = 'INACTIVO';
                    return (string) $state;
                })
                ->label('Estado')
                ->filterable([
                    'ACTIVO',
                    'INACTIVO'
                ]),

            Column::callback(['slug'], function ($slug) {
                return view('livewire.province.province-table-actions', ['slug' => $slug]);
            })->label('Opciones')
                ->excludeFromExport()
        ];
    }
    public $ProvinceDeleted;
    public function toastConfirmDelet($slug)
    {
        $this->ProvinceDeleted = Province::where('slug', $slug)->first();
        $this->confirm(__('¿Estás seguro de que deseas eliminar el registro?'), [
            'icon' => 'warning',
            'position' =>  'center',
            'toast' =>  false,
            'text' =>  $this->ProvinceDeleted->name,
            'confirmButtonText' =>  'Si',
            'showConfirmButton' =>  true,
            'showCancelButton' => true,
            'onConfirmed' => 'confirmed',
            'confirmButtonColor' => '#A5DC86',
        ]);
    }
    protected $listeners = [
        'confirmed',
    ];
    public function confirmed()
    {
        if ($this->ProvinceDeleted) {
            $this->ProvinceDeleted->state = "ELIMINADO";
            $this->ProvinceDeleted->update();
        }
    }

}
