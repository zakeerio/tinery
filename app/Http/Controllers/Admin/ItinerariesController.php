<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use App\Models\Itineraries;
use App\Models\User;
use App\Models\Tags;
use App\Models\ItineraryDays;
use App\Models\ItineraryActivities;


class ItinerariesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        \View::share('nav', 'dashboard');
        // dd("test");

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->setPageTitle("Itineraries","Itineraries List");
        $itineraries = Itineraries::get();
        return view('admin.itineraries.index',compact('itineraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createload()
    {
        return redirect()->route('admin.itineraries.create',['id'   =>  rand(999,999999)]);
    }

    public function create()
    {
        $tempid = $_GET['id'];
        $authors = User::get();
        $tags = Tags::get();
        $this->setPageTitle("Itineraries","Itineraries List");
        return view('admin.Itineraries.create',compact('authors','tags','tempid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'tags' => 'required|array',
            'address_street' => 'nullable|string|max:255',
            'address_street_line1' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_state' => 'nullable|string|max:255',
            'address_zipcode' => 'nullable|string|max:255',
            'address_country' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'additional_info' => 'nullable|string',
            'featured' => 'nullable|in:0,1',
            'visibility' => 'required|in:public,private',
            'status' => 'required|in:published,draft',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field cannot be longer than 255 characters.',
            'description.required' => 'The description field is required.',
            'user_id.required' => 'The author field is required.',
            'tags.required' => 'The tags field is required.',
            'visibility.required' => 'The visibility field is required.',
            'visibility.in' => 'The visibility field must be either "public" or "private".',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status field must be either "published" or "draft".',
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
            // $array->slug = $data['slug'];
            $array->slug = Str::slug($data['slug'], '-');


            $array->description = $data['description'];
            $array->excerpt = $data['excerpt'];
            $array->seo_title = $data['seo_title'];
            $array->seo_description = $data['seo_description'];
            $array->user_id = $data['user_id'];
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->address_street_line1 = $data['address_street_line1'];
            $array->address_city = $data['address_city'];
            $array->address_state = $data['address_state'];
            $array->address_zipcode = $data['address_zipcode'];
            $array->address_country = $data['address_country'];
            $array->latitude = $data['latitude'];
            $array->longitude = $data['longitude'];
            $array->phone = $data['phone'];
            $array->website = $data['website'];
            $array->additional_info = $data['additional_info'];
            $array->featured = $data['featured'];
            $array->visibility = $data['visibility'];
            $array->status = $data['status'];

            if($request->hasFile('seo_image'))
            {
                $seo_image = $request->file('seo_image');
                $input['seo_image'] = time().'.'.$seo_image->getClientOriginalExtension();

                $destinationPath = public_path('/frontend/itineraries');
                $seo_image->move($destinationPath, $input['seo_image']);

                $array->seo_image = $input['seo_image'];
            }

            $array->save();

            ItineraryDays::where('itineraries_id',$data['tempid'])
            ->update(
                [
                    'itineraries_id'    =>  $array->id,
                    'tempid'    =>  ''
                ]
            );
            ItineraryActivities::where('itineraries_id',$data['tempid'])
            ->update(
                [
                    'itineraries_id'    =>  $array->id,
                    'tempid'    =>  ''
                ]
            );
        }
        // Logic for storing the data goes here...

        // return redirect()->route('admin.Itineraries.index')->with('success', 'Post created successfully.');
        return $this->responseRedirect('admin.itineraries.index', 'Itinerary Created successfully.', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //

        // dd($slug);

        $this->setPageTitle("Itineraries","Itineraries List");
        $itineraries = Itineraries::get();
        return view('admin.itineraries.index',compact('itineraries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = User::get();
        $tags = Tags::get();

        $this->setPageTitle("Itineraries","Itineraries Edit");
        $itineraries = Itineraries::find($id);
        return view('admin.itineraries.edit',compact('itineraries','authors','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
            'tags' => 'required|array',
            'address_street' => 'nullable|string|max:255',
            'address_street_line1' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_state' => 'nullable|string|max:255',
            'address_zipcode' => 'nullable|string|max:255',
            'address_country' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'longitude' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'website' => 'nullable|string|max:255',
            'additional_info' => 'nullable|string',
            'featured' => 'nullable|in:0,1',
            'visibility' => 'required|in:public,private',
            'status' => 'required|in:published,draft',
        ];

        $messages = [
            'title.required' => 'The title field is required.',
            'title.max' => 'The title field cannot be longer than 255 characters.',
            'description.required' => 'The description field is required.',
            'user_id.required' => 'The author field is required.',
            'tags.required' => 'The tags field is required.',
            'visibility.required' => 'The visibility field is required.',
            'visibility.in' => 'The visibility field must be either "public" or "private".',
            'status.required' => 'The status field is required.',
            'status.in' => 'The status field must be either "published" or "draft".',
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

            $array = Itineraries::find($id);
            $array->title = $data['title'];
            $array->slug = Str::slug($data['slug'], '-');

            $array->description = $data['description'];
            $array->excerpt = $data['excerpt'];
            $array->seo_title = $data['seo_title'];
            $array->seo_description = $data['seo_description'];
            $array->user_id = $data['user_id'];
            $array->tags = json_encode($data['tags']);
            $array->address_street = $data['address_street'];
            $array->address_street_line1 = $data['address_street_line1'];
            $array->address_city = $data['address_city'];
            $array->address_state = $data['address_state'];
            $array->address_zipcode = $data['address_zipcode'];
            $array->address_country = $data['address_country'];
            $array->latitude = $data['latitude'];
            $array->longitude = $data['longitude'];
            $array->phone = $data['phone'];
            $array->website = $data['website'];
            $array->additional_info = $data['additional_info'];
            $array->featured = $data['featured'];
            $array->visibility = $data['visibility'];
            $array->status = $data['status'];

            if($request->hasFile('seo_image'))
            {
                $seo_image = $request->file('seo_image');
                $input['seo_image'] = time().'.'.$seo_image->getClientOriginalExtension();

                $destinationPath = public_path('/frontend/itineraries');
                $seo_image->move($destinationPath, $input['seo_image']);

                $array->seo_image = $input['seo_image'];
            }

            $array->save();

            ItineraryDays::where('itineraries_id',$id)
            ->update(
                [
                    'tempid'    =>  ''
                ]
            );
            ItineraryActivities::where('itineraries_id',$id)
            ->update(
                [
                    'tempid'    =>  ''
                ]
            );
        }
        // Logic for storing the data goes here...
        return $this->responseRedirect('admin.itineraries.index', 'Itinerary Updated successfully.', 'success');


        // return redirect()->route('admin.itineraries.index')->with('success', 'Itinerary Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($itinerary)
    {
        // dd($itinerary);
        $itinerary = Itineraries::findOrFail($itinerary);
        $itinerary->delete();

        return $this->responseRedirect('admin.itineraries.index', 'Itinerary deleted successfully', 'success');

        // return redirect()->route('admin.itineraries.index')->with('success', 'Itinerary deleted successfully');
    }

    public function additineraryday(Request $request)
    {
        $output = '';
        $tempid = $request->itineraries_id;

        $array = new ItineraryDays;
        $array->itineraries_id = $tempid;
        $array->tempid = $tempid;
        $array->save();
    }

    public function showitinerarydays(Request $request)
    {
        $output = '';
        $itineraries_id = $request->itineraries_id;
        $days = ItineraryDays::where('itineraries_id',$itineraries_id)
        ->get();
        if(count($days) > 0)
        {
            foreach($days as $key => $days)
            {
                $output .=
                '
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4><b>Day '.++$key.'</b></h4>
                            </div>
                            <input type="hidden" class="itinerariesidloop" value="'.$days->itineraries_id.'">
                            <input type="hidden" class="dayidloop" value="'.$days->id.'">
                            <div class="col-lg-2">
                                <a href="javascript:void(0)" data-id="'.$days->id.'" data-role="deleteday" class="mr-auto btn btn-danger btn-block">Delete day</a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <label>Date</label>
                                <input type="date" value="'.$days->date.'" class="form-control signledatedb" data-id="'.$days->id.'">
                            </div>
                            <div class="col-md-12 mt-4 showitineraryactivitieshtml'.$days->id.' mb-4">
                            </div>
                            <div class="col-lg-3 mt-4">
                                <a href="javascript:void(0)" data-id="'.$days->id.'" data-role="addactivity" class="mr-auto btn btn-primary btn-block">Add Activity</a>
                            </div>
                            <div class="col-lg-3 mt-4">
                                <a href="javascript:void(0)" data-id="'.$days->id.'" data-role="showactivity" class="mr-auto btn btn-info btn-block">Show Existing Activities</a>
                            </div>
                        </div>
                    </div>
                ';
            }
        }
        $output .=
        '
            <script>
                $(document).ready(function(){
                    function showitinerarydays(itineraries_id)
                    {
                        var csrftoken = $("#csrftoken").val();
                        $.ajax({
                            url:"'.url('/admin/itineraries/showitinerarydays').'",
                            method:"post",
                            data:{_token:csrftoken,itineraries_id:itineraries_id},
                            success:function(data)
                            {
                                $(".showitinerarydayshtml").html(data);
                            }
                        });
                    }
                    function showitineraryactivities(itinerariesidloop,dayid)
                    {

                        var csrftoken = $("#csrftoken").val();
                        $.ajax({
                            url:"'.url('/admin/itineraries/showitineraryactivities').'",
                            method:"post",
                            data:{_token:csrftoken,itinerariesidloop:itinerariesidloop,dayid:dayid},
                            success:function(data)
                            {
                                $(".showitineraryactivitieshtml"+dayid).html(data);
                            }
                        });
                    }
                    $(document).on("click","a[data-role=deleteday]",function(){
                        var csrftoken = $("#csrftoken").val();
                        var itinerariesidloop = $(".itinerariesidloop").val();
                        var id = $(this).data("id");
                        $.ajax({
                            url:"'.url('/admin/itineraries/deleteday').'",
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
                                showitinerarydays(itinerariesidloop);
                            }
                        });
                    });
                    $(document).on("click","a[data-role=addactivity]",function(e){
                        e.preventDefault();
                        var csrftoken = $("#csrftoken").val();
                        var itinerariesidloop = $(".itinerariesidloop").val();
                        var dayid = $(this).data("id");
                        $.ajax({
                            url:"'.url('/admin/itineraries/addactivity').'",
                            method:"post",
                            data:{_token:csrftoken,dayid:dayid,itinerariesidloop:itinerariesidloop},
                            success:function(data)
                            {
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Saved"
                                },{
                                type: "success"
                                });
                                showitineraryactivities(itinerariesidloop,dayid);
                            }
                        });
                    });
                    $(document).on("click","a[data-role=showactivity]",function(e){
                        e.preventDefault();

                        var itinerariesidloop = $(".itinerariesidloop").val();
                        var dayid = $(this).data("id");

                        showitineraryactivities(itinerariesidloop,dayid);
                    });
                    $(".signledatedb").change(function(){
                        var csrftoken = $("#csrftoken").val();
                        var itinerariesidloop = $(".itinerariesidloop").val();
                        var dayid = $(this).data("id");
                        var val = $(this).val();

                        $.ajax({
                            url:"'.url('/admin/itineraries/submitdayform').'",
                            method:"post",
                            data:{_token:csrftoken,dayid:dayid,itinerariesidloop:itinerariesidloop,val:val},
                            success:function(data)
                            {
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Saved"
                                },{
                                type: "success"
                                });

                                showitinerarydays(itinerariesidloop);
                                showitineraryactivities(itinerariesidloop,dayid);
                            }
                        });
                    });
                });
            </script>
        ';
        echo $output;
    }

    public function deleteday(Request $request)
    {
        $output = '';
        $id = $request->id;

        $array = ItineraryDays::find($id)->delete();
        $array = ItineraryActivities::where('days_id',$id)->delete();
    }

    public function submitdayform(Request $request)
    {
        $output = '';
        $id = $request->dayid;
        $val = $request->val;

        $array = ItineraryDays::find($id);
        $array->date = $val;
        $array->save();
    }

    public function addactivity(Request $request)
    {
        $output = '';
        $tempid = $request->itinerariesidloop;
        $days_id = $request->dayid;

        $array = new ItineraryActivities;
        $array->itineraries_id = $tempid;
        $array->tempid = $tempid;
        $array->days_id = $days_id;
        $array->save();
    }

    public function showitineraryactivities(Request $request)
    {
        $output = '';
        $itineraries_id = $request->itinerariesidloop;
        $dayid = $request->dayid;

        $dayactivity = ItineraryActivities::where('itineraries_id',$itineraries_id)
        ->where('days_id',$dayid)
        ->get();
        if(count($dayactivity) > 0)
        {
            foreach($dayactivity as $key => $dayactivity)
            {
                $output .=
                '
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4><b>Activity '.++$key.'</b></h4>
                            </div>
                            <input type="hidden" class="activityitinerariesidloop" value="'.$dayactivity->itineraries_id.'">
                            <input type="hidden" class="activitydaysidloop" value="'.$dayactivity->days_id.'">
                            <div class="col-lg-2">
                                <a href="javascript:void(0)" data-id="'.$dayactivity->id.'" data-role="deleteactivity" class="mr-auto btn btn-danger btn-block">Delete Activity</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Activity Time Start</label>
                                <input type="time" value="'.$dayactivity->starttime.'" class="form-control signlestarttimedb" data-id="'.$dayactivity->id.'">
                            </div>
                            <div class="col-md-6">
                                <label>Activity Time End</label>
                                <input type="time" value="'.$dayactivity->endtime.'" class="form-control signleendtimedb" data-id="'.$dayactivity->id.'">
                            </div>
                            <div class="col-md-12">
                                <label>Description</label>
                                <textarea class="form-control signledescriptiondb" data-id="'.$dayactivity->id.'" rows="3">'.$dayactivity->description.'</textarea>
                            </div>
                        </div>
                    </div>
                ';
            }
        }
        $output .=
        '
            <script>
                $(document).ready(function(){
                    function showitineraryactivities(itinerariesidloop,dayid)
                    {

                        var csrftoken = $("#csrftoken").val();
                        $.ajax({
                            url:"'.url('/admin/itineraries/showitineraryactivities').'",
                            method:"post",
                            data:{_token:csrftoken,itinerariesidloop:itinerariesidloop,dayid:dayid},
                            success:function(data)
                            {
                                $(".showitineraryactivitieshtml"+dayid).html(data);
                            }
                        });
                    }
                    $(document).on("click","a[data-role=deleteactivity]",function(){
                        var csrftoken = $("#csrftoken").val();
                        var activityitinerariesidloop = $(".activityitinerariesidloop").val();
                        var activitydaysidloop = $(".activitydaysidloop").val();
                        var id = $(this).data("id");
                        $.ajax({
                            url:"'.url('/admin/itineraries/deleteactivity').'",
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

                                showitineraryactivities(activityitinerariesidloop,activitydaysidloop);
                            }
                        });
                    });
                    $(".signlestarttimedb").change(function(){
                        var csrftoken = $("#csrftoken").val();
                        var activityitinerariesidloop = $(".activityitinerariesidloop").val();
                        var activitydaysidloop = $(".activitydaysidloop").val();
                        var id = $(this).data("id");
                        var val = $(this).val();

                        $.ajax({
                            url:"'.url('/admin/itineraries/submitstarttimeform').'",
                            method:"post",
                            data:{_token:csrftoken,id:id,val:val},
                            success:function(data)
                            {
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Saved"
                                },{
                                type: "success"
                                });
                                showitineraryactivities(activityitinerariesidloop,activitydaysidloop);
                            }
                        });
                    });
                    $(".signleendtimedb").change(function(){
                        var csrftoken = $("#csrftoken").val();
                        var activityitinerariesidloop = $(".activityitinerariesidloop").val();
                        var activitydaysidloop = $(".activitydaysidloop").val();
                        var id = $(this).data("id");
                        var val = $(this).val();

                        $.ajax({
                            url:"'.url('/admin/itineraries/submitendtimeform').'",
                            method:"post",
                            data:{_token:csrftoken,id:id,val:val},
                            success:function(data)
                            {
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Saved"
                                },{
                                type: "success"
                                });

                                showitineraryactivities(activityitinerariesidloop,activitydaysidloop);
                            }
                        });
                    });
                    $(".signledescriptiondb").change(function(){
                        var csrftoken = $("#csrftoken").val();
                        var activityitinerariesidloop = $(".activityitinerariesidloop").val();
                        var activitydaysidloop = $(".activitydaysidloop").val();
                        var id = $(this).data("id");
                        var val = $(this).val();

                        $.ajax({
                            url:"'.url('/admin/itineraries/submitdescriptionform').'",
                            method:"post",
                            data:{_token:csrftoken,id:id,val:val},
                            success:function(data)
                            {
                                $.notify({
                                title: "<strong>SUCCESS!</strong>",
                                message: "Saved"
                                },{
                                type: "success"
                                });

                                showitineraryactivities(activityitinerariesidloop,activitydaysidloop);
                            }
                        });
                    });
                });
            </script>
        ';
        echo $output;
    }

    public function deleteactivity(Request $request)
    {
        $output = '';
        $id = $request->id;

        $array = ItineraryActivities::find($id)->delete();
    }

    public function submitstarttimeform(Request $request)
    {
        $output = '';
        $id = $request->id;
        $val = $request->val;

        $array = ItineraryActivities::find($id);
        $array->starttime = $val;
        $array->save();
    }

    public function submitendtimeform(Request $request)
    {
        $output = '';
        $id = $request->id;
        $val = $request->val;

        $array = ItineraryActivities::find($id);
        $array->endtime = $val;
        $array->save();
    }

    public function submitdescriptionform(Request $request)
    {
        $output = '';
        $id = $request->id;
        $val = $request->val;

        $array = ItineraryActivities::find($id);
        $array->description = $val;
        $array->save();
    }
}
