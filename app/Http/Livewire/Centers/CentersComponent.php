<?php

namespace App\Http\Livewire\Centers;

use Livewire\Component;
use App\Models\Center;
use App\Models\Vaccine;
use App\Models\AvailableVaccine;

class CentersComponent extends Component
{
    public $vaccines = [];

    public $form = [
        'center_name' => '',
        'center_location' => '',
        'center_contact_number' => '',
        'center_email' => '',
    ];

    public $availableVaccines = [];

    protected $rules = [
        'form.center_name' => 'required|string',
        'form.center_location' => 'required|string',
        'form.center_contact_number' => 'required|string',
        'form.center_email' => 'required|string|email',
    ];
    
    public function mount()
    {
        $this->vaccines = Vaccine::select('id', 'vaccine_name')->get();
    }

    public function render()
    {
        $centers = Center::paginate(10);

        return view('livewire.centers.centers-component', compact('centers'));
    }

    public function addCenter()
    {
        $this->availableVaccines = array_keys($this->availableVaccines);

        $this->validate();

        $center = Center::create([
            'center_name' => $this->form['center_name'],
            'center_location' => $this->form['center_location'],
            'center_contact_number' => $this->form['center_contact_number'],
            'center_email' => $this->form['center_email'],
        ]);

        foreach($this->availableVaccines as $key => $value){
            AvailableVaccine::create([
                'center_id' => $center->id,
                'vaccine_name' => $value,
            ]);
        }

        session()->flash('success', 'Center has been successfully added!');

        $this->form = [
            'center_name' => '',
            'center_location' => '',
            'center_contact_number' => '',
            'center_email' => '',
        ];

        $this->availableVaccines = [];
    }
}
