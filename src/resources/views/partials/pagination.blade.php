<div class="py-3 grid grid-cols-1 gap-x-[18px] gap-y-[18px] items-center justify-center">
  <div class="justify-self-center">
    <nav class="relative z-0 inline-flex items-center space-x-6 text-[14px]" aria-label="Pagination">
      <a href="{!! $prevlink !!}" class="">
        <span class="sr-only">Previous</span>
        <!-- Heroicon name: solid/chevron-left -->
        <div class="flex items-center justify-center w-[28px] h-[28px] border-mineShaft-200 border text-[#707070]">
          <i class="icon-left-open-big"></i>
        </div>
      </a>
      @for ($i = 1; $i < $pages; $i++)
        @if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
          @if ($paged == $i)
            <span class="text-sm font-bold active">{!! $i !!}</span>
          @else
            <a href="{!! get_pagenum_link($i) !!}" class="">{!! $i !!}</a>
          @endif
        @endif
      @endfor
      <span class="">...</span>
      <a href="{!! $lastlink !!}" class="">{!! $pages !!}</a>
      <a href="{!! $nextlink !!}" class="">
        <span class="sr-only">Next</span>
        <!-- Heroicon name: solid/chevron-right -->
        <div class="flex items-center justify-center w-[28px] h-[28px] border-mineShaft-200 border text-[#707070]">
          <i class="icon-right-open-big"></i>
        </div>
      </a>
    </nav>
  </div>
</div>