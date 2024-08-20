@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="post" action="">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="align-middle">No.</th>
                            <th scope="col" class="align-middle">Name</th>
                            <th scope="col" class="align-middle">Email</th>
                            <th scope="col" class="align-middle">権限</th>
                            <th scope="col">
                                <button formaction="{{ route('usersCreate') }}" type="submit" class="btn btn-secondary fw-bold">新規作成</button>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @csrf
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row" class="align-middle">{{ $user->id }}</th>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">
                                    @if ($user->authority == 1)
                                    管理者
                                    @endif
                                </td>
                                <td>
                                    @if ($user->authority !== 1)
                                    <button formaction="{{ route('usersEdit') }}" type="submit" class="btn btn-secondary" name="edit" value="{{ $user->id }}">変更</button>
                                    <button formaction="{{ route('usersCreate') }}" type="submit" class="btn btn-dark" name="delete" value="{{ $user->id }}">削除</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
