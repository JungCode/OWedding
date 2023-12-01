<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Fiance;
use App\Models\LoveStory;
use App\Models\Slide;
use App\Models\User;
use App\Models\UserWeb;
use Illuminate\Http\Request;
use Nette\Utils\Finder;

class UserWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $userWeb = UserWeb::where('user_id', $id)->first();
        if (!$userWeb) return redirect()->route('templates.index');
        $bride = Fiance::findOrFail($userWeb->bride_id);
        $groom = Fiance::findOrFail($userWeb->groom_id);
        $slides = Slide::where('user_web_id',$userWeb->id)->get();
        $events = Event::where('user_web_id',$userWeb->id)->get();
        $loveStories = LoveStory::where('user_web_id',$userWeb->id)->get();

        return view('template-choice.template.template' . $userWeb->template_id, [
            'bride' => $bride,
            'groom' => $groom,
            'wedding_date' => $userWeb->wedding_date,
            'slides' => $slides,
            'events' => $events,
            'loveStories' => $loveStories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data  = $request->validate([
            'template_id' => ['required'],
            'bride_name' => ['required'],
            'groom_name' => ['required'],
            'wedding_date' => ['required']
        ]);
        //adding bride information
        $bride_id = $this->createBride($data['bride_name']);
        //adding groom information
        $groom_id = $this->createGroom($data['groom_name']);
        //adding userweb
        $user = session('user');
        $userWebId = $this->createUserWeb($data, $user, $bride_id, $groom_id, $request);
        //adding slide
        $this->createSlide();
        //adding event
        $this->createEvent($userWebId);
        //adding love story
        $this->createLoveStory($userWebId);

        return redirect()->route('userwebs.index', $user['id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function createBride(string $bride_name){
        $fiance = new Fiance;
        $fiance->full_name = $fiance->second_name = $bride_name;
        $fiance->type = 'bride';
        $fiance->photo = 'bride-image/sample.jpeg';
        $fiance->description = "Facilis est nemo corrupti porro. Eligendi suscipit reprehenderit non quam non delectus. Omnis dolores aspernatur aut aut sapiente beatae. Nisi consequuntur deserunt in inventore.";
        $fiance->birthday = "12/09/1992";
        $fiance->save();
        return $fiance->id;
    }
    public function createGroom(string $groom_name){
        $fiance = new Fiance;
        $fiance->full_name = $fiance->second_name = $groom_name;
        $fiance->type = 'groom';
        $fiance->photo = 'groom-image/sample.jpeg';
        $fiance->description = "Facilis est nemo corrupti porro. Eligendi suscipit reprehenderit non quam non delectus. Omnis dolores aspernatur aut aut sapiente beatae. Nisi consequuntur deserunt in inventore.";
        $fiance->birthday = "10/02/1993";
        $fiance->save();
        return $fiance->id;
    }
    public function createUserWeb($data, $user, string $bride_id, string $groom_id, Request $request){
        $userWeb = new UserWeb;
        $userWeb->template_id = $data['template_id'];
        $userWeb->user_id = $user['id'];
        $userWeb->bride_id = $bride_id;
        $userWeb->groom_id = $groom_id;
        $userWeb->wedding_date = $data['wedding_date'];
        $userWeb->save();
        $request->session()->put('userWeb', $userWeb);
        return $userWeb->id;
    }
    public function createSlide(){
        for ($i = 1; $i <= 4; $i++) {
            $usw = session('userWeb');
            $slide = new Slide;
            $slide->photo = 'slide-image/sample'. $i .'.jpg';
            $slide->user_web_id = $usw['id'];
            $slide->save();
        }
    }
    public function createEvent(string $userWebId){
        $event = new Event;
        $event->user_web_id	 = $userWebId;
        $event->name = 'LỄ CƯỚI NHÀ NỮ';
        $event->photo = 'event-image/sample1.png';
        $event->time = '07:30';
        $event->date = '2023-02-10';
        $event->address = '370 Đường 02 tháng 9, Quận Hải Châu, Đà Nẵng';
        $event->link = 'https://www.google.com/maps/place/Nh%C3%A0+H%C3%A0ng+Ti%E1%BB%87c+C%C6%B0%E1%BB%9Bi+Ph%C3%BAc+Gia/@16.0386843,108.2208223,16z/data=!4m9!1m2!2m1!1zMzcwIMSQxrDhu51uZyAwMiB0aMOhbmcgOSwgUXXhuq1uIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZw!3m5!1s0x314219e8511b2333:0x7dfc73b1e9718eec!8m2!3d16.0387611!4d108.2234015!15sCjozNzAgxJDGsOG7nW5nIDAyIHRow6FuZyA5LCBRdeG6rW4gSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nWjoiODM3MCDEkcaw4budbmcgMDIgdGjDoW5nIDkgcXXhuq1uIGjhuqNpIGNow6J1IMSRw6AgbuG6tW5nkgEKcmVzdGF1cmFudA';
        $event->save();
        
        $event = new Event;
        $event->user_web_id	 = $userWebId;
        $event->name = 'TIỆC CƯỚI NHÀ NỮ';
        $event->photo = 'event-image/sample2.png';
        $event->time = '11:30';
        $event->date = '2023-02-10';
        $event->address = '187 Hà Huy Tập, P. Hoà Khê, Quận Thanh Khê, Đà Nẵng';
        $event->link = 'https://www.google.com/maps/place/Nh%C3%A0+H%C3%A0ng+Ti%E1%BB%87c+C%C6%B0%E1%BB%9Bi+Ph%C3%BAc+Gia/@16.0386843,108.2208223,16z/data=!4m9!1m2!2m1!1zMzcwIMSQxrDhu51uZyAwMiB0aMOhbmcgOSwgUXXhuq1uIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZw!3m5!1s0x314219e8511b2333:0x7dfc73b1e9718eec!8m2!3d16.0387611!4d108.2234015!15sCjozNzAgxJDGsOG7nW5nIDAyIHRow6FuZyA5LCBRdeG6rW4gSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nWjoiODM3MCDEkcaw4budbmcgMDIgdGjDoW5nIDkgcXXhuq1uIGjhuqNpIGNow6J1IMSRw6AgbuG6tW5nkgEKcmVzdGF1cmFudA';
        $event->save();

        $event = new Event;
        $event->user_web_id	 = $userWebId;
        $event->name = 'LỄ CƯỚI NHÀ NAM';
        $event->photo = 'event-image/sample3.png';
        $event->time = '09:00';
        $event->date = '2023-09-12';
        $event->address = '120A Nguyễn Văn Thoại, Quận Ngũ Hành Sơn, Đà Nẵng';
        $event->link = 'https://www.google.com/maps/place/Nh%C3%A0+H%C3%A0ng+Ti%E1%BB%87c+C%C6%B0%E1%BB%9Bi+Ph%C3%BAc+Gia/@16.0386843,108.2208223,16z/data=!4m9!1m2!2m1!1zMzcwIMSQxrDhu51uZyAwMiB0aMOhbmcgOSwgUXXhuq1uIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZw!3m5!1s0x314219e8511b2333:0x7dfc73b1e9718eec!8m2!3d16.0387611!4d108.2234015!15sCjozNzAgxJDGsOG7nW5nIDAyIHRow6FuZyA5LCBRdeG6rW4gSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nWjoiODM3MCDEkcaw4budbmcgMDIgdGjDoW5nIDkgcXXhuq1uIGjhuqNpIGNow6J1IMSRw6AgbuG6tW5nkgEKcmVzdGF1cmFudA';
        $event->save();

        $event = new Event;
        $event->user_web_id	 = $userWebId;
        $event->name = 'TIỆC CƯỚI NHÀ NAM';
        $event->photo = 'event-image/sample4.png';
        $event->time = '12:00';
        $event->date = '2023-09-12';
        $event->address = 'A30 Trần Hưng Đạo, P. An Hải Tây, Quận Sơn Trà, Đà Nẵng';
        $event->link = 'https://www.google.com/maps/place/Nh%C3%A0+H%C3%A0ng+Ti%E1%BB%87c+C%C6%B0%E1%BB%9Bi+Ph%C3%BAc+Gia/@16.0386843,108.2208223,16z/data=!4m9!1m2!2m1!1zMzcwIMSQxrDhu51uZyAwMiB0aMOhbmcgOSwgUXXhuq1uIEjhuqNpIENow6J1LCDEkMOgIE7hurVuZw!3m5!1s0x314219e8511b2333:0x7dfc73b1e9718eec!8m2!3d16.0387611!4d108.2234015!15sCjozNzAgxJDGsOG7nW5nIDAyIHRow6FuZyA5LCBRdeG6rW4gSOG6o2kgQ2jDonUsIMSQw6AgTuG6tW5nWjoiODM3MCDEkcaw4budbmcgMDIgdGjDoW5nIDkgcXXhuq1uIGjhuqNpIGNow6J1IMSRw6AgbuG6tW5nkgEKcmVzdGF1cmFudA';
        $event->save();
    }
    public function createLoveStory(string $userWebId){
        $loveStory = new LoveStory;
        $loveStory->title = "Bạn có tin vào tình yêu online không?";
        $loveStory->user_web_id	 = $userWebId;
        $loveStory->date = "December 12 2015";
        $loveStory->content = "Tôi đã từng không tin vào tình yêu online. Đã từng nghĩ làm sao có thể thích một người chưa từng gặp mặt? Vậy mà giờ đây tôi lại đang như vậy, bây giờ tôi đã hiểu: thế giới ảo tình yêu thật đấy!!! Ngày ấy vu vơ đăng một dòng status trên facebook than thở, vu vơ đùa giỡn nói chuyện với một người xa lạ chưa từng quen. Mà nào hay biết, 4 năm sau người ấy lại là chồng mình.";
        $loveStory->photo = "lovestory-image/sample1.jpeg";
        $loveStory->save();

        $loveStory = new LoveStory;
        $loveStory->title = "Phút giây cầu hôn";
        $loveStory->user_web_id	 = $userWebId;
        $loveStory->date = "May 10 2018";
        $loveStory->content = "5 năm bên nhau không phải là quãng thời gian quá dài, nhưng đủ cho chúng ta nhận ra được rất nhiều điều. Yêu nhau, vun vén hạnh phúc và cùng nỗ lực vượt qua những khó khăn trong cuộc sống. Chúng ta từ 2 con người xa lạ mà bước vào cuộc đời nhau. Và giờ đây chúng ta tiếp tục cùng nhau sang trang mới. Giây phút anh ngỏ lời “Làm vợ anh nhé!”, em đã nguyện ý đời này, đi đâu cũng được, miễn là cùng anh.";
        $loveStory->photo = "lovestory-image/sample2.jpeg";
        $loveStory->save();
    }
}
