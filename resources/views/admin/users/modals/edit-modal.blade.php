<x-modal name="edit-user-{{ $user->id }}" focusable>
    <form method="post" action="{{ route('users.update', [$user]) }}" class="flex col gap--2">
        @csrf
        @method('patch')
        <!-- Selected user role -->
        <p class="tag tag--stroke-light mb--2">
            {{ $user->role->title }}
        </p>
        <div class="flex col gap--4">
            <!-- Name -->
            <div>
                <x-input-label for="lastname" :value="__('Nom')"/>
                <x-text-input id="lastname" name="lastname" type="text" :value="old('lastname', $user->lastname)" required
                              autofocus autocomplete="lastname"/>
                <x-input-error :messages="$errors->get('lastname')"/>
            </div>

            <!-- FirstName -->
            <div>
                <x-input-label for="firstname" :value="__('Prénom')"/>
                <x-text-input id="firstname" name="firstname" type="text" :value="old('firstname', $user->firstname)"
                              required autofocus autocomplete="firstname"/>
                <x-input-error :messages="$errors->get('firstname')"/>
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Téléphone')"/>
                <x-text-input id="phone" name="phone" type="text" :value="old('phone', $user->phone)" autofocus
                              autocomplete="phone"/>
                <x-input-error :messages="$errors->get('phone')"/>
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required
                              autocomplete="username"/>
                <x-input-error :messages="$errors->get('email')"/>

                <!-- Email verify -->
                @if (!$user->hasVerifiedEmail())
                    <div class="flex col gap--1  mt--2">
                        <p class="text--s tag tag--danger">
                            {{ __('L\'adresse email n\'est pas vérifiée') }}
                        </p>
                    </div>
                @endif
            </div>
            <!-- Only admin can select permissions -->
            @if(Auth::user()->role->name === 'admin')
                <div class="flex col gap--1">
                    <x-input-label for="role" :value="__('Permissions')"/>
                    <x-select-input id="role" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" @if($role->name === $user->role->name)
                                {{ 'selected' }}
                                @endif>{{ $role->title }}</option>
                        @endforeach
                    </x-select-input>
                    <x-input-error :messages="$errors->get('role')"/>
                </div>
            @endif
            <div class="flex row gap--2">
                <x-primary-button>{{ __('Modifier') }}</x-primary-button>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>
            </div>
        </div>
    </form>
</x-modal>
