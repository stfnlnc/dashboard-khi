@extends('base')

@section('content')
    <section class="container__full-width flex col align--center">
        <div class="container flex row justify--center">
            <div class="flex row gap--2 p--5">
                @if(Auth::guest())
                    <a href="{{ route('login') }}" class="btn btn--dark">Se connecter</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn--dark">Aller au tableau de bord</a>
                @endif
            </div>

            @if(session('success'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="alert alert--success"
                >{{ session('success') }}</p>
            @endif
            @if(session('danger'))
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="alert alert--danger"
                >{{ session('danger') }}
                </p>
            @endif
        </div>
    </section>
@endsection
