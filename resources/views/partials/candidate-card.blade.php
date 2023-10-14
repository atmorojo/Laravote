@foreach ($candidates as $candidate)
    <div class="col-6 col-md-2">
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
                    <!--span class="card-text text-center d-block">
                        {{ $candidate->ref }}
                        </span-->
                        <div style="aspect-ratio: 1; overflow: hidden;">
                        <img
                            class="card-img-top img-fluid"
                            src="{{ asset('/img/' . $candidate->no_urut . '.jpg') }}"
                            alt="Card image cap"
                            />
                        </div>
                            <div class="card-body">

                                <h4 class="text-muted fs-6">
                                    No. Urut: {{ $candidate->no_urut }}
                                </h4>
                                <h4 class="card-title fs-6" style="overflow-wrap:anywhere;">
                                    {{ $candidate->name }}
                                </h4>
                                <div class="d-grid">
                                    <!--button 
                                        type="button"
                                        class="btn btn-outline-success block">
                                        Biodata
                                    </button-->
                                </div>
                            </div>
                    </div>
                </div>
            </label>
    </div>
@endforeach
