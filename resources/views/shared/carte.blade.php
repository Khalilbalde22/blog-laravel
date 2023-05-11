

<div class="card">
    <div class="card-body">
        <a href="{{ route('articles.show', ['slug'=>$article->getSlug(), 'article'=>$article]) }}"><img style="width: 200px" src="{{ $article->imageUrl() }}" alt=""></a>
        <h5 class="card-title"><a class="text-decoration-none" href="{{ route('articles.show', ['slug'=>$article->getSlug(), 'article'=>$article]) }}">{{ $article->titre }}</a></h5>
        <p class="card-text">{{ $article->description }} </p>
        <p class="card-text">{{ $article->auteur }}, {{ date_format($article->created_at,'d/m/Y') }}</p>
    </div>
</div>