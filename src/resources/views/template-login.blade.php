{{--
  Template Name: 로그인
--}}

@extends('layouts.app')

@section('content')
  <div class="h-full grid grid-rows-[auto,1fr]">
    @include('partials.page-header')
    <div class="container grid place-content-center py-[60px] lg:py-[100px]">
      <div class="max-w-[480px]">
        @if (is_user_logged_in())
          <div class="text-center p-[16px] rounded-[4px] bg-[#0CA1F7] text-white mb-[16px] max-w-[200px] w-full">
            <div class="text-xl font-bold">
              로그인 성공
            </div>
            <div class="text-sm">
              로그인이 완료되었습니다.
            </div>
          </div>
          @if (current_user_can('moderate_comments'))
            <a href="/wp-admin" class="w-full max-w-[200px] btn rounded-[4px] font-normal">
              관리자 화면으로 이동
            </a>
          @endif
        @else
          <p>
            사이버 감사실을 통해 제보하신 내용과 답변을 확인하실 수 있습니다.<br/>
            제보시 입력하신 아이디와 비밀번호를 입력해주세요.
          </p>
          <div class="h-px w-full bg-black mt-[33px] mb-[30px]"></div>
        @endif
        <div class="mb-[30px]">
          @if (($login = (isset($_GET['login']) ) ? $_GET['login'] : 0) === "failed")
            <div class="text-center p-[16px] rounded-[4px] bg-[#FA375C] text-white max-w-[200px] w-full">
              <div class="text-xl font-bold">
                로그인 실패
              </div>
              <div class="text-sm">
                로그인이 실패되었습니다.
              </div>
            </div>
          @elseif($login === "false")
            <div class="text-center p-[16px] rounded-[4px] bg-[#0CA1F7] text-white max-w-[200px] w-full">
              <div class="text-xl font-bold">
                로그아웃 성공
              </div>
              <div class="text-sm">
                로그아웃이 완료되었습니다.
              </div>
            </div>
          @elseif($login === "empty")
            <div class="text-center p-[16px] rounded-[4px] bg-[#FFC73C] text-white max-w-[200px] w-full">
              <div class="text-xl font-bold">
                사용자 이름 및 / 또는 암호가 비어 있습니다
              </div>
              <div class="text-sm">
                이름 및 암호를 채워주세요
              </div>
            </div>
          @endif
        </div>
        <div class="grid">
          @if (!is_user_logged_in())
            <form name="loginform" id="loginform" action="/wp-login.php" method="post" class="order-1">
              <div class="grid grid-cols-[1fr,auto] grid-rows-2 gap-x-[9px] gap-y-[3px] mb-[16px]">
                <div class="login-username order-1">
                  <input class="w-full border border-[#9b9b9b] p-[12px]" type="text" name="log" id="user" class="input" size="20" placeholder="아이디">
                </div>
                <div class="login-password order-3">
                  <input class="w-full border border-[#9b9b9b] p-[12px]" type="password" name="pwd" id="pass" class="input" size="20" placeholder="비밀번호">
                </div>
                <div class="login-submit row-span-2 order-2">
                  <button class="h-full w-[100px] bg-[#1a73c4] text-white font-bold" type="submit" name="wp-submit" id="wp-submit">
                    로그인
                  </button>
                  @if (isset($_GET['to']))
                    <input type="hidden" name="redirect_to" value="{!! $_GET['to'] !!}">
                  @else
                    <input type="hidden" name="redirect_to" value="/login/">
                  @endif
                </div>
              </div>
            </form>
            <div class="prose text-[14px] mt-[50px] text-[color:#a7a7a7] order-3">
              <ul>
                <li>
                  아이디 또는 비밀번호를 잊어버린 경우 로그인하실 수 없습니다.
                </li>
                <li>
                  제보하기 페이지로 가셔서 다시 제보 내용을 입력해주세요.
                </li>
              </ul>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
