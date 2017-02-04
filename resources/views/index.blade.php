@extends('layouts.master')

@section('title', 'Everyday is Sundae :&#41;')

@section('content')

	@if(Auth::guest())
		Not log in
	@else
		{{ Auth::user()->name }}
	@endif
	{{--
	<p>
		<button class="btn btn-default" id="show-comment-list" @click="showCommentList = true">Show Comments</button>
	</p>
	<comment-list @close="showCommentList = false" :class="{close : showCommentList == false}"></comment-list>
	--}}
@endsection
