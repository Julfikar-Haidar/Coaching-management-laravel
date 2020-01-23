
@extends('admin.master')

@section('main-content')



<!--Slider Start-->
<section class="container-fluid">
    <div class="row">
        <div class="col-12 pl-0 pr-0">
            <div class="owl-carousel">
                @foreach ($slider as $slider)
                    
                <div class="item"><img src="{!! asset('admin/slider/'.$slider->slide_image) !!}" alt="">
                    <div class="slide-caption">
                    <h2>{{$slider->slide_title}}</h2>
                    <p>{{$slider->slide_description}}</p>
                </div>
                </div>
                @endforeach

                
               
            </div>
        </div>
    </div>
</section>
<!--Slider End-->

@endsection