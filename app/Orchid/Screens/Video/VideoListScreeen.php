<?php

namespace App\Orchid\Screens\Video;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Video;
use App\Orchid\Layouts\Video\VideoCreateLayout;
use App\Orchid\Layouts\Video\VideoListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class VideoListScreeen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'videos' => Video::query()
                ->orderByDesc('created_at')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Danh sách video';
    }

    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [
            'systems.videos',
        ];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            ModalToggle::make('Thêm mới')
                ->modal('videoModal')
                ->modalTitle('Thêm mới video')
                ->method('store')
                ->icon('plus'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            VideoListLayout::class,

            Layout::modal('videoModal', [
                VideoCreateLayout::class
            ])->applyButton('Thêm mới'),
        ];
    }

    public function store(Request $request){
        try {
            $link_video = $request->get('link_video');

            $info = Youtube::getVideoInfo(Youtube::parseVidFromURL($link_video));

            $data = [
                'link_video' => $link_video,
                'video_id' => $info->id,
                'title' => $info->snippet->title,
                'thumbnail' => json_encode($info->snippet->thumbnails),
                'public_at' => date('Y-m-d h:i:s', strtotime($info->snippet->publishedAt)),
                'description' => $info->snippet->description,
                'channel_id' => $info->snippet->channelId,
                'channel_title' => $info->snippet->channelTitle,
                'embed_html' => $info->player->embedHtml,
                'duration' => $this->convertDuration($info->contentDetails->duration),
                'privacy_status' => $info->status->privacyStatus,
                'view_count' => $info->statistics->viewCount,
                'like_count' => $info->statistics->likeCount,
                'dislike_count' => $info->statistics->favoriteCount,
                'comment_count' => $info->statistics->commentCount,
                'slug' => Str::slug($info->snippet->title),
            ];

            Video::query()->create($data);

            Toast::success('Đã thêm thành công!');
        }catch (\Exception $exception){
//            dd($exception);
            Toast::error('Video này đã tồn tại! Bạn không thể tạo 2 video trùng nhau');
        }
    }

    public function convertDuration($duration){
        $duration = str_replace('PT', '', $duration);
        $findH    = strpos($duration, 'H');
        $findM    = strpos($duration, 'M');
        $findS    = strpos($duration, 'S');

        if ($findH){
            $duration = str_replace('H', ':', $duration);
        }if ($findM){
            $duration = str_replace('M', ':', $duration);
            if ($findS){
                $duration = str_replace('S', '', $duration);
            }else{
                $duration .= '0';
            }
        }

        $duration = explode(':', $duration);
        $count = count($duration);
        if ($count == 3){
            $duration[1] = $this->convert($duration[1]);
            $duration[2] = $this->convert($duration[2]);
        }
        if ($count == 2){
            $duration[1] = $this->convert($duration[1]);
        }

        $duration = implode(':', $duration);

        return $duration;
    }
    public function convert($number){
        return ($number < 9) ? ('0' . $number) : $number;
    }

    public function delete(Request $request)
    {
        try {
            $item = Video::query()->find($request->get('id'));

            $delete = $item->delete();

            if ($delete) {
                Toast::success('Đã xóa thành công video : ' . $item->title);
            } else {
                Toast::error('Có lỗi khi xóa video : ' . $item->title);
            }
        }catch (\Exception $e){
            Toast::error('Not found!');
        }
    }

}
