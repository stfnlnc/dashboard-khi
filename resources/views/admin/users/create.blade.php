<x-app-layout>
    @section('title', 'Ajouter un utilisateur')
    <x-slot name="header">
        @yield('title')
    </x-slot>

    <section class="container flex col w--100">
        <card>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div class="grid grid--2 grid--1-mobile grid-gap--4">
                    <!-- Name -->
                    <div>
                        <x-input-label for="lastname" :value="__('Nom')"/>
                        <x-text-input id="lastname" type="text" name="lastname" :value="old('lastname')" required autofocus
                                      autocomplete="lastname"/>
                        <x-input-error :messages="$errors->get('lastname')"/>
                    </div>

                    <!-- FirstName -->
                    <div>
                        <x-input-label for="firstname" :value="__('Prénom')"/>
                        <x-text-input id="firstname" type="text" name="firstname" :value="old('firstname')" required autofocus
                                      autocomplete="firstname"/>
                        <x-input-error :messages="$errors->get('firstname')"/>
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-input-label for="phone" :value="__('Téléphone')"/>
                        <x-text-input id="phone" type="text" name="phone" :value="old('phone')" autofocus
                                      autocomplete="phone"/>
                        <x-input-error :messages="$errors->get('phone')"/>
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required
                                      autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')"/>
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Mot de passe')"/>

                        <x-text-input id="password"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('password')"/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')"/>

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>

                <div class="flex col gap--4">
                    <x-primary-button class="mt--4">
                        {{ __('Enregistrer') }}
                    </x-primary-button>
                </div>
            </form>
        </card>

    </section>

</x-app-layout>
