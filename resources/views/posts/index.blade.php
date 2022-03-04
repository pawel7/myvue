@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Posts List') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('posts.create') }}">Add new post</a>
                    <br /><br />
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th>User</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>Tu bedzie post user_name</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">{{ __('No posts found') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
