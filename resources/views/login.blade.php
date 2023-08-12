<x-base>
    <div class="login-screen">
        <form
            hx-post="/login"
            hx-target="body"
            autocomplete="off"
            class="login-card">
            @csrf
            <p class="login-card__info">Masukkan Nomor Baku anda...</p>
            <div class="login-card__input-wrapper">
                <input
                    name="ref"
                    class="login-card__input"
                    maxlength="8"
                    type="tel" />
            </div>
            <input
                class="login-card__submit"
                type="submit"
                value="Log in"/>
        </form>
    </div>
</x-base>
