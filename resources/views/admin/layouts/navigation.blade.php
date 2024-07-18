@php
    $route = request()->route()->getName()
@endphp

@section('menu')
    <div class="flex row col-mobile align--center gap--8">
        <!-- Navigation Links -->
        <div class="flex row align--center col-mobile align-mobile--start gap--4" hx-boost="true" hx-trigger="delay:1000ms">
            <x-nav-link :href="route('dashboard')" :active="str_contains($route, 'dashboard')">
                {{ __('Tableau de bord') }}
            </x-nav-link>
            @if(Auth::user()->role->name === 'admin')
            <div class="nav__dropdown">
                <x-nav-link :href="route('users.index')" :active="str_contains($route, 'users.')">
                    {{ __('Utilisateurs') }}
                </x-nav-link>
                <div class="nav__dropdown__item">
                    <x-nav-link :href="route('users.index')">
                        {{ __('Gestion des utilisateurs') }}
                    </x-nav-link>
                    <x-nav-link href="#" x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-user')">
                        {{ __('Ajouter un utilisateur') }}
                    </x-nav-link>
                </div>
            </div>
            @endif
        </div>
    </div>

@endsection

<nav class="flex row justify--center border--bottom border--stroke-light">
    <!-- Primary Navigation Menu -->
    <div class="container pt--4 pb--4">
        <div class="flex row align--center justify--space-between w--100">
            <div class="flex row gap--8 hide-mobile w--100">
                <x-application-logo></x-application-logo>
                @yield('menu')
            </div>
            <div class="display-mobile">
                <span class="mobile__menu">
                    <span class="line-1"></span>
                    <span class="line-2"></span>
                    <span class="line-3"></span>
                </span>
                <div class="mobile__dropdown p--5 flex col align--start gap--8 color--primary-light">
                    <span class="mobile__close align--self-end">
                        <span class="line-1"></span>
                        <span class="line-2"></span>
                        <span class="line-3"></span>
                    </span>
                    @yield('menu')
                </div>
            </div>
            <div class="flex row align--center gap--4" hx-boost="true">
                <x-profile href="{{ route('profile') }}"></x-profile>
                @if(Auth::user()->role->name === 'admin')
                <x-parameters href=""></x-parameters>
                @endif
                <x-logout></x-logout>
            </div>
        </div>
    </div>
</nav>
