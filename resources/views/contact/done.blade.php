@extends('layouts.menu')
@section('title', '送信完了')
@section('content')
<div class="contants-area-md">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-dark bg-light rounded">
        <main class="px-3">
            <h3 class="fs-2 my-3">@yield('title')</h3>
            <p class="lead">この度はお問い合わせいただき、誠にありがとうございました。</p>
            <p class="lead">ご入力いただいた内容は送信されました。<br>内容を確認の上、折り返しご連絡させていただきます。</p>
            <p class="lead d-grid gap-12 my-2">
                <a href="{{ url('/') }}" class="btn btn-lg btn-secondary fw-bold border-dark bg-dark"><i class="fa fa-mail-reply"></i>　トップに戻る</a>
            </p>
        </main>
    </div>
</div>
@endsection
