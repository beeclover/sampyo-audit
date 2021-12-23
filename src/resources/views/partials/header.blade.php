<header id="global" :class="{'lg:pr-[15px]': $store.bodyScrollLock, 'transform-none active': $store.mobileMenu.on}">
  <div class="header__main" :class="{'active': $store.mobileMenu.on}">
    <a href="{{ home_url('/') }}">
      <svg class="logo" width="148.659" height="28.664" viewBox="0 0 148.659 28.664">
        <g transform="translate(-50.743 -35.229)">
          <path d="m941.859 735.594 4.588-19.74-11.441 19.337H930.5l-.545-19.337-6.076 19.74h-5.311l8.2-24.591h7.765l.37 16.071L944.456 711h8.1l-5.064 24.591z" transform="translate(-819.7 -673.138)"/>
          <path d="M973.274 715.044s1.263.005 2.35.005c2.252 0 4.1.766 4.1 3.1 0 2.479-2.292 4.486-5.75 4.486a12.019 12.019 0 0 1-2.253-.181zm-9.959 20.546h5.67l1.849-8.83c.606.036 1.412.145 2.377.145a15.294 15.294 0 0 0 8.688-2.3 8.3 8.3 0 0 0 3.66-6.9 5.745 5.745 0 0 0-2.935-5.215c-1.971-1.28-4.75-1.506-7.205-1.506h-6.956z" transform="translate(-832.403 -673.134)"/>
          <path d="M1009.35 711h6.04l-19.436 24.591h-6.725l7.8-9.376-4.45-15.215h5.682l2.672 10.7z" transform="translate(-839.76 -673.138)"/>
          <path d="M1033.269 707.884a20.738 20.738 0 0 0-8.111 1.6l-9.692 12.262a16.078 16.078 0 0 0-.251 2.789c0 6.3 4.78 11.278 13.323 11.278h.047a18.894 18.894 0 0 0 12.146-3.931 16.462 16.462 0 0 0 5.81-12.724c0-6.458-4.588-11.274-13.272-11.274zm-3.865 23.682h-.05c-5.123 0-7.4-3.026-7.4-7.076 0-5.45 4.176-12.354 10.568-12.354 5.6 0 7.187 3.453 7.187 7.031-.001 5.409-4.177 12.399-10.309 12.399z" transform="translate(-847.138 -672.252)"/>
          <path d="M904.464 735.594h6.073L907.4 711h-7.44l-13.234 24.591h6.2l2.524-5.236h8.576zm-7.092-9.233s4.6-9.775 5.281-11.269l1.03 11.269z" transform="translate(-810.66 -673.138)"/>
          <path d="M871.512 719.152c-3.3-1.24-5.461-1.991-5.808-3.554-.326-1.448.963-2.873 4.443-3.189 4.64-.342 9.376 1.56 12.465 3.326l2.6-4.831a27.7 27.7 0 0 0-16.036-3.477h-.034c-6.651.6-12.207 3.709-11.011 9.039.652 2.914 3.533 5.079 8.426 6.961 2.58.991 5.318 2.177 5.656 3.691.451 2.022-1.967 3.29-4.819 3.563h-.057c-4.722.422-9.572-1.379-13.2-3.317l-2.775 5.223a33.976 33.976 0 0 0 16.094 3.361 19.8 19.8 0 0 0 7.282-1.469l4.983-9.258c-.867-2.373-3.286-4.221-8.209-6.069z" transform="translate(-800.621 -672.093)"/>
        </g>
      </svg>
    </a>
  
    <div class="hidden lg:block">
      <nav class="nav-primary flex gap-x-[54px]">
        @if (is_user_logged_in())
        <div>
          <a href="{!! wp_logout_url() !!}">로그아웃</a>
        </div>
        @endif
        {!! wp_nav_menu(['menu' => 0, 'menu_class' => 'flex gap-x-[54px]', 'echo' => false]) !!}
      </nav>
    </div>
    <div class="block lg:hidden">
      <button class="btn-menu lg:hidden focus:outline-none ml-4 transform scale-75"
        x-on:click.prevent="$store.mobileMenu.toggle()"
        :class="{'active' : $store.mobileMenu.on}"
      >
        <svg viewBox="0 0 64 48">
            <path d="M19,15 L45,15 C70,15 58,-2 49.0177126,7 L19,37"></path>
            <path d="M31,24 L45,24 C61.2371586,24 57,49 41,33 L32,24"></path>
            <path d="M45,33 L19,33 C-8,33 6,-2 22,14 L45,37"></path>
        </svg>
      </button>
    </div>
  </div>
  <div
    x-show="$store.mobileMenu.on"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-90"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-90"
    class="block lg:hidden w-screen h-screen fixed top-0 left-0 pt-[var(--h-main)] bg-white z-[9000] text-mineShaft-500"
  >
    {!! $mnb !!}
    @if (is_user_logged_in())
      <div class="pl-[20px] border-b border-mineShaft-100 h-[50px] flex items-center">
        <a href="{!! wp_logout_url() !!}">로그아웃</a>
      </div>
    @endif
  </div>
</header>
