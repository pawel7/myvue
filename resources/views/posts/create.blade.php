@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Post</div>

                <div class="card-body">
                    <post-create></post-create>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
