@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  @if (get_current_user_id())
    <div class="container py-[100px] max-w-[1000px]">
      @if (! have_posts())
        <div class="mb-[28px]">
          <img src="{!! get_theme_file_uri('resources/assets/images/not-found.jpg') !!}" alt="" class="max-w-[90%] sm:max-w-[600px] mx-auto">
        </div>
        <div class="text-davyGrey text-[20px] mb-[60px] text-center">
          이용에 불편을 드려 죄송합니다.<br/>
          페이지에 포스트가 존재하지 않습니다.
        </div>
        <div class="flex flex-wrap gap-[24px] justify-center">
          <a href="/" class="btn w-[300px] py-[16px] font-normal text-[20px] rounded-[4px]">제보하러 가기</a>
        </div>
      @else
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
              <div class="justify-self-center">{{ get_field('status', get_the_ID()) }}</div>
              <div class="h-[60px]"></div>
              @php($count--)
            </div>
          @endwhile
        </div>
        <div class="page-pagination-number">
          {!! $pagination !!}
        </div>
      </div>
      @endif
  @endif
@endsection