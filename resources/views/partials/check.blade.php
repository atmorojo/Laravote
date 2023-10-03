<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Log In.</h1>
                <p class="auth-subtitle mb-5">
                    Masukkan nomor baku pemilih yang telah anda dapatkan dari panitia
                </p>

                <div
                    hx-get="/check"
                    hx-trigger="every 3s"
                    hx-target="main"
                    autocomplete="off"
                    class="login-card">
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right"></div>
        </div>
    </div>
</div>
