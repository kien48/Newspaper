@extends('layouts.master')
@section('title',$dataCatelogue->name)
@section('content')
    <section class="section">
        <div class="py-4"></div>
        <div class="container">
            <div class="row">
                <div
                    class="col-lg-8  mb-5 mb-lg-0">
                    <h1 class="h2 mb-4">Hiển thị danh mục từ
                        <mark>{{$dataCatelogue->name}}</mark></h1>
                    @foreach($dataArticle as $item)
                        <article class="card mb-4">
                            <div class="post-slider">
                                <img src="{{\Storage::url($item->image)}}" class="card-img-top" alt="post-thumb">
                            </div>
                            <div class="card-body">
                                <h3 class="mb-3"><a class="post-title" href="{{route('detail',$item->slug)}}">{{$item->title}}</a></h3>
                                <ul class="card-meta list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{route('author.detail', $item->author->id)}}" class="card-meta-author">
                                            @if(!$item->author->avatar)
                                                <img src="https://cellphones.com.vn/sforum/wp-content/uploads/2023/10/avatar-trang-4.jpg">
                                            @else
                                                <img src="{{\Storage::url($item->author->avatar)}}">
                                            @endif
                                            <span>{{$item->author->name}}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-timer"></i>{{$item->views}} lượt xem
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="ti-calendar"></i>{{$item->created_at->format('d-m-Y')}}
                                    </li>
                                    <li class="list-inline-item">
                                        <ul class="card-meta-tag list-inline">
                                            @foreach($item->tags as $tag)
                                                <li class="list-inline-item"><a href="{{route('tag', ['id' => $tag->id, 'slug' => $tag->slug])}}">{{$tag->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                                <p>{!! \Str::limit($item->content,100) !!}...</p>
                                <a href="{{route('detail',$item->slug)}}" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>

                    @endforeach
                </div>
                @include('layouts.partials.sidebar')

            </div>
        </div>
    </section>

@endsection
