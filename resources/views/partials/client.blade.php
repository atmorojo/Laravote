<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h1 class="auth-title">Log In.</h1>
                <p class="auth-subtitle mb-5">
                   Password bilik: 
                </p>

                <form
                    _="
                    on alertPopper
                    set #alert-popup's *background-color to '#f3616d'
                    put event.detail.alertHeader into #alert-heading's innerHTML
                    put event.detail.alertMessage into #alert-message's innerHTML
                    show #alert

                    set #user-id's @value to ''
                    call #user-id.focus()
                    wait 5s
                    hide #alert
                    "
                    hx-post="/client"
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
                            maxlength="8"
                            placeholder="Password bilik ini"
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
            <div id="auth-right"></div>
        </div>
    </div>
</div>
