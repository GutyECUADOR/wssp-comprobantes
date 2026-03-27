<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Comprobante;

class UploadComprobantesForm extends Component
{
    use WithFileUploads;
    public $numero_pedido;
    public $nombre_cliente;
    public $banco;
    public $comprobanteFile;
    public $path;

    protected $rules = [
        'numero_pedido' => 'required|unique:comprobantes,numero_pedido',
        'nombre_cliente' => 'required',
        'banco' => 'required',
        'comprobanteFile' => 'required|mimes:pdf,jpg,jpeg,png|max:5120', // 5MB max
    ];

    protected $messages = [
        'numero_pedido.required' => 'El número de pedido es obligatorio.',
        'numero_pedido.unique' => 'El número de pedido ya existe.',
        'comprobanteFile.required' => 'El archivo de comprobante es obligatorio.',
        'comprobanteFile.mimes' => 'El archivo debe ser una imagen (jpg, jpeg, png) o un PDF.',
        'comprobanteFile.max' => 'El archivo no debe superar los 5MB.',
    ];

    public function save()
    {
        $this->validate();


        $this->path = $this->comprobanteFile->store('comprobantes', 'public');
        $this->comprobanteFile->storeAs('comprobantes', $this->numero_pedido . '.' . $this->comprobanteFile->getClientOriginalExtension());
      
        Comprobante::create([
            'numero_pedido' => $this->numero_pedido,
            'nombre_cliente' => $this->nombre_cliente,
            'banco' => $this->banco,
            'comprobante_file' => $this->path
        ]);

        // Puedes emitir un evento o mostrar un mensaje de éxito
        session()->flash('success', 'Archivo cargado exitosamente. El tiempo estimado de validación es de 24 a 48 horas hábiles.');
        // Limpiar los campos después de la carga
        $this->reset(['numero_pedido', 'nombre_cliente', 'banco', 'comprobanteFile']);
    }

    public function render()
    {
        return view('livewire.upload-comprobantes-form');
    }
}
