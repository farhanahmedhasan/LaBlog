@vite('resources/css/app.css')

<h1 class="bg-red-600">
    Hello bitches 💩
</h1>

<a href={{ route('posts.index') }}>posts</a>
<a href={{ route('posts.show' , ['id' => 2]) }}>single post</a>