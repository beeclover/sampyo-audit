@extends('layouts.app')

@section('content')
  @include('partials.header-report')

  <div class="container py-[100px] max-w-[1000px]">
    @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
    @endwhile
  </div>
@endsection
