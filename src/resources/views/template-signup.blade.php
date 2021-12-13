{{--
  Template Name: 회원가입
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container py-[100px] max-w-[1000px]">
    @if (empty(defined('REGISTERED_A_USER')) && !is_user_logged_in())
      <div class="grid grid-cols-[auto,1fr] items-center mb-[30px]">
        <h2 class="text-[30px] font-bold">로그인 정보 입력</h2>
        <div class="justify-self-end flex gap-x-[20px] items-center">
          <span>이미 개인정보를 입력한 이력이 있을 경우 로그인 해주세요.</span>
          <a href="/login" class="btn-lochmara">로그인</a>
        </div>
      </div>
    @endif
    <div class="message">
      @if (defined('REGISTRATION_ERROR'))
        @foreach (unserialize(REGISTRATION_ERROR) as $error)
          <div class="text-center py-[16px] rounded-[4px] bg-[#FA375C] text-white mb-[30px]">
            <div class="error text-xl font-bold">{!! $error !!}</div>
          </div>
        @endforeach
      @elseif(defined('REGISTERED_A_USER'))
        <div class="text-center py-[16px] rounded-[4px] bg-[#0CA1F7] text-white mb-[30px]">
          <span class="hidden">{!! REGISTERED_A_USER !!}</span>환영합니다 회원가입이 완료되었습니다.<br/>
          <span>3초뒤에 이동합니다</span>
        </div>
        <script>
          setTimeout(function () {
            window.location.href = '/create-report';
          }, 3000);
        </script>
      @endif
    </div>
    @if (is_user_logged_in())
      <div class="text-center py-[16px] rounded-[4px] bg-[#0CA1F7] text-white mb-[30px]">
        <div>로그인이 확인되었습니다.</div>
        <span>3초뒤에 이동합니다</span>
      </div>
      <script>
        setTimeout(function () {
          window.location.href = '/create-report';
        }, 3000);
      </script>
    @elseif (!defined('REGISTERED_A_USER'))
      <div id="form">
        <vue-form action="{!! add_query_arg('do', 'register', home_url('/signup')) !!}" />
      </div>
    @endif
  </div>
@endsection
