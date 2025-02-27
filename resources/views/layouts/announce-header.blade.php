<!-- TODO　section5-3から -->
 <section class="flex bg-white h-10 py-2 border-b-2">
    <div class="container mx-auto flex justify-between">
      <p>ヘッダー</p>
      <div>
      @auth
         <a href="{{route('profile.edit')}}" class="ml-auto">マイページ</a>
      @endauth
      @guest
         <a href="{{route('register')}}" class="mr-2">ユーザー登録</a>
         <a href="{{route('login')}}" class="">ログイン</a>
      @endguest
      </div>
    </div>
 </section>