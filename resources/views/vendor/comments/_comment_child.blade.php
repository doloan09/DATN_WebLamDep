@inject('markdown', 'Parsedown')
@php
    // TODO: There should be a better place for this.
    $markdown->setSafeMode(true);
@endphp

@php
    $user = \Illuminate\Support\Facades\Auth::user();
    $id_user = '';
    if (!empty($user)){
        $id_user = $user['id'];
    }
@endphp

<div id="comment-{{ $comment->getKey() }}" class="flex w-full" >
    <img class="col-span-2 md:col-span-1 text-center h-9 w-9 md:h-11 md:w-11" src="https://1.bp.blogspot.com/-HhU9edRL9Q8/YU1CjMlHZvI/AAAAAAAANt4/RKMHAtXYD_MqJOr3UbkiGN7ZkCz8Oy95gCLcBGAsYHQ/w800-h800-p-k-no-nu/Mailovesbeauty_LifeStyle%2BBlog.JPG" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
    <div class="media-body col-span-10 md:col-span-11 w-full ml-2">
        <div class="px-2 relative">
            <h5 class="mt-0 mb-1 font-medium">{{ $comment->commenter->name ?? $comment->guest_name }} <small class="text-muted font-medium">- {{ $comment->created_at->diffForHumans() }}</small></h5>
            <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>
        </div>

        <div class="ml-2 flex mt-2">
            @can('like-comment', $comment)
                <button id="like-modal-{{ $comment->getKey() }}" onclick="likeK({{ $comment->getKey() }}, {{ $id_user }})" class="text-xs text-blue-600 cursor-pointer">@lang('comments::comments.like')</button>
                <button id="delete-like-modal-{{ $comment->getKey() }}" onclick="delete_likeK({{ $comment->getKey() }}, {{ $id_user }})" class="hidden text-xs text-blue-600 cursor-pointer">@lang('comments::comments.dislike')</button>
            @endcan
            @can('reply-to-comment', $comment)
                <div class="bg-blue-600 rounded-full mx-2" style="width: 2px; height: 2px; margin-top: 8px;"></div>
                <button onclick="toggleModal('reply-modal-{{ $comment->getKey() }}')" class="text-xs text-blue-600 cursor-pointer">@lang('comments::comments.reply')</button>
            @endcan
            @can('edit-comment', $comment)
                <div class="bg-blue-600 rounded-full mx-2" style="width: 2px; height: 2px; margin-top: 8px;"></div>
                <button onclick="toggleModal('comment-modal-{{ $comment->getKey() }}')" class="text-xs text-blue-600 cursor-pointer">@lang('comments::comments.edit')</button>
            @endcan
            @can('delete-comment', $comment)
                <div class="bg-blue-600 rounded-full mx-2" style="width: 2px; height: 2px; margin-top: 8px;"></div>
                <a href="{{ route('comments.destroy', $comment->getKey()) }}" onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();" class="text-xs text-blue-600 cursor-pointer">@lang('comments::comments.delete')</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}" action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
            @endcan
            <div class="flex text-xs text-blue-600" id="sum_like_{{ $comment->getKey() }}">
                {{--         sum like           --}}
            </div>
        </div>

        @can('edit-comment', $comment)
            <div class="hidden my-4" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}" class="flex justify-end">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body w-full">
                        <div class="form-group">
                            <textarea required class="border w-full p-2 form-control focus:outline-none" placeholder="Viết bình luận ...." name="message" rows="1">{{ $comment->comment }}</textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        {{--                        <button type="button" class="border-2 border-red-500 p-0.5 md:p-1 rounded-xl text-red-500 mx-4" onclick="toggleModal('comment-modal-{{ $comment->getKey() }}')">@lang('comments::comments.cancel')</button>--}}
                        <button type="submit" class="bg-purple h-10 px-3 text-white float-right ml-2">@lang('comments::comments.edit_comment')</button>
                    </div>
                </form>
            </div>
        @endcan

        @can('reply-to-comment', $comment)
            <div class="hidden my-4" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}" class="flex justify-end">
                    @csrf
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body w-full">
                        <div class="form-group">
                            <textarea required class="border w-full form-control p-2 focus:outline-none" placeholder="Viết phản hồi ...." name="message" rows="1"></textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="bg-purple h-10 px-3 text-white float-right ml-2">@lang('comments::comments.submit')</button>
                    </div>
                </form>
            </div>
        @endcan

        <br />{{-- Margin bottom --}}

            <?php
            if (!isset($indentationLevel)) {
                $indentationLevel = 1;
            } else {
                $indentationLevel++;
            }
            ?>
    </div>
</div>

