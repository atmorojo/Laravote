@for ($i = 0; $i < 30; $i++)
    <div class="candidate-card">
        <input
            _="on click call vote(me, the next <label/>)"
            class="candidate-card__checkbox"
            type="checkbox"
            name="candidates"
            id="candidate-{{ $i }}"
            value="candidate-{{ $i }}"/>
        <label
            class="candidate-card__label"
            for="candidate-{{ $i }}">
            <p class="candidate-card__img">Y</p>
            <p class="candidate-card__name">Candidate Name</p>
        </label>
    </div>
@endfor

