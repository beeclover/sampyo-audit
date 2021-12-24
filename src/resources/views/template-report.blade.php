{{--
  Template Name: 제보하기
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page-header', ['bg' => $bg])
  <div class="container py-[60px] lg:py-[100px] max-w-[1000px]">
    <h2 class="text-[30px] mb-[32px] font-bold">제보내용 입력</h2>
    <div id="form">
      <vue-form></vue-form>
    </div>
  </div>
@endsection