<div class="hidden fixed z-10 inset-0 overflow-y-auto animate-fade-in-down" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="like_modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity ease-out duration-300" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full w-full">
            <div class="bg-white relative">
                <svg xmlns="http://www.w3.org/2000/svg" class="absolute h-6 right-3 text-gray-500 top-3 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="change()">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <div class="border-b flex p-4 items-center">
                        <span class="bg-blue-100 flex flex-shrink-0 h-12 items-center justify-center rounded-full sm:h-10 sm:mx-0 sm:w-10 text-blue-600 w-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                            </svg>
                        </span>
                    <span class="text-lg leading-6 font-medium text-gray-900 font-bold ml-2" id="modal-title">
                            Những người đã thích
                        </span>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left pb-4" id="list_liker">
                    {{--        list liker        --}}
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Recursion for children --}}
@if($grouped_comments->has($comment->getKey()) && $indentationLevel <= $maxIndentationLevel)
    {{-- TODO: Don't repeat code. Extract to a new file and include it. --}}
    @foreach($grouped_comments[$comment->getKey()] as $child)
        @include('comments::_comment_child', [
            'comment' => $child,
            'grouped_comments' => $grouped_comments
        ])
    @endforeach
@endif

@push('scripts')
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
    <script type="text/javascript">
        function toggleModal(modalID){
            document.getElementById(modalID).classList.toggle("hidden");
        }

        //----------------like - unlike-------------------------
        get_likeK({{ $comment->getKey() }}, {{ $id_user }});
        function get_likeK($id_comment, $id_user){
            $.ajax({
                type: "GET",
                url: '/likes/' + $id_comment + '/' + $id_user,
                success: function(data){
                    if (data['status'] === 'true'){
                        $("#delete-like-modal-" + $id_comment).show();
                        $("#like-modal-" + $id_comment).hide();
                    }
                    if (data['status'] === 'false') {
                        $("#delete-like-modal-" + $id_comment).hide();
                        $("#like-modal-" + $id_comment).show();
                    }
                },
                error: function(xhr, status, error){
                    alert(error);
                }
            });
        }

        // -----------------sum-liker----------------
        sum_like();
        function sum_like(){
            $.ajax({
                type: "GET",
                url: '/sum-likes/' + {{$comment->getKey()}},
                success: function(data){
                    if (data['data'] > 0){
                        btn = `<div class="bg-blue-600 rounded-full mx-2" style="width: 2px; height: 2px; margin-top: 8px;"></div>
                                <div class="flex cursor-pointer" onclick="getListLike(` + {{ $comment->getKey() }} + `)">
                                    <p>` + data['data'] + `</p>
                                    <div class="ml-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path>
                                        </svg>
                                    </div>
                                </div>`;

                        document.getElementById('sum_like_' + {{ $comment->getKey() }}).innerHTML = btn;
                    }
                },
                error: function(xhr, status, error){
                    // alert(error);
                }
            });
        }

        // -----------list_liker----------------------
        // getListLike(1);
        function getListLike($id_comment){
            $.ajax({
                type: "GET",
                url: '/list-liker/' + $id_comment,
                success: function(data){
                    listLiker = data['data'];
                    sizeData = listLiker.length;
                    str = '';

                    for (let i = 0; i< sizeData; i++){
                        str += `<div class="ml-8 modal-body mt-4 grid grid-cols-1 gap-3"><div class="flex items-center">
                            <a class="avatar mr-2">
                            <img class="rounded-full" src="https://thechatvietnam.com/storage/users/default.png" alt="img" width="35px">
                            </a>
                            <b><span class="name mb-0 text-sm">` + listLiker[i]['name'] + `</span></b>
                            </div>
                            </div>`;
                    }

                    document.getElementById('list_liker').innerHTML = str;
                    $("#like_modal").show();

                },
                error: function(xhr, status, error){
                    // alert(error);
                }
            });
        }

        function change(){
            $("#like_modal").hide();
        }

        // ------------------------
        function likeK($id_comment, $id_user){
            $.ajax({
                type: "POST",
                url: '/likes',
                data: {
                    liker_id: $id_user,
                    liker_type: '\\Doloan09\\Comments\\Comment',
                    liketable_id: $id_comment,
                },
                success: function(data){
                    $("#delete-like-modal-" + $id_comment).show();
                    $("#like-modal-" + $id_comment).hide();
                    location.reload();
                },
                error: function(xhr, status, error){
                    alert(error);
                }
            });
        }

        //-----------------------------------
        function delete_likeK($id_comment, $id_user){
            $.ajax({
                type: "DELETE",
                url: '/likes/' + $id_comment ,
                data: {
                    liker_id: $id_user,
                },
                success: function(data){
                    $("#delete-like-modal-" + $id_comment).hide();
                    $("#like-modal-" + $id_comment).show();
                    location.reload();
                },
                error: function(xhr, status, error){
                    alert(error);
                }
            });
        }

    </script>
@endpush
