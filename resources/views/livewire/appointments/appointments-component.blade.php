<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="bg-gray-100 rounded-lg px-4 py-3">
                    <span class="font-bold text-lg text-gray-800">Create an Appointment</span>
                    <form wire:submit.prevent="addAppointment">
                        <div class="p-5">
                            @if($appointmentInfo == false)
                            <div>
                                <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                    <x-jet-label value="Select Appointment's Center" />
                                    <select wire:model="center" class="col-span-2">
                                        <option value="" selected="true">Centers</option>
                                        @foreach($centers as $center)
                                        <option value="{{ $center['id'] }}">{{ $center['center_name'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('center')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                    <x-jet-label value="Select Vaccine" />
                                    <select wire:model="center" class="col-span-2">
                                        <option value="" selected="true">Vaccines</option>
                                        @forelse($availableVaccines as $availableVaccine)
                                        <option value="{{ $availableVaccine->vaccine_name }}">{{
                                            $availableVaccine->vaccine_name
                                            }}</option>
                                        @empty
                                        empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div wire:click.prevent="next" class="p-5">
                                Next
                            </div>

                            @elseif($appointmentInfo == true)
                            <h1> Center Info </h1>

                            <div>
                                Name: {{ $centerForm['center_name'] }}
                            </div>

                            <div>
                                Location: {{ $centerForm['center_location'] }}
                            </div>

                            <div>
                                Contact Number: {{ $centerForm['center_contact_numer'] }}
                            </div>

                            <div>
                                Email: {{ $centerForm['center_email'] }}
                            </div>

                            <div>
                                Hours Open: {{ $centerForm['opening_hours'] }} to {{ $centerForm['closing_hours'] }}
                            </div>

                            <br>

                            <h1> Vaccine Info </h1>

                            <div>
                                Name: {{ $vaccineForm['vaccine_name'] }}
                            </div>

                            <div>
                                Manufacturer: {{ $vaccineForm['vaccine_manufacturer'] }}
                            </div>

                            <div>
                                Description: {{ $vaccineForm['vaccine_info'] }}
                            </div>

                            <div>
                                Restriction: {{ $vaccineForm['vaccine_restriction'] }}
                            </div>

                            <br>

                            <h1> User Info </h1>

                            <div>
                                Name: {{ auth()->user()->name }}
                            </div>

                            <div>
                                Email: {{ auth()->user()->email }}
                            </div>

                            <div class="flex flex-col">
                                <div class="p-5">
                                    <button type="submit">
                                        Set Appointment
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>

                    <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                        <x-jet-label value="Vaccine's Name" />
                        <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_name" required />
                    </div>

                    <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2">
                        <x-jet-label value="Vaccine's Manufacturer" />
                        <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_manufacturer"
                            required />
                    </div>

                    <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2">
                        <x-jet-label value="Vaccine's Information" />
                        <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_info" required />
                    </div>

                    <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2">
                        <x-jet-label value="Vaccine's Restriction" />
                        <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_restriction"
                            required />
                    </div>

                    <div class="flex flex-col justify-end items-end mt-2">
                        <x-jet-button>
                            Save
                        </x-jet-button>
                        <x-jet-action-message class="pt-2" on="vaccineAdded">
                            Vaccine has been sucessfully added!
                        </x-jet-action-message>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>