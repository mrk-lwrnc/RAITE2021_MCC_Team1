<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vaccine Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex flex-col gap-5 mt-2">
                    <form wire:submit.prevent="addVaccine">
                        <div class="bg-gray-100 rounded-lg px-4 py-3">
                            <span class="font-bold text-lg text-gray-800">Add Vaccine</span>
                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2 mt-2">
                                <x-jet-label value="Vaccine's Name" />
                                <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_name"
                                    required />
                            </div>

                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2">
                                <x-jet-label value="Vaccine's Manufacturer" />
                                <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_manufacturer"
                                    required />
                            </div>

                            <div class="pl-2 grid grid-cols-3 gap-4 items-center pb-2">
                                <x-jet-label value="Vaccine's Information" />
                                <x-jet-input class="col-span-2" type="text" wire:model.defer="form.vaccine_info"
                                    required />
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
                    </form>
                </div>

                <div class="block w-full overflow-x-auto mt-4">
                    <div class="font-bold text-lg text-gray-800 px-4 pb-2">Vaccines</div>
                    <table class="items-center bg-transparent w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Name</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Manufacturer</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Information</th>
                                <th
                                    class="px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left">
                                    Restriction</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vaccines as $vaccine)
                            <tr>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $vaccine->vaccine_name }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $vaccine->vaccine_manufacturer }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $vaccine->vaccine_info }}
                                </td>
                                <td
                                    class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                    {{ $vaccine->vaccine_restriction }}
                                </td>
                            </tr>
                            @empty
                            <div>
                                There are no vaccines!
                            </div>
                            @endforelse
                        </tbody>
                    </table>

                </div>

                <div class="p-2">
                    {{ $vaccines->links() }}
                </div>
            </div>
        </div>
    </div>
</div>