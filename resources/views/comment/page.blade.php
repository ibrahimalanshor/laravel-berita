@foreach ($comments as $comment)
    <x-comment.single :comment="$comment" :reactions="$reactions" :article="$article->slug" />
@endforeach