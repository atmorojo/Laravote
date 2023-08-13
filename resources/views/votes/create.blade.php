<form 
    hx-post="/votes"
    hx-target="main"
    autocomplete="off">
    @csrf
    <input type="submit" value="Submit" />
    <div class="candidate-list" >
        @include('votes.candidate-card')
    </div> <!-- end of candidate-list -->
</form>
