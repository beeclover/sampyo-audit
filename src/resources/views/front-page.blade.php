@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center relative min-h-screen pt-[var(--h-main)] lg:pt-0">
  <div class="container max-w-[calc(960px+2rem)] relative z-10 py-[var(--h-main)] lg:pt-0">
    <h1 class="text-white font-black text-[25px] lg:text-[50px] text-center mb-[40px] lg:mb-[80px]">삼표는 투명하고 정직한 회사,<br/>고객에게는 사랑받는 기업이 되겠습니다</h1>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-[16px] gap-x-[30px] lg:h-[300px]">
      <a href="{!! get_the_permalink(26) !!}" class="rounded-[4px] bg-[#ebebeb] hover:bg-[#0086ce] bg-opacity-[0.9] grid lg:place-content-center text-black hover:text-white transition-all">
        <div class="flex p-[20px] h-[100px] lg:h-auto lg:p-0 lg:flex-col justify-between items-center w-full lg:w-auto">
          <div class="w-[60px] h-[60px] lg:mb-[44px]">
            <svg class="w-full h-auto fill-current stroke-current" width="60" height="54" viewBox="0 0 60 54"> <defs> <style> .cls-1,.cls-2{fill:none;stroke-linejoin:round;stroke-width:2px}.cls-1{stroke-linecap:round} </style> </defs> <g id="그룹_5536" data-name="그룹 5536" transform="translate(-1128 -4329)"> <g id="그룹_5535" data-name="그룹 5535"> <g id="그룹_5534" data-name="그룹 5534"> <g id="그룹_5533" data-name="그룹 5533"> <path id="패스_3177" data-name="패스 3177" class="cls-1" d="M1129 4370v-33.972a6.027 6.027 0 0 1 6.027-6.028h45.946a6.029 6.029 0 0 1 6.027 6.028v27.945a6.028 6.028 0 0 1-6.027 6.027H1139"/> </g> <path id="패스_3178" data-name="패스 3178" class="cls-1" d="m1139 4370-10 12v-12"/> </g> </g> <path id="사각형_1685" data-name="사각형 1685" class="cls-2" transform="translate(1147 4342)" d="M0 0h8v10H0z"/> <path id="패스_3179" data-name="패스 3179" class="cls-1" d="M1150 4358s5-.25 5-6"/> <path id="사각형_1686" data-name="사각형 1686" class="cls-2" transform="translate(1162 4342)" d="M0 0h8v10H0z"/> <path id="패스_3180" data-name="패스 3180" class="cls-1" d="M1165 4358s5-.25 5-6"/> </g> </svg>
          </div>
          <span class="text-[28px] font-bold">제보하기</span>
        </div>
      </a>
      <a href="{!! get_post_type_archive_link('report') !!}" class="rounded-[4px] bg-[#ebebeb] hover:bg-[#0086ce] bg-opacity-[0.9] grid lg:place-content-center text-black hover:text-white transition-all">
        <div class="flex p-[20px] h-[100px] lg:h-auto lg:p-0 lg:flex-col justify-between items-center w-full lg:w-auto">
          <div class="w-[60px] h-[60px] lg:mb-[44px]">
            <svg class="w-full h-auto fill-current stroke-current" width="60.828" height="60.828" viewBox="0 0 60.828 60.828"> <defs> <style> .cls-1{fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px} </style> </defs> <g id="그룹_5538" data-name="그룹 5538" transform="translate(-1584.586 -1911.586)"> <g id="그룹_5537" data-name="그룹 5537"> <path id="선_28" data-name="선 28" class="cls-1" transform="translate(1606.733 1928.422)" d="M21.91 21.91 0 0"/> <path id="선_29" data-name="선 29" class="cls-1" transform="translate(1618.822 1916.332)" d="m0 0 21.911 21.91"/> </g> <path id="선_30" data-name="선 30" class="cls-1" transform="translate(1586 1939.791)" d="M0 31.209 31.208 0"/> <path id="선_31" data-name="선 31" class="cls-1" transform="translate(1603 1913)" d="M0 18 18 0"/> <path id="선_32" data-name="선 32" class="cls-1" transform="translate(1626 1936)" d="M0 18 18 0"/> <path id="선_33" data-name="선 33" class="cls-1" transform="translate(1624.667 1971)" d="M0 0h19.333"/> </g> </svg>
          </div>
          <span class="text-[28px] font-bold">처리결과 확인</span>
        </div>
      </a>
      <a href="{!! get_the_permalink(215) !!}" class="rounded-[4px] bg-[#ebebeb] hover:bg-[#0086ce] bg-opacity-[0.9] grid lg:place-content-center text-black hover:text-white transition-all">
        <div class="flex p-[20px] h-[100px] lg:h-auto lg:p-0 lg:flex-col justify-between items-center w-full lg:w-auto">
          <div class="h-[60px] w-[60px] lg:mb-[44px] flex items-center justify-center">
            <svg class="w-auto h-full fill-current stroke-current" width="48.391" height="60" viewBox="0 0 48.391 60"> <defs> <style> .cls-1{fill:none;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px} </style> </defs> <g id="그룹_5549" data-name="그룹 5549" transform="translate(-1701 -3229)"> <g id="그룹_5539" data-name="그룹 5539"> <circle id="타원_1" data-name="타원 1" class="cls-1" cx="1" cy="1" r="1" transform="translate(1709.948 3247)"/> </g> <g id="그룹_5540" data-name="그룹 5540"> <circle id="타원_2" data-name="타원 2" class="cls-1" cx="1" cy="1" r="1" transform="translate(1709.948 3257)"/> </g> <path id="선_34" data-name="선 34" class="cls-1" transform="translate(1718.948 3248)" d="M17 0H0"/> <path id="선_35" data-name="선 35" class="cls-1" transform="translate(1718.948 3258)" d="M17 0H0"/> <g id="그룹_5541" data-name="그룹 5541"> <circle id="타원_3" data-name="타원 3" class="cls-1" cx="1" cy="1" r="1" transform="translate(1709.948 3267)"/> </g> <path id="선_36" data-name="선 36" class="cls-1" transform="translate(1718.948 3268)" d="M17 0H0"/> <g id="그룹_5547" data-name="그룹 5547"> <g id="그룹_5546" data-name="그룹 5546"> <g id="그룹_5545" data-name="그룹 5545"> <g id="그룹_5544" data-name="그룹 5544"> <g id="그룹_5543" data-name="그룹 5543"> <g id="그룹_5542" data-name="그룹 5542"> <path id="패스_3181" data-name="패스 3181" class="cls-1" d="M1724 3288h-22v-54h10.25"/> <path id="패스_3182" data-name="패스 3182" class="cls-1" d="M1733.753 3234H1744v33"/> </g> <path id="패스_3183" data-name="패스 3183" class="cls-1" d="M1733 3230v4a4.012 4.012 0 0 1-4 4h-12a4.013 4.013 0 0 1-4-4v-4"/> <path id="선_37" data-name="선 37" class="cls-1" transform="translate(1713 3230)" d="M0 0h20"/> </g> </g> </g> </g> </g> <g id="그룹_5548" data-name="그룹 5548"> <path id="패스_3184" data-name="패스 3184" class="cls-1" d="m1748 3272-11.047 16-8.953-7.84"/> </g> </g> </svg>
          </div>
          <span class="text-[28px] font-bold">이용안내</span>
        </div>
      </a>
    </div>
  </div>
  @include('partials.img', [
    'ex' => 'jpg', 'name' => 'main', 
    'class' => 'w-full h-full absolute top-0 left-0 bottom-0 right-0 object-cover',
  ])
</div>

@endsection