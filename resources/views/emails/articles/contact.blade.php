<x-mail::message>
# Novelle prise de contacts
@if ($article->getSlug())
    
Une nouvelle demande de contact a été emis pour l'article <a href="{{ route('articles.show', ['slug'=>$article->getSlug(), 'article'=>$article ]) }}">{{ $article->titre }}</a>
@else
    Une nouvelle demande de contact a été emis !
@endif

    -nom : {{ $data['nom'] }}
    -prenom : {{ $data['prenom'] }}
    -telephone : {{ $data['telephone'] }}
    -email : {{ $data['email'] }}

    -message : <br>

    {{ $data['message'] }}


</x-mail::message>
