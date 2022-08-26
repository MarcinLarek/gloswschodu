@extends('layouts.navbar.'.$section)
@section('mainpage')

<div class="row">
    <div class="col-xl-9 col-l-9 col-md-12 col-sm-12">
        @foreach($main as $post)
        <div class="row">
            <div class="col-xl-2 col-l-2 col-md-12 col-sm-12" style="font-size: 10px;">
                {{$post->created_at}}
                {{$post->author}}
            </div>
            <div class="col-xl-10 col-l-10 col-md-12 col-sm-12 text-primary">
                <a href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}">
                    <h5><b>{{$post->title}}</b></h5>
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-2 col-l-2 col-md-12 col-sm-12">

                <div class="mb-2 col-3 fiveobjectlist d-flex" style="width: 150px;background-image: url('/storage/{{ $post->image }}')">
                    <a class="ms-2 me-2 w-100 h-100" href="{{ route('post.show', ['post' => $post, 'section' => $post->getsection()]) }}"></a>
                </div>
            </div>
            <div class="col-xl-10 col-l-10 col-md-12 col-sm-12">
                <h5>{{strip_tags(substr($post->postcontent, 0, 200))}}...</h5>
            </div>
        </div>
        <div class="row pb-5">
            <div class="col-12 text-center">
                Polub Plportal.pl: <div class="fb-like" data-href="https://www.facebook.com/plportalpl/" data-width="" data-layout="button" data-action="like" data-size="large"></div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-xl-3 col-l-3 col-md-12 col-sm-12 ">
        <div class="row mb-2 rightheader border-top border-bottom border-dark text-center">
            <div class="col-12">
                INNE WIADOMOŚĆI
            </div>
        </div>
        @foreach($posts as $list)
        @break($loop->iteration == 6)
        <div class="row">

            <div class="mb-2 col-3 minisquare d-flex" style="background-image: url('/storage/{{ $list->image }}')"><a class="w-100" href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
                </a></div>

            <div class="col-9">
                <div class="">
                    <a href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
                        <b class="text-primary" style="font-size:12px;"> {{$list->title}}</b>
                    </a>
                </div>
                <div class="" style="font-size:12px;">
                    {{strip_tags(substr($list->postcontent, 0, 50))}}...
                </div>
            </div>
        </div>
        @endforeach
        <div class="row mb-2 rightheader border-top border-bottom border-dark text-center">
            <div class="col-12">
                NAJCZĘŚCIEJ CZYTANE
            </div>
        </div>
        @foreach($topposts as $list)
        <div class="col-12">
            <a href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
                <b class="text-dark"> {{$list->title}}</b>
            </a>
            <hr>
        </div>
        @endforeach
        <div class="row mb-2 rightheader border-top border-bottom border-dark text-center">
            <div class="col-12">
                Z INNYCH DZIAŁÓW
            </div>
        </div>
        @foreach($posts as $list)
        @continue($loop->iteration < 6) <div class="row">

            <div class="mb-2 col-4 minisquare d-flex" style="background-image: url('/storage/{{ $list->image }}')"><a class="w-100" href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
                </a></div>

            <div class="col-8">
                <div class="">
                    <a href="{{ route('post.show', ['post' => $list, 'section' => $list->getsection()]) }}">
                        <b class="text-primary"> {{$list->title}}</b>
                    </a>
                </div>
            </div>
    </div>
    @endforeach

</div>
</div>

<div class="row">
    <div class="col-12 d-flex justify-content-center">
      {{ $main->links() }}
    </div>
</div>

@endsection
