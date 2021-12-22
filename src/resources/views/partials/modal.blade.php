<div x-cloak x-show="" id="bgMask" class="fixed top-0 bottom-0 left-0 right-0 w-full h-full bg-black opacity-50 z-[9010]"></div>
<section id="modal" class="flex items-center justify-center">
  <div 
    class="fixed max-w-[720px] max-h-full w-full bg-white md:rounded shadow-2xl transform top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-[63px] pt-[80px] overflow-y-auto z-[9020]"
    x-show=""
    @click.away=""
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    >
  </div>
</section>