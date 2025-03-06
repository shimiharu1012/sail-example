<x-app-layout>
    {{-- $popular,$recipes --}}
    <div class="grid grid-cols-4 gap-3">
      <div class="col-span-1 bg-white rounded p-4">
        <h3 class="text-2xl font-bold mb-2">レシピ検索</h3>
        <ul class="ml-6 mb-4">
          <li><a href="">すべてのレシピ</a></li>
          <li><a href="">人気のレシピ</a></li>
        </ul>
        <h3 class="text-2xl font-bold mb-2">レシピ投稿</h3>
        <ul class="ml-6 mb-4">
          <li><a href="">すべてのレシピ</a></li>
          <li><a href="">人気のレシピ</a></li>
        </ul>
      </div>
      <div class="col-span-2 bg-white rounded p-4">
        <h2 class="text-2xl font-bold mb-2">新着レシピ</h2>
    @foreach ($recipes as $recipe)
        @include('recipes.partial.horizantal-card')
    @endforeach
        <a href="{{route('index')}}" class=" text-gray-600 block text-right">レシピ一覧へ ></a>
        <h2 class="text-2xl font-bold mb-2">人気のレシピ</h2>
        <div class="flex justify-between items-center mb-6">
    @foreach($popular as $p)
        @include('recipes.partial.vertical-card')
    @endforeach
        </div>
        <a href="" class=" text-gray-600 block text-right">人気レシピ一覧へ ></a>
      </div>
      <div class="col-span-1 bg-gray ml-4">
        <img src="/images/ad.png">
      </div>
      {{-- {{$recipes[0]}}
      {{$popular}} --}}
    </div>
  </x-app-layout>