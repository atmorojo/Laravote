@foreach ($candidates as $candidate)
    <div class="candidate-card">
        <input
            _="on click call vote(me, the next <label/>)"
            class="candidate-card__checkbox"
            type="checkbox"
            name="candidates[]"
            id="{{ $candidate->ref }}"
            value="{{ $candidate->ref }}"/>
            <label
                class="candidate-card__label"
                for="{{ $candidate->ref }}">
                <div class="rounder">
                    <img class="candidate-card__img" src="{{ asset('/img/' . $candidate->ref . '.jpg') }}"/>
                </div>
                <p class="candidate-card__ref">{{ $candidate->ref }}</p>
                <p class="candidate-card__name">{{ $candidate->name }}</p>
            </label>
    </div>
@endforeach
