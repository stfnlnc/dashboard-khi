<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button class="btn--unset"
            onclick="event.preventDefault();
                                            this.closest('form').submit();">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon icon--primary-dark">
            <path
                  d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h7v2H5v14h7v2zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z"/>
        </svg>
    </button>
</form>
