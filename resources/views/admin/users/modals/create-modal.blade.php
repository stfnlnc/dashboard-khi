<x-modal name="add-user" focusable>
    <form class="" method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="flex col gap--4">
            <!-- Name -->
            <div>
                <x-input-label for="lastname" :value="__('Nom')"/>
                <x-text-input id="lastname" type="text" name="lastname" :value="old('lastname')" required autofocus
                              autocomplete="lastname" placeholder="Doe"/>
                <x-input-error :messages="$errors->get('lastname')"/>
            </div>

            <!-- FirstName -->
            <div>
                <x-input-label for="firstname" :value="__('Prénom')"/>
                <x-text-input id="firstname" type="text" name="firstname" :value="old('firstname')" required autofocus
                              autocomplete="firstname" placeholder="John"/>
                <x-input-error :messages="$errors->get('firstname')"/>
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Téléphone')"/>
                <x-text-input id="phone" type="text" name="phone" :value="old('phone')" autofocus
                              autocomplete="phone" placeholder="01 02 03 04 05"/>
                <x-input-error :messages="$errors->get('phone')"/>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" type="email" name="email" :value="old('email')" required
                              autocomplete="username" placeholder="john@doe.fr"/>
                <x-input-error :messages="$errors->get('email')"/>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Mot de passe')"/>
                <x-text-input id="password"
                              type="password"
                              name="password"
                              required autocomplete="new-password" placeholder="Mot de passe"/>
                <x-input-error :messages="$errors->get('password')"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')"/>
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password"  placeholder="Confirmer le mot de passe"/>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>
            <div class="flex row gap--2">
                <x-primary-button>
                    {{ __('Enregistrer') }}
                </x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>
            </div>
        </div>
    </form>
</x-modal>
