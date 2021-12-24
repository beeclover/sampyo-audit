<div
  x-effect="bodyScrollLock($store.bodyScrollLock)"
>
  <div x-cloak x-show="$store.posting" id="bgMask" class="fixed top-0 bottom-0 left-0 right-0 w-full h-full bg-black opacity-50 z-[9010]"></div>
  <section id="modal" class="flex items-center justify-center">
    <div 
      class="fixed max-w-[90%] lg:max-w-[500px] max-h-full w-full bg-white md:rounded shadow-2xl transform top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 p-[40px] overflow-y-auto z-[9020]"
      x-show="$store.posting"
      @click.away="window.location.href='/'"
      x-cloak
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 transform scale-90"
      x-transition:enter-end="opacity-100 transform scale-100"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="opacity-100 transform scale-100"
      x-transition:leave-end="opacity-0 transform scale-90"
      >
      <div class="grid text-mineShaft-500 justify-center">
        <div class="justify-self-center prose mb-[20px]">
          제보 등록이 완료되었습니다<br/>
          처리결과는 처리결과 확인페이지에서 확인하실 수 있습니다.
        </div>
        <div class="justify-self-center flex gap-x-[5px]">
          <a href="/" class="btn-lochmara px-[30px] py-[15px] w-[160px]">확인</a>
          <a x-bind:href="$store.postlink" class="btn px-[30px] py-[15px] w-[160px]">등록한 제보 확인</a>
        </div>
      </div>
    </div>
  </section>
</div>