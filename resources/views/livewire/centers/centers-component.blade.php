<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Center Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col gap-5">
                    <form wire:submit.prevent="addCenter">
                        <div class="bg-gray-100 rounded-lg px-4 py-3">
                            <span class="font-bold text-lg text-gray-800">Add Center</span>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Center's Name" />
                                <x-jet-input class="col-span-2" type="text" wire:model.defer="form.center_name"
                                    required />
                            </div>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Center's Location" />
                                <x-jet-input class="col-span-2" type="text" wire:model.defer="form.center_location"
                                    required />
                            </div>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Center's Contact Number" />
                                <x-jet-input class="col-span-2" type="text"
                                    wire:model.defer="form.center_contact_number" required />
                            </div>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Center's Email" />
                                <x-jet-input class="col-span-2" type="email" wire:model.defer="form.center_email"
                                    required />
                            </div>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Opening Hours" />
                                <x-jet-input class="col-span-2" type="time" wire:model.defer="form.opening_hours"
                                    required />
                            </div>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Closing Hours" />
                                <x-jet-input class="col-span-2" type="time" wire:model.defer="form.closing_hours"
                                    required />
                            </div>

                            <div class="pl-2 pb-2 mt-2">
                                <x-jet-label value="Available Vaccines" />
                                @foreach($vaccines as $vaccine)
                                <div class="flex flex-row py-1 px-2">
                                    <x-jet-input class="col-span-2" type="checkbox"
                                        wire:model.defer="availableVaccines.{{ $vaccine->vaccine_name }}"
                                        wire:key="vaccine-{{ $loop->index }}" />
                                    <x-jet-label class="ml-2" value="{{ $vaccine->vaccine_name }}" />
                                </div>
                                @endforeach
                            </div>

                            <div class="flex flex-col justify-end items-end mt-2">
                                <x-jet-button>
                                    Save
                                </x-jet-button>
                                <x-jet-action-message class="pt-2" on="centerAdded">
                                    Center has been sucessfully added!
                                </x-jet-action-message>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="block w-full overflow-x-auto mt-4">
                    <div class="font-bold text-lg text-gray-800 px-4 pb-2">Centers</div>
                    <table class="items-center bg-transparent w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Name</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Location</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Contact Number</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Email</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Opening and Closing Hours</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Available Vaccines</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($centers as $center)
                            <tr>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $center->center_name }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $center->center_location }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $center->center_contact_number }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $center->center_email }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    From {{ $center->opening_hours }} to {{ $center->closing_hours }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    @foreach($center->availableVaccines as $vax)
                                    {{ $vax->vaccine_name }}
                                    @endforeach
                                </td>
                            </tr>
                            @empty
                            <div>
                                There are no centers!
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-2">
                    {{ $centers->links() }}
                </div>
            </div>
        </div>
    </div>
</div>