<x-base>
    <form 
        hx-post="/votes"
        hx-swap="outerHTML"
        autocomplete="off">
        @csrf
        <input type="submit" value="Submit" />
        <div class="candidate-list" >
            @include('votes.candidate-card')
        </div> <!-- end of candidate-list -->
    </form>
    <div
        _="on load hide"
        id="modal">

    </div>
</x-base>
