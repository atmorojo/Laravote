<div
    _="on click hide"
    id="modal">
    <div id="modal-card">
        <p 
            hx-get="/"
            hx-target="main"
            hx-trigger="load delay:3s" 
            id="modal-message">
            {{ $message }}
        </p>
    </div>
</div>
