<!-- フラッシュメッセージ -->
@if (session('flash_message'))
<div class="flash_message">
    {{ session('flash_message') }}
</div>
@endif

<main class="mt-4">
@yield('content')
</main>