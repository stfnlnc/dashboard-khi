<x-app-layout>
    @section('title', 'Mon profil')
    <x-slot name="header">
        @yield('title')
        <p class="tag tag--primary-dark mt--1">{{ Auth::user()->email }}</p>
    </x-slot>

    @php
        $date = new IntlDateFormatter('fr_FR',
    IntlDateFormatter::MEDIUM,
    IntlDateFormatter::SHORT,
    'Europe/Paris');
    @endphp

    <div class="container pt--8 pb--8 flex col gap--4">
        <div class="flex row col-mobile gap--4 w--fit-content">
            <card>
                <p class="tag tag--info">
                    {{ Auth::user()->role->title }}
                </p>
               <h4>{{ Auth::user()->lastname }} {{ Auth::user()->firstname }}</h4>
                <p class="text--s mt--2">
                    {{ Auth::user()->email }}
                </p>
                <p class="text--s">
                    {{ Auth::user()->phone }}
                </p>
                <a class="btn btn--dark mt--4" href="{{ route('profile.edit') }}">Modifier</a>
                <p class="text--s mt--4">
                    Créé le {{ $date->format(Auth::user()->created_at) }}
                </p>
                <p class="text--s">
                    Dernière modification le {{ $date->format(Auth::user()->updated_at) }}
                </p>
            </card>
    </div>
</x-app-layout>
