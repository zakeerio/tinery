<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tags;
use Illuminate\Support\Facades\Validator;
use App\Models\Itineraries;
use App\Models\User;
use App\Models\Favorites;
use Illuminate\Support\Str;
use App\Models\ItineraryDays;
use App\Models\ItineraryActivities;

class HomeController extends Controller
{
    public function index()
    {
        $itineraries = \App\Models\Itineraries::where('featured','1')
        ->where('status','published')
        ->get();
        $users = User::limit('8')->get();
        return view('frontend.pages.home')->with('itineraries', $itineraries)->with('user')->with('users', $users);
    }
    public function username($username = '')
    {
        if(!empty($username)) {
            $user = User::where('username', $username)->with('favorites.itineraries')->first();
            $itineraries = $user->itineraries;

            if($user->count() >  0) {
                return view('frontend.pages.profile', compact('user','itineraries'));
            } else {
                abort(403);
            }

        } else {
            abort(403);
        }

    }
    public function itinerary($slug)
    {
        $itinerary = Itineraries::where('slug',$slug)->first();
        return view('frontend.pages.single-itinerary',compact('itinerary'));
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
        $tags = Tags::get();
        $itinerary = array();
        return view('frontend.pages.create-itinerary',compact('tags','itinerary'));
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

            $array = new Itineraries;
            $array->title = $data['title'];
            $array->slug = Str::slug($data['slug']);
            $array->description = $data['description'];
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->duration = $data['duration'];
            $array->website = $data['website'];
            $array->user_id = auth('user')->user()->id;

            $array->save();

        }
        for($i=0;$i<$data['duration'];$i++)
        {
            $array1 = new ItineraryDays;
            $array1->itineraries_id = $array->id;
            $array1->save();
        }
        // Logic for storing the data goes here...
        return redirect('/edit_itinerary/'.$array->id)->with('success','Saved Successfully');
    }

    public function edit_itinerary($itineraryid)
    {
        $tags = Tags::get();
        $itinerary = Itineraries::find($itineraryid);
        $days = ItineraryDays::where('itineraries_id',$itineraryid)->get();
        return view('frontend.pages.create-itinerary',compact('itinerary','itineraryid','tags','days'));
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

            $array = Itineraries::find($data['id']);
            $array->title = $data['title'];
            $array->slug = Str::slug($data['slug']);
            $array->description = $data['description'];
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->duration = $data['duration'];
            $array->website = $data['website'];

            $array->save();

        }

        // Logic for storing the data goes here...
        return redirect('/edit_itinerary/'.$array->id)->with('success','Saved Successfully');
    }

    public function create_itinerary_day($itineraryid)
    {
        $array1 = new ItineraryDays;
        $array1->itineraries_id = $itineraryid;
        $array1->save();

        return redirect('/edit_itinerary/'.$itineraryid)->with('success','Added Successfully');
    }

    public function deleteday($id,$itineraryid)
    {
        ItineraryDays::where('id',$id)->delete();
        ItineraryActivities::where('days_id',$id)->delete();
        
        return redirect('/edit_itinerary/'.$itineraryid)->with('success','Deleted Successfully');

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
            foreach($query as $key => $query)
            {
                $count = ++$key;
                $output .=
                '
                <form action="#" class="mt-4">
                    <div class=" p-3">
                        <div class="row border rounded-pill ">
                            <div class="col-12 d-flex justify-content-between  align-items-center">
                                <p class="m-0">Activity '.$count.'</p>
                                <button type="button" class="bg-transparent border-0" data-role="deleteactivity" data-id="'.$query->id.'" data-itineraryid="'.$query->itineraries_id.'" data-daysid="'.$query->days_id.'">
                                    <img class="w-75" src="'.asset("frontend/images/cross-x.png").'" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="bg-light rounded-2 p-2 mt-2 mb-2">
                            <div class="mb-3 ">
                                <div class="mb-3 d-flex gap-1">
                                    <div class="">
                                        <label class="form-label fw-bold">Title</label>
                                        <input type="text" class="form-control rounded-pill" name="activitytitle" value="'.$query->title.'" placeholder="Ex. Metropolitan Museum" aria-describedby="titleHelp">
                                    </div>
                                    <input type="hidden" name="itineraryid" value="'.$query->itineraries_id.'">
                                    <input type="hidden" name="daysid" value="'.$query->days_id.'">
                                    <input type="hidden" name="activityid" value="'.$query->id.'">
                                    <div class="">
                                        <label class="form-label fw-bold">Time</label>
                                        <input type="time" class="form-control rounded-pill" value="'.$query->starttime.'" name="activitystarttime" placeholder="Ex. Metropolitan Museum" aria-describedby="timeHelp">
                                    </div>
                                    <div class="">
                                        <label class="form-label fw-bold">&nbsp;</label>
                                        <label class="form-label fw-bold px-1">
                                            <h4>:</h4>
                                        </label>
                                    </div>
                                    <div class="">
                                        <label class="form-label fw-bold">&nbsp;</label>
                                        <input type="time" class="form-control rounded-pill" value="'.$query->endtime.'" name="activityendtime" placeholder="Ex. Metropolitan Museum" aria-describedby="timeHelp">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="summary" class="form-label fw-bold">Summary</label>
                                <textarea class="form-control" placeholder="Please add summary" name="activitydescription" id="exampleFormControlTextarea1" rows="5">'.$query->description.'</textarea>
                            </div>
                            <div class="mb-3 d-flex align-items-center gap-2 border rounded-pill p-2">
                                <img src="'.asset("frontend/images/location1.png").'" alt="">
                                <p class="text-center m-0">Add map location</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn save-bt btn-dark rounded-pill float-end " data-role="btnaddactivitydb">Save</button>
                        </div>
                    </div>
                </form>
                ';
            }
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
                        $.ajax({
                            url:"'.url('/addactivitydbdata').'",
                            method:"post",
                            data:{_token:csrftoken,activitytitle:activitytitle,activitystarttime:activitystarttime,activityendtime:activityendtime,activitydescription:activitydescription,activityid:activityid},
                            success:function(data)
                            {
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Updated"
                                },{
                                type: "success"
                                });
                            }
                        });
                    });
                    $(document).on("click","button[data-role=deleteactivity]",function(e){
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
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Deleted"
                                },{
                                type: "success"
                                });
                                showdaysactivities(itineraryid,daysid);
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
}
