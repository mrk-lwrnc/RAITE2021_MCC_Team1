<?php

namespace App\Http\Livewire\Vaccines;

use Livewire\Component;
use App\Models\Vaccine;

class VaccinesComponent extends Component
{
    public $form = [
        'vaccine_name' => '',
        'vaccine_manufacturer' => '',
        'vaccine_info' => '',
        'vaccine_restriction' => '',
    ];

    protected $rules = [
        'form.vaccine_name' => 'required|string',
        'form.vaccine_manufacturer' => 'required|string',
        'form.vaccine_info' => 'required|string',
        'form.vaccine_restriction' => 'required|string',
    ];

    public function render()
    {
        $vaccines = Vaccine::paginate(10);

        return view('livewire.vaccines.vaccines-component', compact('vaccines'));
    }

    public function addVaccine()
    {
        // dd($this->form);
        $this->validate();

        Vaccine::create([
            'vaccine_name' => $this->form['vaccine_name'],
            'vaccine_manufacturer' => $this->form['vaccine_manufacturer'],
            'vaccine_info' => $this->form['vaccine_info'],
            'vaccine_restriction' => $this->form['vaccine_restriction'],
        ]);

        session()->flash('success', 'Vaccine has been sucessfully added!');

        $this->form = [
            'vaccine_name' => '',
            'vaccine_manufacturer' => '',
            'vaccine_info' => '',
            'vaccine_restriction' => '',
        ];
    }
}
