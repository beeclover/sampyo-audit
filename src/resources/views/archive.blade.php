@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container py-[100px] max-w-[1000px]">
    <div class="grid grid-cols-[80px,1fr,140px,140px] h-[60px] items-center border-t border-b border-mineShaft-500 text-center">
      <div>No</div>
      <div>제목</div>
      <div>작성일</div>
      <div>답변여부</div>
    </div>
    <div class="border-b border-mineShaft-500 mb-[60px]">
      @while(have_posts()) @php(the_post())
        <div class="grid grid-cols-[80px,1fr,140px,140px,auto] items-center border-b border-mineShaft-100 last:border-none">
          <div class="justify-self-center">{!! $count !!}</div>
          <div>
            <a href="{{ get_permalink() }}">{{ get_the_title() }}</a>
          </div>
          <div class="justify-self-center">{{ get_the_date('Y.m.d') }}</div>
          <div class="justify-self-center">{{ get_post_status() }}</div>
          <div class="h-[60px]"></div>
          @php($count--)
        </div>
      @endwhile
    </div>
    <div class="page-pagination-number">
      {!! $pagination !!}
    </div>
  </div>
@endsection