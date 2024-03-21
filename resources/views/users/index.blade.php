<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form method="POST" action="{{ route('users.store') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="mt-1 block w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button>
                                {{ __('Send Invitation') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <table class="mt-8 w-full text-left text-sm text-gray-500">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700">
                            <th scope="col" class="px-6 py-3 text-left">{{ __('Email') }}</th>
                            <th scope="col" class="px-6 py-3 text-left">{{ __('Sent on') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($invitations as $invitation)
                                <tr class="border-b bg-white dark:bg-gray-800">
                                    <td class="px-6 py-4 font-medium text-gray-900whitespace-nowrap">
                                        {{ $invitation->email }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900whitespace-nowrap">
                                        {{ $invitation->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
