<?php

namespace App\Http\Controllers;

use App\Imports\LocationDataImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\Tags;
use Illuminate\Support\Facades\Validator;
use App\Models\Itineraries;
use App\Models\User;
use App\Models\Favorites;
use Illuminate\Support\Str;
use App\Models\ItineraryDays;
use App\Models\ItineraryActivities;
use App\Models\ForgotPasswordCode;
use Session;
use Mail;
use App\Mail\UserForgotPasswordEmail;
use App\Mail\SubscribeNewsletter;
use Hash;
use App\Models\LikeDislike;
use App\Models\ItineraryGallery;
use App\Models\ItineraryLocations;
use App\Models\HomeSetting;
use App\Models\Subscription;
use App\Models\CrudPages;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index()
    {
        $itineraries = Itineraries::where('featured','1')
        ->where('status','published')
        ->where('itinerary_status','updated')
        ->get();
        $tags = Tags::get();
        $users = User::where('featured', 'true')->limit('6')->get();
        $users_mobile = User::where('featured', 'true')->limit('5')->get();

        return view('frontend.pages.home')->with('itineraries', $itineraries)->with("tagsdata")->with('user')->with('users', $users)->with('users_mobile', $users_mobile)->with('tags', $tags);
    }

    public function term_of_use()
    {
        $pages = CrudPages::where('slug','term-of-use')->first();

        return view('frontend.pages.term_of_use')->with('pages', $pages);
    }

    public function privacy_policy()
    {
        $pages = CrudPages::where('slug','privacy-policy')->first();

        return view('frontend.pages.privacy_policy')->with('pages', $pages);
    }

    public function username($username = '')
    {
        $tagsnames = array();
        if(!empty($username)) {
            $user = User::where('username', $username)->with('favorites.itineraries')->first();
            $itineraries = $user->itineraries->where('itinerary_status','updated')->where('status','published');
            $alltags = Tags::get();

            foreach($itineraries as $itineraries)
            {
                if($itineraries->tags != '')
                {
                    $itineraryTagIds = json_decode($itineraries->tags);
                    foreach ($alltags as $itinerarytag){
                        if (in_array($itinerarytag->id, $itineraryTagIds)){
                            array_push($tagsnames,$itinerarytag);
                        }
                    }
                }
            }

            $itineraries = $user->itineraries->where('itinerary_status','updated')->where('status','published');

            $singletag = array_unique($tagsnames);

            if($user->count() >  0) {
                return view('frontend.pages.profile', compact('user','itineraries','singletag'));
            } else {
                abort(403);
            }

        } else {
            abort(403);
        }

    }
    public function itinerary($slug)
    {
        $itinerary = Itineraries::where('itinerary_status','updated')->where('status','published')->where('slug',$slug)->first();

        $days = $itinerary->itinerarydays;
        $related_itinerary = Itineraries::where('itinerary_status','updated')->where('status','published')->where('slug','!=',$slug)->limit(5)->get();
        $itinerary_gallery = ItineraryGallery::where('itineraryid','=',$itinerary->id)->get();
        $alltags = Tags::get();
        return view('frontend.pages.single-itinerary',compact('itinerary','related_itinerary','days','itinerary_gallery','alltags'));
    }

    public function getcomments(Request $request)
    {
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $itineraryid = $request->input('itineraryid');

        $output = '';

        $itinerarycomment = Comment::where('itineraries_id',$itineraryid)->offset($offset)->limit($limit)->get();
        if($itinerarycomment)
        {
            foreach($itinerarycomment as $comment)
            {
                $output .=
                '
                <div class="d-flex flex-row py-4 mt-4 border-top-line comment-row">
                    <div class="pe-3">
                ';
                if(!empty($comment->user->profile))
                {
                    $output .=
                    '
                    <img src="'.asset("frontend/profile_pictures/" . $comment->user->profile).'" alt="user-image" width="48px" height="48px" class="rounded-circle">
                    ';
                }
                else
                {
                    $output .=
                    '
                    <img src="'.asset("frontend/profile_pictures/avatar.png").'" alt="user-image" width="48px" height="48px" class="rounded-circle">
                    ';
                }
                $output .=
                '
                    </div>
                    <div class="comment-text w-100">
                        <div class=" d-flex align-items-center mb-2 mt-3 flex-wrap ">
                            <div class="fs-20-300 me-2">
                ';
                        $output .= $comment->user->name;
                        $output .= $comment->user->last_name;
                $output .=
                '
                            </div>
                            <div class="vr d-none d-sm-block ">
                            </div>
                            <div class="ms-2 time-left text-capitalize  ">
                ';
                        $output .= $comment->created_at->diffForHumans();
                $output .=
                '
                            </div>
                        </div>
                        <span class="m-b-15 fs-16-300 d-block mt-1">
                ';
                        $output .= $comment->body;
                $output .=
                '
                        </span>
                        <div class="comment-footer">
                            <div class="d-flex gap-12p mt-3">
                ';
                if(auth('user')->id() != '')
                {
                    $output .=
                    '
                        <div class="">
                    ';
                        if(count($comment->likesDislikes) > 0)
                        {
                            foreach($comment->likesDislikes as $likeDislike)
                            {
                                if ($likeDislike->type == 'like')
                                {
                                    $output .=
                                    '
                                    <a href="javascript:;" data-role="changecommentstatus" data-value="'.$likeDislike->type.'" data-id="'.$likeDislike->id.'" data-id1="0" class="btn btn-transparent">
                                        <img src="'.asset("frontend/images/liked.svg").'" alt="">
                                    </a>
                                    ';
                                }
                                else
                                {
                                    $output .=
                                    '
                                    <a href="javascript:;" data-role="changecommentstatus" data-value="'.$likeDislike->type.'" data-id="'.$likeDislike->id.'" data-id1="0" class="btn btn-transparent">
                                        <img src="'.asset("frontend/images/Like Animation.png").'" alt="">
                                    </a>
                                    ';
                                }
                            }
                        }
                        else
                        {
                            $output .=
                            '
                            <a href="javascript:;" data-role="changecommentstatus" data-value="firstlike" data-id="0" data-id1="'.$comment->id.'" class="btn btn-transparent">
                                <img src="'.asset("frontend/images/Like Animation.png").'" alt="">
                            </a>
                            ';
                        }
                    $output .=
                    '
                        </div>
                        <div class="">
                    ';
                        if(count($comment->likesDislikes) > 0)
                        {
                            foreach($comment->likesDislikes as $likeDislike)
                            {
                                if ($likeDislike->type == 'dislike')
                                {
                                    $output .=
                                    '
                                    <a href="javascript:;" data-role="changecommentstatus" data-value="'.$likeDislike->type.'" data-id="'.$likeDislike->id.'" data-id1="0" class="btn btn-transparent">
                                        <img src="'.asset("frontend/images/disliked.svg").'" alt="">
                                    </a>
                                    ';
                                }
                                else
                                {
                                    $output .=
                                    '
                                    <a href="javascript:;" data-role="changecommentstatus" data-value="'.$likeDislike->type.'" data-id="'.$likeDislike->id.'" data-id1="0" class="btn btn-transparent">
                                        <img src="'.asset("frontend/images/Dislike Animation.png").'" alt="">
                                    </a>
                                    ';
                                }
                            }
                        }
                        else
                        {
                            $output .=
                            '
                            <a href="javascript:;" data-role="changecommentstatus" data-value="firstdislike" data-id="0" data-id1="'.$comment->id.'" class="btn btn-transparent">
                                <img src="'.asset("frontend/images/Dislike Animation.png").'" alt="">
                            </a>
                            ';
                        }
                    $output .=
                    '
                        </div>
                    ';
                }
                else
                {
                    $output .=
                    '
                    <div class="">
                        <a href="javascript:;" onclick="return alert("Please Login your self before doing action")" class=" btn-transparent">
                            <img src="{{ asset("frontend/images/Like Animation.png") }}" alt="">
                        </a>
                    </div>
                    <div class="">
                        <a href="javascript:;" onclick="return alert("Please Login your self before doing action")" class=" btn-transparent">
                            <img src="{{ asset("frontend/images/Dislike Animation.png") }}" alt="">
                        </a>
                    </div>
                    ';
                }
                $output .=
                '
                            </div>
                        </div>
                    </div>
                </div>
                ';
            }
        }
        // echo json_encode($done);

        echo $output;

        // return view('frontend.pages.single-itinerary',compact('itinerary','related_itinerary','days','itinerary_gallery'));
    }

    public function getcommentscount(Request $request)
    {
        $itineraryid = $request->input('itineraryid');

        $output = '';

        $itinerarycomment = Comment::where('itineraries_id',$itineraryid)->get();

        echo count($itinerarycomment);
    }

    public function changecommentstatus(Request $request)
    {
        $likedislike = $request->input('likedislike');
        $comment = $request->input('comment');
        $value = $request->input('value');

        if($comment != 0)
        {
            $check = LikeDislike::where('comment_id',$comment)->first();
            if(!empty($check))
            {
                $var = LikeDislike::find($check->id);
                if($value == 'firstlike')
                {
                    $var->type = 'like';
                }
                if($value == 'firstdislike')
                {
                    $var->type = 'dislike';
                }
                $var->save();
            }
            else
            {
                $var = new LikeDislike;
                $var->user_id = Auth::guard('user')->user()->id;
                $var->comment_id = $comment;
                if($value == 'firstlike')
                {
                    $var->type = 'like';
                }
                if($value == 'firstdislike')
                {
                    $var->type = 'dislike';
                }
                $var->save();
            }
        }

        if($likedislike != 0)
        {
            $var = LikeDislike::find($likedislike);
            $var->type = $value;
            if($value == 'like')
            {
                $var->type = 'dislike';
            }
            if($value == 'dislike')
            {
                $var->type = 'like';
            }
            $var->save();
        }

        echo 'success';
    }

    public function itineraries()
    {
        $tagsnames = array();
        $smallestnumber = Itineraries::min('duration');
        $largestnumber = Itineraries::max('duration');
        $itinerary = Itineraries::where('itinerary_status','updated')->where('status','published')->paginate(15);
        $filter = Itineraries::where('itinerary_status','updated')->where('status','published')->groupBy('location_id')->get();

        $alltags = Tags::get();
        foreach($filter as $itineraries)
        {
            if($itineraries->tags != '')
            {
                $itineraryTagIds = json_decode($itineraries->tags);
                foreach ($alltags as $itinerarytag){
                    if (in_array($itinerarytag->id, $itineraryTagIds)){
                        array_push($tagsnames,$itinerarytag);
                    }
                }
            }
        }
        $tags = array_unique($tagsnames);
        $user_filter = User::get();

        return view('frontend.pages.itineraries',compact('itinerary','filter','tags','user_filter','smallestnumber','largestnumber','alltags'));
    }


    public function filteritineraries(Request $request)
    {
        // var_dump($request->all());
        // dd($request->all());
        $tagsfilter = $request->tags;
        $usersfilter = $request->users;
        $locationfilter = $request->location;
        $daysrange = $request->daysrange;

        $page = $request->page;
        $limit = $request->input('limit', 15); // Custom items per page, default is 15
        $offset = $request->input('offset', $page); // Custom page number offset, default is 0

        $total = Itineraries::count();

        $tagsnames = array();
        $smallestnumber = Itineraries::min('duration');
        $largestnumber = Itineraries::max('duration');

        $total = Itineraries::where('itinerary_status', 'updated')
        ->where('status', 'published');
        if (!empty($tagsfilter)) {
            $total->whereJsonContains('tags', $tagsfilter);
        }
        if (!empty($usersfilter)) {
            $total->WhereIn('user_id', $usersfilter);
        }
        if (!empty($locationfilter)) {
            $total->WhereIn('location_id', $locationfilter);
        }
        if (!empty($daysrange)) {
            $range = ['0',$daysrange];
            $total->whereBetween('duration', $range);
        }
        $total = $total->count();

        $itinerary = Itineraries::where('itinerary_status', 'updated')
        ->where('status', 'published');
        if (!empty($tagsfilter)) {
            $itinerary->whereJsonContains('tags', $tagsfilter);
        }
        if (!empty($usersfilter)) {
            $itinerary->WhereIn('user_id', $usersfilter);
        }
        if (!empty($locationfilter)) {
            $itinerary->WhereIn('location_id', $locationfilter);
        }
        if (!empty($daysrange)) {
            $range = ['0',$daysrange];
            $itinerary->whereBetween('duration', $range);
        }
        $itinerary = $itinerary->offset($offset * $limit)->limit($limit)->get();


        $filterdata = Itineraries::where('itinerary_status','updated')->where('status','published')->get();
        $alltags = Tags::get();
        foreach($filterdata as $itineraries)
        {
            if($itineraries->tags != '')
            {
                $itineraryTagIds = json_decode($itineraries->tags);
                foreach ($alltags as $itinerarytag){
                    if (in_array($itinerarytag->id, $itineraryTagIds)){
                        array_push($tagsnames,$itinerarytag);
                    }
                }
            }
        }
        $tags = array_unique($tagsnames);
        $user_filter = User::get();

        $filteredlocations = array();
        if(!empty($locationfilter)):
        $filteredlocations = Itineraries::where('itinerary_status','updated')->where('status','published')->whereIn('location_id',$locationfilter)->groupBy('location_id')->get();
        endif;
        $filter = Itineraries::where('itinerary_status','updated')->where('status','published')->groupBy('location_id')->get();


        $filteredusers = array();
        if(!empty($usersfilter)):
        $filteredusers = Itineraries::where('itinerary_status','updated')->where('status','published')->whereIn('user_id',$usersfilter)->groupby('user_id')->get();
        endif;

        // $data = [];

        // $data['itineraries'] =  view('frontend.partials.itineraries-filter',compact('itinerary','filter','tags','user_filter','smallestnumber','largestnumber', 'tagsfilter','usersfilter','locationfilter','daysrange','filteredlocations','filteredusers'));
        // $data['response'] = 'sucess';

        // return json_encode($data);
        // return view('frontend.pages.itineraries',compact('itinerary','filter','tags','user_filter','smallestnumber','largestnumber', 'tagsfilter','usersfilter','locationfilter','daysrange','filteredlocations','filteredusers'));
        return view('frontend.partials.itineraries-filter',compact('itinerary','filter','tags','user_filter','smallestnumber','largestnumber', 'tagsfilter','usersfilter','locationfilter','daysrange','filteredlocations','filteredusers','total', 'limit', 'offset','alltags'));

    }


    public function slug_itineraries($slug)
    {
        $tag = Tags::where('slug',$slug)->first();
        if(!empty($tag))
        {
            $itineraries = Itineraries::where('itinerary_status','updated')
            ->where('status','published')
            ->whereJsonContains('tags',json_encode($tag->id))
            ->paginate(16);
            // ->get();

            // dd($itineraries);
            $alltags = Tags::get();

            return view('frontend.pages.slug-itineraries',compact('itineraries','alltags'));
        }
        else
        {
            return back()->with('error','Invalid Tag');
        }
    }

    public function favourites(Request $request)
    {
        $output = array();
        $id = $request->input('id');

        $query = Favorites::where('user_id',Auth::guard('user')->user()->id)
        ->where('itineraries_id',$id)->get();
        if(count($query) == 1)
        {
            $output['error'] = 'Already in List';
        }
        else
        {
            $arr = new Favorites;
            $arr->user_id = Auth::guard('user')->user()->id;
            $arr->itineraries_id = $id;

            $arr->save();

            $output['success'] = 'Added Successfully';
        }

        echo json_encode($output);
    }

    public function removefavourites(Request $request)
    {
        $output = array();
        $id = $request->input('id');

        $query = Favorites::where('user_id',Auth::guard('user')->user()->id)
        ->where('itineraries_id',$id)->delete();

        $output['success'] = 'Deleted Successfully';

        echo json_encode($output);
    }

    public function create_itinerary()
    {

        $query = Itineraries::where('user_id',Auth::guard('user')->user()->id)
        ->where('itinerary_status',NULL)
        ->get();
        if(count($query) == 1)
        {
            foreach($query as $query);

            return redirect('/edit-itinerary/'.$query->id);
        }
        else
        {

            $array = new Itineraries;
            $array->title = '';
            $array->slug = '';
            $array->user_id = Auth::guard('user')->user()->id;
            $array->save();

            $array = Itineraries::find($array->id);
            $array->slug = 'itinerary-'.$array->id;
            $array->save();

            return redirect('/edit-itinerary/'.$array->id);
        }
        // $tags = Tags::get();
        // $itinerary = array();
        // $related_itinerary = Itineraries::limit(6)->get();

        // return view('frontend.pages.create-itinerary',compact('tags','itinerary','related_itinerary'));
    }

    public function itineraries_store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $data = $request->input();

            $slug = Str::slug($data['title'],'-');
            $slugExists = Itineraries::where('slug', $slug)->exists();
            $originalSlug = $slug;
            $counter = 1;

            while ($slugExists) {
                $slug = $originalSlug . '-' . $counter;
                $slugExists = Itineraries::where('slug', $slug)->exists();
                $counter++;
            }



            $array = new Itineraries;
            $array->title = $data['title'];
            $array->slug = $slug;
            $array->description = $data['description'];
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->duration = $data['duration'];
            $array->website = $data['website'];
            $array->user_id = auth('user')->user()->id;
            $array->itinerary_status = 'updated';

            $array->save();



            for($i=0;$i<$data['duration'];$i++)
            {
                $array1 = new ItineraryDays;
                $array1->itineraries_id = $array->id;
                $array1->save();
            }

        }

        // Logic for storing the data goes here...
        return redirect('/edit-itinerary/'.$array->id)->with('successitinerary','Saved Successfully');
    }

    public function edit_itinerary($itineraryid)
    {
        $tags = Tags::get();
        $itinerary = Itineraries::where('id',$itineraryid)->where('user_id', Auth::guard('user')->user()->id)->first();

        $related_itinerary = Itineraries::where('id','!=',$itineraryid)->limit(5)->get();
        $days = ItineraryDays::where('itineraries_id',$itineraryid)->get();
        $itinerary_gallery = ItineraryGallery::where('itineraryid','=',$itineraryid)->get();
        $itinerary_location = ItineraryLocations::get();
        $alltags = Tags::get();
        return view('frontend.pages.create-itinerary',compact('itinerary_location','itinerary','itineraryid','tags','days','related_itinerary','itinerary_gallery','alltags'));
    }

    public function delete_itinerary(Request $request)
    {
        $itineraryid = $request->id;

        $itinerary = Itineraries::where('id',$itineraryid)->where('user_id', auth('user')->user()->id);
        $output = [];
        if($itinerary) {
            $itinerary->delete();
            Comment::where('itineraries_id',$itineraryid)->delete();
            Favorites::where('itineraries_id',$itineraryid)->delete();
            ItineraryDays::where('itineraries_id',$itineraryid)->delete();
            ItineraryActivities::where('itineraries_id',$itineraryid)->delete();
            ItineraryGallery::where('itineraryid',$itineraryid)->delete();

            $output['success'] = 'Itinerary Deleted Successfully';
            echo json_encode($output);
        } else {
            $output['error'] = 'Invalid Itinerary';
            echo json_encode($output);
        }


    }

    public function itineraries_update(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        else{
            $data = $request->input();

            $slug = Str::slug($data['title'],'-');
            $slugExists = Itineraries::where('slug', $slug)->exists();
            $originalSlug = $slug;
            $counter = 1;

            while ($slugExists) {
                $slug = $originalSlug . '-' . $counter;
                $slugExists = Itineraries::where('slug', $slug)->exists();
                $counter++;
            }


            $array = Itineraries::find($data['id']);
            // dd($array->itinerarydays->count());
            $array->title = $data['title'];
            $array->slug = $slug;
            $array->description = $data['description'];
            $array->tags = json_encode($data['tags']);
            $array->duration = $data['duration'];
            $array->website = $data['website'];
            $array->featured = '1';
            $array->visibility = $data['visibility'];
            $array->itinerary_status = 'updated';
            $array->location_id = $data['address_street'];
            $array->save();

            if($array->itinerarydays->count() < $data['duration'] ){
                for ($i=$array->itinerarydays->count(); $i < $data['duration']; $i++) {
                    # code...
                    // echo $i."<br>";
                    $array1 = new ItineraryDays;
                    $array1->itineraries_id = $array->id;
                    $array1->save();
                }
            }

        }

        // Logic for storing the data goes here...
        return redirect('/edit-itinerary/'.$array->id)->with('success','Saved Successfully');
    }

    public function create_itinerary_day($itineraryid)
    {
        $array1 = new ItineraryDays;
        $array1->itineraries_id = $itineraryid;
        $array1->save();

        $days = ItineraryDays::where('itineraries_id', $itineraryid)->count();

        $daysupdate = itineraries::find($itineraryid);

        $daysupdate->duration = $days;
        $daysupdate->save();

        return redirect('/edit-itinerary/'.$itineraryid)->with('success','Added Successfully');
    }

    public function deleteday($id,$itineraryid)
    {
        ItineraryDays::where('id',$id)->delete();
        ItineraryActivities::where('days_id',$id)->delete();

        $days = ItineraryDays::where('itineraries_id', $itineraryid)->count();

        $daysupdate = itineraries::find($itineraryid);
        $daysupdate->duration = $days;
        $daysupdate->save();


        return redirect('/edit-itinerary/'.$itineraryid)->with('success','Deleted Successfully');

    }

    public function showdaysactivities(Request $request)
    {
        $output= '';
        $itineraryid = $request->itineraryid;
        $daysid = $request->daysid;

        $query = ItineraryActivities::where('itineraries_id',$itineraryid)
        ->where('days_id',$daysid)
        ->get();
        if(!empty($query))
        {
            $output .=
            '
            <div class="accordion" id="accordionExample">
            ';
            foreach($query as $key => $query)
            {
                $count = ++$key;
                $output .=

                '
                <div class="accordion-item focus-bt border-0">
                    <h2 class="accordion-header" id="headingOne'.$count.'">
                        <button class="accordion-button d-block py-2 shadow-none " href="javascript:;" data-role="changecommentstatus" data-bs-toggle="collapse" data-bs-target="#collapseOne'.$count.'" aria-expanded="true" aria-controls="collapseOne'.$count.'">
                            <div class="row border rounded-pill ">
                                <div class="d-flex justify-content-between py-1 align-items-center">
                                    <div class="m-0 activitytitle fs-16-300 black-300">'.'Activity - '.$count.' '.$query->title.'</div>
                                    <a href="javascript:void(0)" class="bg-transparent border-0" >
                                        <img class="w-75" src="'.asset("frontend/images/editbt.png").'" alt="">
                                    </a>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapseOne'.$count.'" class="accordion-collapse collapse locationModal" aria-labelledby="headingOne'.$count.'" data-bs-parent="#accordionExample">
                        <div class="accordion-body p-0">
                            <form action="#" class="">
                                <div class="px-3">
                                    <div class="bg-activity rounded-2 p-2 mt-2 mb-2">
                                        <div class="mb-3 ">
                                            <div class="mb-3 d-flex gap-1 flex-wrap">
                                                <div class="">
                                                    <label class="form-label fs-16-700">Title</label>
                                                    <input type="text" class="form-control rounded-pill fs-16-300 black-300" name="activitytitle" value="'.$query->title.'" placeholder="Ex. Metropolitan Museum" aria-describedby="titleHelp">
                                                </div>
                                                <input type="hidden" name="itineraryid" value="'.$query->itineraries_id.'">
                                                <input type="hidden" name="daysid" value="'.$query->days_id.'">
                                                <input type="hidden" name="activityid" value="'.$query->id.'">
                                                <input type="hidden" name="activitydivcount" value="'.$count.'">
                                                <div class="">
                                                    <label class="form-label fs-16-700">Time</label>
                                                    <input type="time" class="form-control rounded-pill fs-16-300" value="'.$query->starttime.'" name="activitystarttime" placeholder="Ex. Metropolitan Museum" aria-describedby="timeHelp">
                                                </div>
                                                <div class=" d-flex align-items-end">
                                                    <label class="form-label fw-bold">&nbsp;</label>
                                                    <label class="form-label fw-bold px-1">
                                                        <h4 class="m-0">:</h4>
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <label class="form-label fw-bold">&nbsp;</label>
                                                    <input type="time" class="form-control rounded-pill fs-16-300 " value="'.$query->endtime.'" name="activityendtime" placeholder="Ex. Metropolitan Museum" aria-describedby="timeHelp">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="summary" class="form-label fw-bold">Summary</label>
                                            <textarea class="form-control r-10 fs-16-300 black-300" placeholder="Please add summary" name="activitydescription" id="exampleFormControlTextarea1" rows="5">'.$query->description.'</textarea>
                                        </div>
                                        <div class="mb-3 d-flex align-items-center gap-2 border rounded-pill p-2 map-focus">
                                            <img class="ps-2" src="'.asset("frontend/images/location1.png").'" alt="">
                                            <input type="text" class="form-control rounded-pill fs-16-300 black-300 map_address_field " placeholder="Add map location">
                                        </div>
                                        <div class="mb-3 d-flex justify-content-end gap-2 flex-wrap">
                                            <button class="btn btn-danger  rounded-pill fs-16-300 save-bt text-white" data-role="deleteactivity" data-id="'.$query->id.'" data-itineraryid="'.$query->itineraries_id.'" data-daysid="'.$query->days_id.'">Delete</button>
                                            <button href="javascript:;" class="btn save-bt btn-dark fs-16-300 text-white rounded-pill " data-role="btnaddactivitydb">Save</button>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                ';
            }
            $output .='</div>';
        }
        $output .=
        '
            <script>
                $(document).ready(function(){
                    function showdaysactivities(itineraryid,daysid)
                    {
                        var csrftoken = $("#csrftoken").val();
                        $.ajax({
                            url:"'.url('/showdaysactivities').'",
                            method:"post",
                            data:{_token:csrftoken,itineraryid:itineraryid,daysid:daysid},
                            success:function(data)
                            {
                                $("#showitinerariesdaysactivities"+daysid).html(data);
                            }
                        });
                    }
                    $(".btn-close").click(function(){
                        $(".activityadddivalert").hide();
                    });
                    $(document).on("click","button[data-role=btnaddactivitydb]",function(e){
                        e.preventDefault();
                        var csrftoken = $("#csrftoken").val();
                        var activitytitle  = $(this).closest("form").find("input[name=activitytitle]").val();
                        var activitystarttime = $(this).closest("form").find("input[name=activitystarttime]").val();
                        var activityendtime = $(this).closest("form").find("input[name=activityendtime]").val();
                        var activitydescription = $(this).closest("form").find("textarea[name=activitydescription]").val();
                        var itineraryid = $(this).closest("form").find("input[name=itineraryid]").val();
                        var daysid = $(this).closest("form").find("input[name=daysid]").val();
                        var activityid = $(this).closest("form").find("input[name=activityid]").val();
                        var activitydivcount = $(this).closest("form").find("input[name=activitydivcount]").val();

                        // $(this).closest(".accordion-item").find(".activitytitle").text($(this).closest(".accordion").find(".accordion-item").length + ". "+activitytitle);

                        $.ajax({
                            url:"'.url('/addactivitydbdata').'",
                            method:"post",
                            data:{_token:csrftoken,activitytitle:activitytitle,activitystarttime:activitystarttime,activityendtime:activityendtime,activitydescription:activitydescription,activityid:activityid},
                            success:function(data)
                            {
                                $("#collapseOne"+activitydivcount).slideUp();
                                showdaysactivities(itineraryid,daysid);
                                $(".activityadddivalert").show();
                                setTimeout(function(){
                                    $(".activityadddivalert").hide();
                                }, 2000)
                            }
                        });
                    });
                    $(document).on("click","button[data-role=deleteactivity]",function(e){
                        e.preventDefault();

                        var itineraryid = $(this).data("itineraryid");
                        var daysid = $(this).data("daysid");
                        var id = $(this).data("id");
                        var csrftoken = $("#csrftoken").val();
                        $.ajax({
                            url:"'.url('/deleteactivitydb').'",
                            method:"post",
                            data:{_token:csrftoken,id:id},
                            success:function(data)
                            {
                                showdaysactivities(itineraryid,daysid);
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Deleted"
                                },{
                                type: "success"
                                });

                            }
                        });
                    });
                });
            </script>
        ';
        echo $output;
    }

    public function addactivitydb(Request $request)
    {
        $itineraryid = $request->itineraryid;
        $daysid = $request->daysid;

        $activity = new ItineraryActivities;
        $activity->itineraries_id = $itineraryid;
        $activity->days_id = $daysid;
        $activity->save();
    }

    public function addactivitydbdata(Request $request)
    {
        $activitytitle = $request->activitytitle;
        $activitystarttime = $request->activitystarttime;
        $activityendtime = $request->activityendtime;
        $activitydescription = $request->activitydescription;
        $activityid = $request->activityid;

        $activity = ItineraryActivities::find($activityid);
        $activity->title = $activitytitle;
        $activity->starttime = $activitystarttime;
        $activity->endtime = $activityendtime;
        $activity->description = $activitydescription;
        $activity->save();
    }

    public function deleteactivitydb(Request $request)
    {
        $id = $request->id;

        $activity = ItineraryActivities::find($id);
        $activity->delete();
    }

    public function forgotpasswordcode(Request $request)
    {
        $output = array();
        $email = $request->input('email');

        $array = User::where('email',$email)->first();
        if(!empty($array))
        {
            $array1 = ForgotPasswordCode::where('email',$email)->first();
            if(!empty($array1))
            {
                ForgotPasswordCode::where('email',$email)->update(
                    [
                        'code'  =>  rand(999,9999)
                    ]
                );
            }
            else
            {
                $array2 = new ForgotPasswordCode;
                $array2->email = $email;
                $array2->code = rand(999,9999);
                $array2->save();
            }
            Session::put('forgotuseremail',$email);
            Mail::to($email)->send(new UserForgotPasswordEmail());
            $output['success'] = "Code sent successfully";
        }
        else
        {
            $output['error'] = "Email is not registered";
        }

        echo json_encode($output);
    }

    public function forgotpassworddb(Request $request)
    {
        // Validate the user input
        // dd($request->email);
        $rules = [
            'email' => 'required|string',
            'password' => 'required|string|min:8',
            'verify_code' => 'required|string'
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return back()->with('error','Fields Error')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();

			try{
                $array = ForgotPasswordCode::where('email',$data['email'])->first();
                if(!empty($array))
                {
                    if($array->code == $data['verify_code'])
                    {
                        User::where('email',$data['email'])->update(
                            [
                                'password'  =>  Hash::make($data['password'])
                            ]
                        );
                        return redirect()->back()->with('success',"Password Updated Successfully");
                    }
                    else
                    {
                        return redirect()->back()->with('error',"Invalid Code");
                    }
                }
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }

    public function single_itinerary_cover_upload(Request $request)
    {
        // Validate the user input
        $rules = [
            'file' => 'required|image',
		];

		$validator = Validator::make($request->all(),$rules);
		if ($validator->fails()) {
			return back()->with('error','Fields Error')
			->withInput()
			->withErrors($validator);
		}
		else{
            $data = $request->input();

			try{
                if($request->hasFile('file'))
                {
                    $seo_image = $request->file('file');
                    $input['file'] = time().'.'.$seo_image->getClientOriginalExtension();

                    $destinationPath = public_path('/frontend/itineraries');
                    $seo_image->move($destinationPath, $input['file']);

                    $array = Itineraries::find($data['id']);
                    $array->seo_image = $input['file'];
                    $array->save();

                    $url = asset('/frontend/itineraries/'.$input['file']);

                    // return redirect()->back()->with('success',"Upload Cover Successfully");

                    $response = ['success' =>true,'url'=>$url];
                    return response()->json($response);

                }
                else
                {
                    $response = ['success' =>false];
                    return response()->json($response);
                    // return redirect()->back()->with('error',"Uploade Image Fail");
                }
			}
			catch(Exception $e){
				return back()->with('error',"Error Occured");
			}
		}
    }

    public function single_itinerary_gallery_upload(Request $request)
    {

        // dd($request->all());
        // Validate the user input
        $request->validate([
			'file' => 'required',
		]);

		if ($request->hasfile('file'))
		{
			$image = $request->file('file');

			// foreach($images as $image) {

				$name = time().rand(1,100).'.'.$image->extension();
				$image->move(public_path('frontend/itineraries'), $name);

                $array = new ItineraryGallery;
                $array->itineraryid = $request->id;
                $array->image = $name;
                // dd($array);
                $array->save();

			// }
            $response = ['success' =>true];
            return response()->json($response);
        }
        else
        {
             $response = ['error' => 'Uploade Image Fail'];
            return response()->json($response);
            // return redirect()->back()->with('error',"Uploade Image Fail");
        }
    }

    public function delete_gallery_image($id)
    {
        ItineraryGallery::where('id',$id)->delete();

        return back()->with('success','Deleted Successfully');
    }

    public function subscription(Request $request)
    {
        $arr = new Subscription;
        $arr->email = $request->email;
        $arr->save();

        Mail::to($request->email)->send(new SubscribeNewsletter());

        return back()->with('success','You have Successfully Subscribed our Newsletter');
    }
}
