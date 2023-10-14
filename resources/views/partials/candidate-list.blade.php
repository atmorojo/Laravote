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
          go to url /client
      end
    "
    id="candidate-list"
    hx-post="/votes"
    hx-target="main"
    hx-trigger="sendVote"
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
            <input
                _="
                on click
                    get <.candidate-card__checkbox:checked/>
                    if its length < $max_vote then
                        put 'Mohon pilih ' + $max_vote + ' kandidat!' into #alert-message's innerHTML
                        put 'Perhatian!' into #alert-heading's innerHTML
                        set #alert-popup's *background-color to '#ffc107'
                        show #alert
                        wait 3s
                        hide #alert
                    otherwise
                        send sendVote to #candidate-list
                    end
                    "
                class="btn btn-primary fw-bold"
                type="button"
                value="Simpan pilihan" />
        </div>
    </div>
</form>
<div _="on click hide me" class='welcome'>
    <div class='welcome__content'>
        <h2>{{ $client }}</h2>
        <h1>{{ $voter[0]['name'] }}</h1>
        <p class='text-mute'>Klik di mana saja untuk mulai memilih</p>
    </div>
</div>
