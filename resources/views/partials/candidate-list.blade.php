<form 
    _="
    init
        set $max_vote to {{ $settings->max_vote }}
    end

    on alertPopper
      set #alert-popup's *background-color to event.detail.alertBGColor
      put event.detail.alertHeader into #alert-heading
      put event.detail.alertMessage into #alert-message
      show #alert

      if event.detail.status == 1
          set #candidate-list's *opacity to '0.1'
          set #candidate-list's *pointer-events to 'none'
          wait 5s
          go to url /
      end
    "
    id="candidate-list"
    hx-post="/votes"
    hx-target="main"
    autocomplete="off">
    @csrf
    <div class="container pt-4 pb-5">
        <div class="row">
            @include('partials.candidate-card')
        </div>
    </div> <!-- end of candidate-list -->
    <div
        class="fixed-bottom p-4 bg-white shadow-lg rounded-top">
        <div class="d-grid">
            <input class="btn btn-primary fw-bold" type="submit" value="Simpan pilihan" />
        </div>
    </div>
</form>
