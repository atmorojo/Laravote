<div
    hx-swap-oob="true"
    id="alert-popup"
    class='alert fixed-top m-3 {{ $alert_type }}'
    >
    <h4
        id="alert-heading"
        class="alert-heading">
        <i class="bi bi-exclamation-triangle"></i>
        {{ $alert_header }}
    </h4>
    <p id="alert-message"> {{ $alert_message }} </p>
</div>
