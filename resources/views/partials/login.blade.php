<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Log In.</h1>
                <p class="auth-subtitle mb-5">
                    Masukkan nomor baku pemilih yang telah anda dapatkan dari panitia
                </p>

                <form
                    _="
                    def reset()
                    set #user-id's value to ''
                    call #user-id.focus()
                    end

                    on voterFound
                    send userConfirmed(message: event.detail) to #auth-right
                    call reset()
                    end

                    on alertPopper
                    set #alert-popup's *background-color to '#f3616d'
                    put event.detail.alertHeader into #alert-heading's innerHTML
                    put event.detail.alertMessage into #alert-message's innerHTML
                    call reset()
                    show #alert
                    wait 5s
                    hide #alert
                    end
                    "
                    hx-post="/login"
                    hx-target="main"
                    autocomplete="off"
                    class="login-card">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input
                            id="user-id"
                            type="text"
                            class="form-control form-control-xl"
                            name="ref"
                            placeholder="Nomor Baku Pemilih"
                            />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <input type="submit" value="Log In" class="btn btn-primary btn-block btn-lg shadow-lg mt-2">
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div 
                _="on userConfirmed(message)
                put message.voter into #voter
                put message.client into #client
                put 'silakan menuju ke' into #pesan
                wait 5s
                put '' into #voter
                put '' into #client
                put '' into #pesan
                "
                id="auth-right">
                <div
                class="auth-title text-white fw-bold p-5"
                style="
                font-size: 5em;
                height: 100%;
                width: 100%;
                backdrop-filter: brightness(70%) blur(5px);">
                <p id="voter"></p>
                <p id="pesan" class="fs-1"></p>
                <p id="client"></p>
                </div>
            </div>
        </div>
    </div>
</div>
