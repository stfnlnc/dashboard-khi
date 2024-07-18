<x-app-layout>
    @section('title', 'Mon profil')
    <x-slot name="header">
        @yield('title')
    </x-slot>

    @php
        $date = new IntlDateFormatter('fr_FR',
    IntlDateFormatter::MEDIUM,
    IntlDateFormatter::SHORT,
    'Europe/Paris');
    @endphp

    <div class="container pt--8 pb--8 flex col gap--4">
        <div class="flex row col-mobile gap--4 w--fit-content">
            <card class="flex col gap--2">
                <div class="avatar mb--2 box-shadow">
                    {{ substr(Auth::user()->firstname, 0, 1) }}{{ substr(Auth::user()->lastname, 0, 1) }}
                </div>
                <p class="tag tag--stroke-light">
                    {{ Auth::user()->role->title }}
                </p>
               <h5>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5>
                <div class="flex row col-mobile gap--2">
                    <p class="tag tag--primary-dark">
                        {{ Auth::user()->email }}
                    </p>
                    <p class="tag tag--primary-dark">
                        {{ Auth::user()->phone }}
                    </p>
                </div>
                <x-secondary-button x-data="{{ Auth::user() }}" x-on:click.prevent="$dispatch('open-modal', 'edit-profile')" class="btn btn--dark mt--4" href="#">Modifier</x-secondary-button>
                <p class="text--xs">
                    Dernière modification le {{ $date->format(Auth::user()->updated_at) }}
                </p>
            </card>
        </div>
    </div>
    @include('profile.modals.edit-modal')
</x-app-layout>
