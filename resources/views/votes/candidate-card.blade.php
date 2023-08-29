@foreach ($candidates as $candidate)
    <div class="col-6 col-md-3">
        <input
            _="on click call vote(me, the next .card)"
            class="candidate-card__checkbox visually-hidden"
            type="checkbox"
            name="candidates[]"
            id="{{ $candidate->ref }}"
            value="{{ $candidate->ref }}" />
            <label
                for="{{ $candidate->ref }}">
                <div class="card">
                    <div class="card-content">
                        <img
                            class="card-img-top img-fluid"
                            src="{{ asset('/img/' . $candidate->id . '.jpg') }}"
                            alt="Card image cap"
                            />
                            <div class="card-body">
                                <h4 class="card-title">{{ $candidate->name }}</h4>
                                <p class="card-text">{{ $candidate->ref }}</p>
                                <div class="d-grid">
                                    <button class="btn btn-outline-success block">
                                        Biodata
                                    </button>
                                </div>
                            </div>
                    </div>
                </div>
            </label>
    </div>
@endforeach
