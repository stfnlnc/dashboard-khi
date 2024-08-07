<x-app-layout>
    @section('title', 'Les utilisateurs')
    <x-slot name="header">
        @yield('title')
        <x-secondary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-user')" class="btn btn--small btn--primary-dark mt--1">+ Ajouter un utilisateur</x-secondary-button>
    </x-slot>

    <section class="container flex col gap--12-mobile">
        <div class="flex row col-mobile gap--4 align--center align-mobile--start justify--space-between mb--2">
            <div class="flex row col-mobile align--center align-mobile--start gap--2">
                <form hx-trigger="change" hx-boost="true" class="flex row align--center gap--2" method="get" action="{{ route('users.index') }}">
                    <x-select-input name="role">
                        @foreach($roles as $role)
                            <option @if(app('request')->input('role') === strval($role->id)) selected @endif value="{{ $role->id }}">{{ $role->title }}</option>
                        @endforeach
                    </x-select-input>
                </form>
                <form hx-boost="true" class="flex row align--center gap--2" method="get" action="{{ route('users.index') }}">
                    <input type="text" class="form-input" name="search" placeholder="Rechercher...">
                    <button class="btn--unset" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon--primary-dark" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10a7 7 0 1 0 14 0a7 7 0 1 0-14 0m18 11l-6-6"/></svg>
                    </button>
                    <a hx-boost="true" href="{{ route('users.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon--primary-dark" viewBox="0 0 15 15"><path fill="currentColor" fill-rule="evenodd" d="M4.854 2.146a.5.5 0 0 1 0 .708L3.707 4H9a4.5 4.5 0 1 1 0 9H5a.5.5 0 0 1 0-1h4a3.5 3.5 0 1 0 0-7H3.707l1.147 1.146a.5.5 0 1 1-.708.708l-2-2a.5.5 0 0 1 0-.708l2-2a.5.5 0 0 1 .708 0" clip-rule="evenodd"/></svg>
                    </a>
                </form>
            </div>
            <p class="tag tag--info">{{ $users->count() }} utilisateur{{ $users->count() <= 1 ? '' : 's' }} sur {{ $users->total() }}</p>
        </div>
        <table class="w--100 text--s text-left">
            <thead>
                <tr>
                    <th>
                        <p>Nom</p>
                    </th>
                    <th class="hide-mobile">
                        <p>Email</p>
                    </th>
                    <th class="hide-mobile">
                        <p>Téléphone</p>
                    </th>
                    <th class="hide-mobile">
                        <p>Statut</p>
                    </th>
                    <th>
                        <p class="flex row justify--end">Actions</p>
                    </th>
                </tr>
            </thead>
        <tbody id="search-results">
            <!-- Show all users order by role -->
            @foreach($users as $key => $user)
                <tr class="p--2 border--rounded border border--stroke-light mt--2 mb--2">
                    <td>
                        <p class="flex row align--center text--s tag tag--stroke-light">{{ $user->firstname }} {{ $user->lastname }}</p>
                    </td>
                    <td class="hide-mobile">
                        <p class="flex row align--center justify--start gap--2 text--s">
                            <x-check :check="$user->email_verified_at"></x-check>
                            {{ $user->email }}
                        </p>
                    </td>
                    <td class="hide-mobile">
                        <p class="flex row align--center gap--1 text--s">
                            {{ $user->phone }}
                        </p>
                    </td>
                    <td class="hide-mobile">
                        <p
                            class="text--s tag tag--stroke-light"
                        >
                            {{ $user->role->title }}
                        </p>
                    </td>
                    <td>
                    <div class="flex row align--center gap--2 justify--end">
                        <x-edit x-data="{{ $user }}" x-on:click.prevent="$dispatch('open-modal', 'edit-user-{{ $user->id }}')"></x-edit>
                        @if(Auth::user()->role->name === 'admin')
                        <x-delete action="{{ route('users.destroy', [$user]) }}"></x-delete>
                            @endif
                    </div>
                    </td>
                </tr>
                @include('admin.users.modals.edit-modal', ['user' => $user])
            @endforeach
        </tbody>
        </table>
        <x-paginate :data="$users"></x-paginate>
    </section>

</x-app-layout>
