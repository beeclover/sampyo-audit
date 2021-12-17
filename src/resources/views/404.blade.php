@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container py-[100px] max-w-[1000px]">
    @if (! have_posts())
      <div class="mb-[28px]">
        <img src="{!! get_theme_file_uri('resources/assets/images/not-found.jpg') !!}" alt="" class="max-w-[90%] sm:max-w-[600px] mx-auto">
      </div>
      <div class="grid justify-center">
        <div class="text-[32px] mb-[48px] font-bold">
          자세히 살펴보았지만,<br/>
          요청하신 페이지를 찾을 수 없습니다.
        </div>
        <div class="text-davyGrey text-[20px] mb-[60px]">
          이용에 불편을 드려 죄송합니다.<br/>
          페이지가 존재하지 않거나, 사용할 수 없는 페이지입니다.<br/>
          입력하신 주소가 정확한지 다시 한 번 확인해 주세요.
        </div>
      </div>
      <div class="flex flex-wrap gap-[24px] justify-center">
        <a href="javascript:history.back();" class="btn w-[300px] py-[16px] font-normal text-[20px] rounded-[4px]">이전 페이지</class=>
        <a href="/" class="btn w-[300px] py-[16px] font-normal text-[20px] rounded-[4px]">홈페이지</a>
      </div>
    @endif
  </div>
@endsection
