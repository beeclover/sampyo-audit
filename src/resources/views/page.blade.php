@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <div class="container py-[100px] max-w-[1000px]">
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-'. get_post_type(), 'partials.content-page', 'partials.content'])
      @endwhile
    </div>
  @endwhile
@endsection
