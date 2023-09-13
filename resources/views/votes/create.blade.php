<form 
    _="
        on alertPopper
          add .alert-success to #alert-popup
          put event.detail.alertHeader at the end of #alert-heading
          put event.detail.alertMessage into #alert-message
          show #alert
          wait 10s
          go to url /
    "
    hx-post="/votes"
    hx-target="main"
    autocomplete="off">
    @csrf
    <div class="container pt-4 pb-5">
        <div class="row">
            @include('votes.candidate-card')
        </div>
    </div> <!-- end of candidate-list -->
    <div
        class="fixed-bottom p-4 bg-white shadow-lg rounded-top">
        <div class="d-grid">
            <input class="btn btn-primary fw-bold" type="submit" value="Simpan pilihan" />
        </div>
    </div>
</form>
