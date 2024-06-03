<form hx-boost="true" method="post" {{ $attributes }}>
    @csrf
    @method('delete')
    <button class="btn--unset" onclick="return confirm('Confirmer la suppression')">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon--primary-dark" viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M3.813 10.176a2 2 0 0 0 1.523.703h5.556a2 2 0 0 0 2-2V5.12a2 2 0 0 0-2-2H5.336a2 2 0 0 0-1.523.704l-1.6 1.88a2 2 0 0 0 0 2.593zm2.584-4.989l3.584 3.584M9.98 5.187L6.398 8.771"/></svg>
    </button>
</form>
