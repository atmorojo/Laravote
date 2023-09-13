<div class="login-screen">
    <form
        _="
        on alertPopper
        set my.style.background-color to '#f3616d'
        put event.detail.alertHeader into #alert-heading's innerHTML
        put event.detail.alertMessage into #alert-message's innerHTML
        show #alert
        "
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
