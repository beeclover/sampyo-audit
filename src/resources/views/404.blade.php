@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  <div class="container py-[100px] max-w-[1000px]">
    @if (! have_posts())
    
      <x-alert type="warning">
        {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
      </x-alert>
  
      {!! get_search_form(false) !!}
    @endif
  </div>
@endsection
