 
    @extends('components.template')

    <?php 

    function GetTextLimit($text){
        if (strlen($text) > 50) {
            return substr($text, 0, 50) . '...';
        }
        return $text;
    }
    
    ?>

    @section('rawtemp')
    
    <div class="container">
        <div class="row py-5">
            @foreach ($newsData as $news)
            <div class="col-3">
                <div class="card" style="width: 18rem;">
                    @if($news->image)
                    <img src="{{url($news->image)}}"  class="card-img-top object-fit-cover" style="height: 200px;" alt="">
                @endif
                    <div class="card-body">
                      <h5 class="card-title">{{$news->title}}</h5>
                      <p class="card-text">{{GetTextLimit($news->summary)}}</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
    @endsection