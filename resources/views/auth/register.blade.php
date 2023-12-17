@extends('layouts.app')

@section('content')

    <body style="background:url({{ asset('img/workflow04.jpg') }}); background-size:cover;">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <h1 class="mt-3 mb-3">新規会員登録</h1>

                    <hr>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-5 col-form-label text-md-left">氏名<span
                                    class="ml-1 webapplication-require-input-label"><span
                                        class="webapplication-require-input-label-text">必須</span></span></label>

                            <div class="col-md-7">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror login-input" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="申請太郎">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>氏名を入力してください</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス<span
                                    class="ml-1 webapplication-require-input-label"><span
                                        class="webapplication-require-input-label-text">必須</span></span></label>

                            <div class="col-md-7">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror webapplication-login-input"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="test@test.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>メールアドレスを入力してください</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="department_code" class="col-md-5 col-form-label text-md-left">部署名<span
                                    class="ml-1 webapplication-require-input-label"><span
                                        class="webapplication-require-input-label-text">必須</span></span></label>


                            <div class="col-md-7">
                                <select
                                    class="form-control @error('postal_code') is-invalid @enderror webapplication-login-input"
                                    name="department_id" required placeholder="人事部">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        {{-- <div class="form-group row">
                     <label for="address" class="col-md-5 col-form-label text-md-left">住所<span class="ml-1 webapplication-require-input-label"><span class="webapplication-require-input-label-text">必須</span></span></label>
 
                     <div class="col-md-7">
                         <input type="text" class="form-control @error('address') is-invalid @enderror webapplication-login-input" name="address" required placeholder="東京都渋谷区道玄坂２丁目１１−１">
                     </div>
                 </div> --}}

                        {{-- <div class="form-group row">
                     <label for="phone" class="col-md-5 col-form-label text-md-left">電話番号<span class="ml-1 webapplication-require-input-label"><span class="webapplication-require-input-label-text">必須</span></span></label>
 
                     <div class="col-md-7">
                         <input type="text" class="form-control @error('phone') is-invalid @enderror webapplication-login-input" name="phone" required placeholder="03-5790-9039">
                     </div>
                 </div> --}}

                        <div class="form-group row">
                            <label for="password" class="col-md-5 col-form-label text-md-left">パスワード<span
                                    class="ml-1 webapplication-require-input-label"><span
                                        class="webapplication-require-input-label-text">必須</span></span></label>

                            <div class="col-md-7">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror webapplication-login-input"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-left"></label>

                            <div class="col-md-7">
                                <input id="password-confirm" type="password" class="form-control webapplication-login-input"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group mt-5">
                            <button type="submit" class="btn webapplication-submit-button w-100">
                                アカウント作成
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
