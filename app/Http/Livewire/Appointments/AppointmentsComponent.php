<?php

namespace App\Http\Livewire\Appointments;

use Livewire\Component;
use App\Models\Center;
use App\Models\Vaccine;
use App\Models\AvailableVaccine;

class AppointmentsComponent extends Component
{
    public $center;
    public $vaccine;
    public $availableVaccines;
    public $appointmentInfo = false;

    public $centerForm = [
        'center_name' => '',
        'center_location' => '',
        'center_contact_number' => '',
        'center_email' => '',
        'opening_hours' => '',
        'closing_hours' => '',
    ];

    public $vaccineForm = [
        'vaccine_name' => '',
        'vaccine_manufacturer' => '',
        'vaccine_info' => '',
        'vaccine_restriction' => '',
    ];

    public $pages = 1;

    protected $rules = [
        'center' => 'required|exists:centers,id',
        'vaccine' => 'required|exists:available_vaccines,vaccine_name',
    ];

    public function mount()
    {
        $this->availableVaccines = [];
    }

    public function render()
    {
        $centers = Center::all()->toArray();

        // dd($centers, $availableVaccines);

        return view('livewire.appointments.appointments-component', compact('centers'));
    }

    public function updatedCenter($value)
    {
        $this->availableVaccines = AvailableVaccine::where('center_id', +$value)->get();
    }

    public function next()
    {
        // dd($this->vaccine);
        $this->validate();

        $center = Center::where('id', $this->center)->first();

        $vaccine = Vaccine::where('vaccine_name', $this->vaccine)->first();

        $this->centerForm = $center;

        $this->vaccineForm = $vaccine;

        $this->appointmentInfo = true;
    }

    public function addAppointment()
    {
        $this->validate();
        
    }
}
