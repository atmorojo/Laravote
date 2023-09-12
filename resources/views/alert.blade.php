<div
    _="
    on htmx:afterRequest
        log detail
        log it
        show me
    on click hide
    "
    style="display: none;"
    id="alert">
    <div
        hx-swap-oob="true"
        id="alert-popup"
        class='alert fixed-top m-3'
        >
        <h4
            id="alert-heading"
            class="alert-heading">
            <i class="bi bi-exclamation-triangle"></i>
        </h4>
        <p id="alert-message"></p>
    </div>
</div>
