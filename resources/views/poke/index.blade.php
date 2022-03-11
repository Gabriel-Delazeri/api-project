@extends('layouts.main')

@section('title', 'Teste')

@section('content')

<style>
    
    .card{
        margin: 8px;
        background-color: rgba(235, 245, 238, .7);
    }
</style>

<!-- search disabled 
<input type="text" id="search"/> -->

<div class="row" id="pokeDiv">

@foreach($pokemons as $pokemon)
<div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top rounded mx-auto d-block" src="{{$pokemon->image_url}}" style="width:120px; " alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{$pokemon->name}}</h5>
                <p class="card-text">
                    @foreach($pokemon->attribute as $atr)
                    {{$atr}}
                    @endforeach
                </p>
            </div>
    </div>
</div>
@endforeach

</div>

<!-- <a style="text-decoration: inherit;   color: inherit; " href=""><h5 class="card-title">{{$pokemon->name}}</h5></a> -->


<script>
    
    // SEARCH FUNCTION (in progress)

    // $(document).ready(function(){
    //     $('#search').on('input', function(){
    //         var text = $(this).val().toLowerCase();
    //         $('#pokeDiv div').show();  
    //         $('#pokeDiv div:not(:contains(' + text + '))').hide();
    //     });
    // });

</script>

@endsection