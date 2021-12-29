<div class="header__page">
  <div class="header__page-body">
    <div>
      <h1 class="header__page-title">제보목록</h1>
    </div>
  </div>
  <div class="header__page-background">
    @if (!empty($bg))
      {!! $bg !!}
    @else
      @include('partials.img', ['ex' => 'jpg', 'name' => 'header-01'])
    @endif
  </div>
</div>