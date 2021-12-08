@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center relative min-h-screen">
  <div class="container max-w-[calc(960px+2rem)] relative z-10">
    <h1 class="text-white font-black text-[50px] text-center mb-[80px]">삼표는 투명하고 정직한 회사,<br/>고객에게는 사랑받는 기업이 되겠습니다</h1>
    <div class="grid grid-cols-3 gap-x-[30px] h-[300px]">
      @for ($i = 0; $i < 3; $i++)
        <a href="#" class="rounded-[4px] bg-[#ebebeb] hover:bg-[#0086ce] bg-opacity-[0.9] grid place-content-center text-black hover:text-white">
          <div class="flex flex-col items-center">
            <div class="w-[60px] mb-[44px]">
              <svg class="w-full h-auto" id="Layer_1" fill="currentColor" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m426.564 11.373h-341.128a85.538 85.538 0 0 0 -85.436 85.446v196.881a85.538 85.538 0 0 0 85.436 85.446h11.531v111.863a9.617 9.617 0 0 0 16.449 6.77l117.576-118.636h195.572a85.538 85.538 0 0 0 85.436-85.443v-196.881a85.538 85.538 0 0 0 -85.436-85.446zm66.2 282.324a66.28 66.28 0 0 1 -66.2 66.21h-199.581a9.619 9.619 0 0 0 -6.831 2.848l-103.952 104.886v-98.116a9.618 9.618 0 0 0 -9.618-9.618h-21.146a66.28 66.28 0 0 1 -66.2-66.21v-196.878a66.28 66.28 0 0 1 66.2-66.21h341.128a66.28 66.28 0 0 1 66.2 66.21z"/><path d="m155.315 173.566a34.04 34.04 0 1 0 34.041 34.04 34.078 34.078 0 0 0 -34.041-34.04zm0 48.845a14.8 14.8 0 1 1 14.806-14.805 14.822 14.822 0 0 1 -14.806 14.805z"/><path d="m255.84 173.566a34.04 34.04 0 1 0 34.041 34.04 34.078 34.078 0 0 0 -34.041-34.04zm0 48.845a14.8 14.8 0 1 1 14.8-14.805 14.822 14.822 0 0 1 -14.8 14.805z"/><path d="m356.365 173.566a34.04 34.04 0 1 0 34.041 34.04 34.078 34.078 0 0 0 -34.041-34.04zm0 48.845a14.8 14.8 0 1 1 14.805-14.805 14.822 14.822 0 0 1 -14.805 14.805z"/></svg>
            </div>
            <span class="text-[28px] font-bold">제보하기</span>
          </div>
        </a>
      @endfor
    </div>
  </div>
  @include('partials.img', [
    'ex' => 'jpg', 'name' => 'main', 
    'class' => 'w-full h-full absolute top-0 left-0 bottom-0 right-0 object-cover',
  ])
</div>

@endsection