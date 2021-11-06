<?php

namespace App\Http\Livewire\Centers;

use Livewire\Component;
use App\Models\Center;

class CentersComponent extends Component
{
    public $form = [
        'center_name',
        'center_location',
        'center_contact_number',
        'center_email',
    ];

    protected $rules = [
        'form.center_name' => 'required|string',
        'form.center_location' => 'required|string',
        'form.center_contact_number' => 'required|string',
        'form.center_email' => 'required|string|email',
    ];

    public function render()
    {
        $centers = Center::paginate(10);

        return view('livewire.centers.centers-component', compact('centers'));
    }

    public function addCenter()
    {
        $this->validate();


    }
}
