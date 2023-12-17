@extends('layouts.app')
 
 @section('content')
 <div class="container">
     <form method="post" action="{{route('users.update_password')}}">
      @method('PUT')
      @csrf
         <input type="hidden" name="_method" value="PUT">
         <div class="form-group row mb-3">
             <label for="password" class="col-md-3 col-form-label text-md-right">新しいパスワード</label>
 
             <div class="col-md-7">
                 <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
 
                 @error('password')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
             </div>
         </div>
 
         <div class="form-group row mb-3">
             <label for="password-confirm" class="col-md-3 col-form-label text-md-right">確認用</label>
 
             <div class="col-md-7">
                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
             </div>
         </div>
 
         <div class="form-group d-flex justify-content-center">
             <button type="button" class="btn btn-danger w-25" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 パスワード更新
             </button>
         </div>

         {{-- !-- Modal(承認) --> --}}
         <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">パスワード変更確認画面</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
               <p><strong>変更します。</strong>よろしいですか？</p>
               </div>
               <div class="modal-footer">
                <button type="submit" class="btn btn-danger">更新</button>
              </form>

                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">閉じる</button>
               </div>
             </div>
           </div>
         </div>
 </div>

 <div class="container mt-5">
  <footer>        
     <p>&copy; WEB申請アプリ All rights reserved.</p>
  </footer>
 </div>
 @endsection