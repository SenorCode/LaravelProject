@extends('layouts.master')

@section('content')
	@include('includes.message_block')
	<section class="row new-post">
		<div class="col-lg-6 col-lg-offset-3">
			<header><h3>What do you have to say?</h3></header>
			<form action="{{ route('post.create') }}" method="post">
				<div class="form-group">
					<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your post goes here...."></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Create Post</button>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		</div>
	</section>
	<section class="row posts">
		<div class="col-lg-6 col-lg-offset-3">
			<header><h3>What other people say....</h3></header>
			@foreach($posts as $post)
			<article class="post">

				<p>{{ $post->body }}</p>
				<div class="info">
					Posted by {{ $post->user->first_name}} on {{ $post->created_at->format('m/d/Y') }} at {{ $post->created_at->format('h:i A') }}
				</div>
				<div class="interaction">
					<a href="#">Like</a> |
					<a href="#">Dislike</a> |
					<a href="#">Edit</a> |
					<a href="#">Delete</a>
				</div>
			</article>

			@endforeach
				
			
			
		</div>
		
	</section>

@endsection