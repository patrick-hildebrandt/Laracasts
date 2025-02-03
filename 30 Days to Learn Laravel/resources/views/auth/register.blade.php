<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    <form method="POST" action="/register">
        {{-- Token-Erzeugung gegen Cross-Site-Request-Forgery-Angriffe, matcht mit Session --}}
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first-name">
                            First Name
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input type="text" name="first-name" id="first-name" placeholder="John" required />

                            <x-form-error name="first-name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last-name">
                            Last Name
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input type="text" name="last-name" id="last-name" placeholder="Doe" required />

                            <x-form-error name="last-name" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">
                            Email
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input type="email" name="email" id="email" placeholder="john.doe@mail.com"
                                required />

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">
                            Password
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input type="password" name="password" id="password" placeholder="strong<PW>1234"
                                required />

                            <x-form-error name="password" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">
                            Confirm Password
                        </x-form-label>

                        <div class="mt-2">
                            <x-form-input type="password" name="password_confirmation" id="password_confirmation"
                                placeholder="strong<PW>1234" required />

                            <x-form-error name="password_confirmation" />
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/" class="text-sm/6 font-semibold text-gray-900">Cancel</a>

            <x-form-button>
                Register
            </x-form-button>
        </div>
    </form>

</x-layout>
