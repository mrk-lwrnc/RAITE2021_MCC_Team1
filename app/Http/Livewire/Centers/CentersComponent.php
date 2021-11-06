<?php

namespace App\Http\Livewire\Centers;

use Livewire\Component;
use App\Models\Center;
use App\Models\Vaccine;
use App\Models\AvailableVaccine;
use Livewire\WithPagination;

class CentersComponent extends Component
{
    use WithPagination;

    public $vaccines = [];

    public $form = [
        'center_name' => '',
        'center_location' => '',
        'center_contact_number' => '',
        'center_email' => '',
        'opening_hours' => '',
        'closing_hours' => '',
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
        $centers = Center::with('availableVaccines')->paginate(10);

        return view('livewire.centers.centers-component', compact('centers'));
    }

    public function addCenter()
    {
        // dd($this->form);
        $this->availableVaccines = array_keys($this->availableVaccines);

        $this->validate();

        $opening_hours = date_create($this->form['opening_hours']);
        $opening_hours = date_format($opening_hours, "h:i a");

        $closing_hours = date_create($this->form['closing_hours']);
        $closing_hours = date_format($closing_hours, "h:i a");

        $center = Center::create([
            'center_name' => $this->form['center_name'],
            'center_location' => $this->form['center_location'],
            'center_contact_number' => $this->form['center_contact_number'],
            'center_email' => $this->form['center_email'],
            'opening_hours' => $opening_hours,
            'closing_hours' => $closing_hours,
        ]);

        foreach ($this->availableVaccines as $key => $value) {
            AvailableVaccine::create([
                'center_id' => $center->id,
                'vaccine_name' => $value,
            ]);
        }

        $this->emit('centerAdded');

        $this->form = [
            'center_name' => '',
            'center_location' => '',
            'center_contact_number' => '',
            'center_email' => '',
        ];

        $this->availableVaccines = [];
    }
}
