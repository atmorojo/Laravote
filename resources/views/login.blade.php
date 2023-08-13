<x-base>
    <div class="login-screen">
        <form
            hx-post="/login"
            hx-target="main"
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

<div
    _="on click hide"
    style="display: none;"
    hx-swap-oob="true"
    id="modal">
    <div id="modal-card">
        <p id="modal-message"></p>
        <small>Klik di mana saja untuk keluar</small>
    </div>
</div>
