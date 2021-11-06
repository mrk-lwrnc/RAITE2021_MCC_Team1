<div>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('User Management') }}
    </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5">
                    @forelse($users as $user)
                        <div class="flex flex-row gap-5">
                            <div>
                            {{ $user->name }}
                            </div>

                            <div>
                            {{ $user->email }}
                            </div>

                            <div>
                            {{ $user->user_contact_number }}
                            </div>
                        </div>   
                    @empty
                        <div>
                            There are no users!
                        </div>
                    @endforelse
                </div>

                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
