@foreach ($comments as $comment)
    <x-home.comment.single :comment="$comment" :reactions="$reactions" :article="$article->slug" />
@endforeach