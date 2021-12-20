@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    <div class="container py-[100px] max-w-[1000px]">
      @includeFirst(['partials.content-'. get_post_type(), 'partials.content-page', 'partials.content'])
    </div>
  @endwhile
@endsection
