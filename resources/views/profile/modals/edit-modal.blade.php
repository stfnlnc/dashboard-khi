<x-modal name="edit-profile" focusable>

    <x-slot name="header">

        <p class="tag tag--primary-dark mt--1">{{ Auth::user()->email }}</p>
    </x-slot>

    <div class="flex col gap--4">
        <div class="flex row col-mobile gap--4 w--fit-content">
            <card>
                @include('profile.partials.update-profile-information-form')
            </card>
            <card>
                @include('profile.partials.update-password-form')
            </card>
        </div>
        <card>
            @include('profile.partials.delete-user-form')
        </card>
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Annuler') }}
        </x-secondary-button>
    </div>
</x-modal>
