{{--
  Template Name: 제보하기
--}}

@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <div class="container py-[100px] max-w-[1000px]">
    <div class="col-sm-12">
      <h2 class="text-[30px] mb-[32px] font-bold">제보내용 입력</h2>
      <div id="form">
        <vue-form></vue-form>
      </div>
    </div>
  </div>
@endsection
