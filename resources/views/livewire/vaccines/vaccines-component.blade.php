<div>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Vaccine Management') }}
    </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col gap-5">
                    Add Vaccine
                    <form wire:submit.prevent="addVaccine">
                        @if(session()->has('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                        @endif

                        <div>
                            <label>Vaccine Name</label>
                            <input type="text" wire:model.defer="form.vaccine_name" required>
                        </div>

                        <div>
                            <label>Vaccine Manufacturer</label>
                            <input type="text" wire:model.defer="form.vaccine_manufacturer" required>
                        </div>

                        <div>
                            <label>Vaccine Info</label>
                            <input type="text" wire:model.defer="form.vaccine_info" required>
                        </div>

                        <div>
                            <label>Vaccine Restriction</label>
                            <input type="text" wire:model.defer="form.vaccine_restriction" required>
                        </div>

                        <div>
                            <button type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

                <div class="p-5">
                    @forelse($vaccines as $vaccine)
                        <div class="flex flex-row">
                            <div>
                            {{ $vaccine->vaccine_name }}
                            </div>

                            <div>
                            {{ $vaccine->vaccine_manufacturer }}
                            </div>

                            <div>
                            {{ $vaccine->vaccine_info }}
                            </div>

                            <div>
                            {{ $vaccine->vaccine_restriction }}
                            </div>
                        </div>   
                    @empty
                    @endforelse
                </div>

                <div>
                    {{ $vaccines->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
