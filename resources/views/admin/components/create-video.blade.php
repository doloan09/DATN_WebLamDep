<style>
    /* For desktop: */
    .col-span-1 {width: 8.33%;}
    .col-span-2 {width: 16.66%;}
    .col-span-3 {width: 25%;}
    .col-span-4 {width: 33.33%;}
    .col-span-5 {width: 41.66%;}
    .col-span-6 {width: 50%;}
    .col-span-7 {width: 58.33%;}
    .col-span-8 {width: 66.66%;}
    .col-span-9 {width: 75%;}
    .col-span-10 {width: 83.33%;}
    .col-span-11 {width: 91.66%;}
    .col-span-12 {width: 100%;}

    @media only screen and (max-width: 1200px) {
        /* For mobile phones: */
        [class*="col-span-"] {
            width: 100%;
        }
    }
</style>

<div class="row bg-white rounded shadow-sm p-4 py-4" style="" id="div-video">
    <div class="col-span-6">
        <div class="form-group">
            <div data-controller="input" data-input-mask="">
                <input class="form-control" name="id" value="{{ $video->id }}" hidden="hidden" id="id-video">
            </div>
        </div>

        <div class="form-group">
            <label for="link-video" class="form-label">Link video
                <sup class="text-danger">*</sup>
            </label>
            <input name="link_video" id="link_video" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" placeholder="Link video ... " value="{{ $video->link_video }}" readonly>
        </div>

        <div class="form-group">
            <label for="video-id" class="form-label">Id Video</label>
            <div data-controller="input" data-input-mask="">
                <input name="video_id" id="video_id" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->video_id }}">
            </div>
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Mô tả</label>
            <textarea name="description" id="description" rows="15" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly>{{ $video->description }}</textarea>
        </div>

        <div style="display: flex;">
            <div class="form-group col-span-6">
                <label for="public-at" class="form-label">Thời gian phát hành</label>
                <div data-controller="input" data-input-mask="">
                    <input type="text" name="public_at" id="public_at" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->public_at }}">
                </div>
            </div>

            <div class="form-group col-span-6" style="margin-left: 20px;">
                <label for="public-at" class="form-label">Thời lượng phát</label>
                <div data-controller="input" data-input-mask="">
                    <input type="text" name="duration" id="duration" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->duration }}">
                </div>
            </div>
        </div>

        <div style="display: flex;">
            <div class="form-group col-span-6">
                <label for="channel-id" class="form-label">ID Kênh</label>
                <div data-controller="input" data-input-mask="">
                    <input name="channel_id" id="channel_id" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->channel_id }}">
                </div>
            </div>

            <div class="form-group col-span-6" style="margin-left: 20px;">
                <label for="channel-title" class="form-label">Tên kênh</label>
                <div data-controller="input" data-input-mask="">
                    <input name="channel_title" id="channel_title" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->channel_title }}">
                </div>
            </div>
        </div>

        <div style="display: flex;">
            <div class="form-group col-span-6">
                <label for="channel-title" class="form-label">Số lượt xem</label>
                <div data-controller="input" data-input-mask="">
                    <input name="channel_title" id="channel_title" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->view_count }}">
                </div>
            </div>

            <div class="form-group col-span-6" style="margin-left: 20px;">
                <label for="channel-title" class="form-label">Số bình luận</label>
                <div data-controller="input" data-input-mask="">
                    <input name="channel_title" id="channel_title" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->comment_count }}">
                </div>
            </div>
        </div>

        <div style="display: flex;">
            <div class="form-group col-span-6">
                <label for="channel-title" class="form-label">Số lượt thích</label>
                <div data-controller="input" data-input-mask="">
                    <input name="channel_title" id="channel_title" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->like_count }}">
                </div>
            </div>

            <div class="form-group col-span-6" style="margin-left: 20px;">
                <label for="channel-title" class="form-label">Lượt không thích</label>
                <div data-controller="input" data-input-mask="">
                    <input name="channel_title" id="channel_title" class="rounded-1" style="width: 100%; padding: 5px; border: 1px #d3d4d7 solid;" readonly value="{{ $video->dislike_count }}">
                </div>
            </div>
        </div>

    </div>
    <div class="col-span-4" style="margin: 40px 5%;">
        {!! $video->embed_html !!}
    </div>
</div>
