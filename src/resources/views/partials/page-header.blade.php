<div class="relative max-w-[1920px] container h-[350px] overflow-hidden">
  <div class="absolute top-1/2 left-1/2 -translate-x-1/2 text-white text-center z-10">
    <div class="page-header">
      <h1 class="text-[50px] font-black">{!! $title !!}</h1>
    </div>
  </div>
  @include('partials.img', ['ex' => 'jpg', 'name' => 'header-01', 'class' => 'absolute top-0 left-0 w-full h-full object-cover'])
</div>