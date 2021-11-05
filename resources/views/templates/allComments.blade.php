<div id="comments_section">
    <nav class="nav">
        @for($i = 0; $i < $allComments->lastPage(); $i++)
            <a class="in"
               id="page={{ $i + 1 }}"
               style="background-color: chocolate; color: azure">
                {{--href="?page={{ $i + 1 }}">{{ $i + 1 }} --}}
                {{ $i + 1 }}
            </a>
        @endfor
    </nav>
    <br>
    <div>
        @foreach($allComments as $comment)
            <div class="note alert-info" style="border-radius: 10px; padding: 10px 10px 10px 10px;"
                 id="div{{$comment->id}}">
                @csrf
                <p>
                    <span class="date">{{$comment->updated_at}}</span>
                    @auth()
                        @if(auth()->user()->id == $comment->owner_id)
                            <span style="float: right; padding-right: 20px">
                            <a href="/delete/{{$comment->id}}">
                                Удалить
                            </a>
                            <button class="comments__in-edit" id="{{$comment->id}}">
                                Редактировать
                            </button>
                        </span>
                        @endif
                    @endauth
                </p>
                <p id="{{"message" . $comment->id}}">
                    {{$comment->message}}
                </p>
            </div>
            <br>
        @endforeach
    </div>
</div>
