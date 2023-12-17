@extends('layouts.app')
 
@section('content')
<html>
 <body>
<div class="container">
  <h3>プロフィール</h3>
  
  <hr>
     <div style="margin-top: 30px;">   
       <table class="table table-striped ">  
         <tr>
           <th>氏名</th>
          <td>{{ Auth::user()->name }}</td>
         </tr>  

          <tr>
           <th>メールアドレス</th>
            <td>{{ Auth::user()->email }}</td>
          </tr>

          <tr>
           <th>部署名</th>
          <td>{{ Auth::user()->department->department_name }}</td>
          </tr>
        </table>
      </div>
    </div>


        <div class="container">
            <div class="row">
              <div class="col text-center">
                {{-- <form  method="post" action="{{ route('users.edit_password') }}"> --}}
                <a href="{{ route('users.edit_password') }}"><button type="submit" class="btn btn-danger w-25" style="width:100%; text-decoration:none color:white;">パスワード変更へ</button></a>
              {{-- </form> --}}
              </div>
           </div>
       </div>
        

       <div class="container mt-5">
        <footer>        
           <p>&copy; WEB申請アプリ All rights reserved.</p>
        </footer>
       </div>
       
  
      </body>
    </html>
   @endsection