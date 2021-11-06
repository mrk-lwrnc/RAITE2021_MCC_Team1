<div>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Center Management') }}
    </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col gap-5">
                    Add Center
                    <form wire:submit.prevent="addCenter">
                        @if(session()->has('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                        @endif

                        <div>
                            <label>Center Name</label>
                            <input type="text" wire:model.defer="form.center_name" required>
                        </div>

                        <div>
                            <label>Center Location</label>
                            <input type="text" wire:model.defer="form.center_location" required>
                        </div>

                        <div>
                            <label>Center Contact Number</label>
                            <input type="text" wire:model.defer="form.center_contact_number" required>
                        </div>

                        <div>
                            <label>Center Email</label>
                            <input type="email" wire:model.defer="form.center_email" required>
                        </div>

                        <div>
                            <label>Opening Hours</label>
                            <input type="time" wire:model.defer="form.opening_hours" required>
                        </div>

                        <div>
                            <label>Closing Hours</label>
                            <input type="time" wire:model.defer="form.closing_hours" required>
                        </div>

                        <div>
                            <label>Available Vaccines</label>
                            @foreach($vaccines as $vaccine)
                                <div>
                                    <input type="checkbox" wire:model.defer="availableVaccines.{{ $vaccine->vaccine_name }}" wire:key="vaccine-{{ $loop->index }}">
                                    <label>{{ $vaccine->vaccine_name}}</label>
                                </div>
                            @endforeach
                        </div>

                        <div>
                            <button type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

                <div class="p-5">
                    @forelse($centers as $center)
                        <div class="flex flex-row gap-5">
                            <div>
                            {{ $center->center_name }}
                            </div>

                            <div>
                            {{ $center->center_location }}
                            </div>

                            <div>
                            {{ $center->center_contact_number }}
                            </div>

                            <div>
                            {{ $center->center_email }}
                            </div>

                            <div>
                            From {{ $center->opening_hours }} to {{ $center->closing_hours }}
                            </div>

                            @foreach($center->availableVaccines as $vax)
                                {{ $vax->vaccine_name }}
                            @endforeach
                        </div>   
                    @empty
                        <div>
                            There are no centers!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
