<section class="flex col gap--2">
    <header>
            <h4>
                {{ __('Vos informations') }}
            </h4>

            <p class="c--stroke-dark text--s">
                {{ __("Modifier les informations de votre profil") }}
            </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="flex col gap--2">
        @csrf
        @method('patch')
        <p class="tag tag--stroke-light">
            {{ Auth::user()->role->title }}
        </p>
        <div class="grid grid--2 grid--1-mobile grid-gap--4">
        <!-- Name -->
        <div>
            <x-input-label for="lastname" :value="__('Nom')" />
            <x-text-input id="lastname" name="lastname" type="text" :value="old('lastname', Auth::user()->lastname)" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('lastname')" />
        </div>

        <!-- FirstName -->
        <div>
            <x-input-label for="firstname" :value="__('Prénom')" />
            <x-text-input id="firstname" name="firstname" type="text" :value="old('firstname', Auth::user()->firstname)" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" />
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Téléphone')" />
            <x-text-input id="phone" name="phone" type="text" :value="old('phone', Auth::user()->phone)" autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" :value="old('email', Auth::user()->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />

            <!-- Email verify -->
            @if (!Auth::user()->hasVerifiedEmail())
                <div class="flex col gap--1  mt--2">
                    <p class="text--s tag tag--warning">
                        {{ __('Votre adresse email n\'est pas vérifiée') }}
                    </p>
                    <button form="send-verification" class="btn btn--small btn--dark">
                        {{ __('Renvoyer le lien de vérification') }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt--2 text--s">
                            {{ __('Un nouveau lien a été envoyé à votre adresse email') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        </div>
        <div class="flex col gap--2 mt--2">
            <x-primary-button>{{ __('Modifier') }}</x-primary-button>
        </div>
    </form>
</section>
