@extends('common.layouts.master')
@push('links')
@endpush


@section('main')

	@foreach($page->pageItems as $section)
          @if(view()->exists("common.snippets.{$section->type}"))
                 @include("common.snippets.{$section->type}", ['content' => $section->content, 'section' => $section])
          @endif
   	@endforeach
@endsection