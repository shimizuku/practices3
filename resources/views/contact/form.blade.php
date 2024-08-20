@extends('layouts.menu')
@section('title', 'お問い合わせ')
@section('content')
<div class="contants-area-md">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('title')</div>

                <div class="card-body">

            @if ($errors->any())
                @include('common.errors')
            @endif
            <form method="post" action="{{ route('contact.post') }}" class="row"> @csrf <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fa fa-id-card-o"></i>　お名前</div>
                            <input type="text" name="name" class="form-control bg-light" value="{{ old('name', isset($input->name) ? $input->name : '') }}" autofocus>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fa fa-envelope"></i>　メールアドレス</div>
                            <input type="text" name="email" class="form-control" value="{{ old('email', isset($input->email) ? $input->email : '') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <div class="input-group-text"><i class="fa fa-indent"></i>　タイトル</div>
                            <input type="text" name="title" class="form-control" value="{{ old('title', isset($input->title) ? $input->title : '') }}">
                        </div>
                    </div>
                </div>
                <div class="form-group col-xs-12 mb-4">
                    <textarea name="body" rows="5" class="form-control" placeholder="お問い合わせ本文">{{ old('body', isset($input->body) ? $input->body : '') }}</textarea>
                </div>
                    <div class="form-group">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info btn-lg">
                                <i class="fa fa-chevron-right"></i>　確 認 </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
