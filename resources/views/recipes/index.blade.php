<x-app-layout>
    <div class="grid grid-cols-3 gap-2">
        <div class="col-span-2 bg-white rounded p-4">
        @foreach ($recipes as $recipe)
            @include('recipes.partial.horizantal-card')
        @endforeach
        </div>
        {{-- TODO: formの値を入力後も残したい --}}
        {{-- 各カードで星の数も表示したい　それに伴ってクエリを変更した方が良いかも --}}
        <div class="col-span-1 bg-white p-4 h-fit sticky top-4">
            <form action="{{route('index')}}" method="GET" class="flex flex-col gap-4">
                <div class="flex">
                    @include('svgs.search-icon')<h3 class="text-xl font-bold mb-4">条件で探す</h3>
                </div>
                <div>
                    <label class=" font-bold">評価</label>
                    <div>
                        <input type="radio" name="rating" value="0" id="rating0" {{($fillters['rating'] ?? null )==(null|'0')? 'checked': ''}}/>
                        <label for="rating0">指定しない</label>
                    </div>
                    <div>
                        <input type="radio" name="rating" value="3" id="rating3" {{($fillters['rating'] ?? null)=='3' ? 'checked': ''}}/>
                        <label for="rating3">3以上</label>
                    </div>
                    <div>
                        <input type="radio" name="rating" value="4" id="rating4" {{($fillters['rating'] ?? null )=='4' ? 'checked': ''}}/>
                        <label for="rating4">4以上</label>
                    </div>
                </div>
                <div>
                    <label class=" font-bold">カテゴリ</label>
                    {{-- {{$fillters['categories']}} --}}
                    @foreach($categories as $category)
                    <div>
                        <input type="checkbox" name="categories[]" value="{{$category['id']}}" {{in_array($category['id'],($fillters['categories']) ?? [])? 'checked':''}}/>
                        <label for="rating0">{{$category['name']}}</label>
                    </div>
                    @endforeach
                </div>
                <input type="text" name="title" value="" placeholder="レシピ名を入力" class=" border-gray-600 mb-4 w-full"/>
                <button type="submit" class=" bg-green-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">検索</button>
            </form>
        </div>
    </div>

</x-app-layout>