<div
    id="alert-popup"
    class="alert {{ $alert_type }} fixed-top m-3"
    >
    <h4
        id="alert-heading"
        class="alert-heading">
        <i class="bi bi-exclamation-triangle"></i>
        {{ $alert_header }}
    </h4>
    <p id="alert-message"> {{ $alert_message }} </p>
</div>
