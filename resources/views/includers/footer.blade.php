{{-- <div class="p-2 bg-secondary fixed-bottom">
    <div class="container">
        <span class="btn btn-secondary">&copy;{!! date("Y") !!} All Rights Reserve</span>
        <span><a href="{{ route('pages.about') }}" class=" btn btn-secondary btn-sm">About</a></span>
    </div>
</div> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<script>
    $(document).ready(function(){
        $("#phNumber").hide();
        $("#addrForm").hide();
        $("#Numbs").click(function(e){
            e.preventDefault();
            $("#phNumber").toggle();
        });
        $("#addr").click(function(e){
            e.preventDefault();
            $("#addrForm").toggle();
        });
    });
</script>
