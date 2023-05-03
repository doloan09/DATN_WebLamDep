<?php

namespace App\Orchid\Screens\Video;

use Alaouy\Youtube\Facades\Youtube;
use App\Models\Video;
use App\Orchid\Layouts\Video\VideoListener;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class VideoCreateScreen extends Screen
{
    public Video $video;
    public bool  $edit;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(?int $id): iterable
    {
        if ($id) {
            $this->edit = true;
            try {
                $video = Video::query()->findOrFail($id);

                return [
                    'info' => $video,
                    'edit' => true,
                ];
            } catch (\Exception) {
                abort(404);
            }
        }

        $this->edit = false;
        return [
            'edit' => false,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->edit ? 'Cập nhật thông tin' : 'Thêm mới';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Lưu')
                ->icon('plus')
                ->method('store')
                ->canSee(!$this->edit),

            Button::make('Cập nhật')
                ->icon('check')
                ->method('update')
                ->canSee($this->edit),

            Button::make('Xóa')
                ->icon('trash')
                ->confirm(__('Bạn có chắc muốn xóa video này không?'))
                ->method('delete')
                ->canSee($this->edit),
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
            VideoListener::class,
        ];
    }

    public function getData(string $link)
    {
        $link_video = $link;

        $info = Youtube::getVideoInfo(Youtube::parseVidFromURL($link_video));

        $data = [
            'link_video'     => $link_video,
            'video_id'       => $info->id,
            'title'          => $info->snippet->title,
            'thumbnail'      => json_encode($info->snippet->thumbnails),
            'public_at'      => date('Y-m-d h:i:s', strtotime($info->snippet->publishedAt)),
            'description'    => $info->snippet->description,
            'channel_id'     => $info->snippet->channelId,
            'channel_title'  => $info->snippet->channelTitle,
            'embed_html'     => $info->player->embedHtml,
            'duration'       => $this->convertDuration($info->contentDetails->duration),
            'privacy_status' => $info->status->privacyStatus,
            'view_count'     => $info->statistics->viewCount,
            'like_count'     => $info->statistics->likeCount,
            'dislike_count'  => $info->statistics->favoriteCount,
            'comment_count'  => $info->statistics->commentCount,
            'slug'           => Str::slug($info->snippet->title),
        ];

        return [
            'info' => $data,
        ];
    }

    public function convertDuration($duration)
    {
        $duration = str_replace('PT', '', $duration);
        $findH    = strpos($duration, 'H');
        $findM    = strpos($duration, 'M');
        $findS    = strpos($duration, 'S');

        if ($findH) {
            $duration = str_replace('H', ':', $duration);
            if ($findM) {
                $duration = str_replace('M', ':', $duration);
            } else {
                $duration = str_replace(':', ':0:', $duration);
            }
            if ($findS) {
                $duration = str_replace('S', '', $duration);
            } else {
                $duration .= '0';
            }
        } else {
            if ($findM) {
                $duration = str_replace('M', ':', $duration);
                if ($findS) {
                    $duration = str_replace('S', '', $duration);
                } else {
                    $duration .= '0';
                }
            } else {
                if ($findS) {
                    $duration = str_replace('S', '', $duration);
                } else {
                    $duration .= '0';
                }
                $duration = '00:' . $duration;
            }
        }

        $duration = explode(':', $duration);
        $count    = count($duration);
        if ($count == 3) {
            $duration[1] = $this->convert($duration[1]);
            $duration[2] = $this->convert($duration[2]);
        }
        if ($count == 2) {
            $duration[1] = $this->convert($duration[1]);
        }

        $duration = implode(':', $duration);

        return $duration;
    }

    public function convert($number)
    {
        return ($number < 9) ? ('0' . $number) : $number;
    }

    public function store(Request $request)
    {
        try {
            $data = $request->toArray();
            $data['id_playlist'] = ($data['id_playlist'] >= 0) ? $data['id_playlist'] : null;

            Video::query()->create($data);

            Toast::success('Đã thêm thành công video: ' . $data['title']);
            return redirect()->route('videos.index');
        } catch (\Exception $exception) {
            Toast::error('Video này đã tồn tại! Bạn không thể tạo 2 video trùng nhau!');
        }
    }

    public function update(Request $request){
        try {
            $data = $request->toArray();
            $data['id_playlist'] = ($data['id_playlist'] >= 0) ? $data['id_playlist'] : null;

//            dd($data);

            $video = Video::query()->findOrFail($request->get('id'));
            $video->update($data);

            Toast::success('Đã cập nhật thành công video: ' . $data['title']);
            return redirect()->route('videos.index');
        } catch (\Exception $exception) {
            dd($exception);

            Toast::error('Có lỗi khi cập nhật thông tin video: ' . $request->get('title'));
        }
    }

    public function delete(int $id){
        try {
            $item = Video::query()->findOrFail($id);

            $delete = $item->delete();

            if ($delete) {
                Toast::success('Đã xóa thành công video : ' . $item->title);
                return redirect()->route('videos.index');
            } else {
                Toast::error('Có lỗi khi xóa video : ' . $item->title);
            }
        }catch (\Exception $e){
            Toast::error('Not found!');
        }
    }

}
