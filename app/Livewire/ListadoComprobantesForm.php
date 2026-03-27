<?php

namespace App\Livewire;

use App\Models\Comprobante;
use Livewire\Component;
use Livewire\WithPagination;

class ListadoComprobantesForm extends Component
{
    use WithPagination;
    public $recordCount;

    public function render()
    {
        $comprobantes = Comprobante::orderBy('id', 'desc')
                    ->take(50) 
                    ->paginate(10);

        $this->recordCount = $comprobantes->count();
      

        // Obtenemos las columnas y filtramos las que no queremos mostrar
        $headers = $comprobantes->isEmpty()
            ? []
            : array_diff(array_keys($comprobantes->first()->getAttributes()), ['id', 'updated_at']);

        return view('livewire.listado-comprobantes-form', [
            'rows' => $comprobantes,
            'headers' => $headers
        ]);
    }
}
