<?php

namespace App\Http\Controllers;

use App\akkar;
use DataTables;
use Illuminate\Http\Request;
use Storage;

class AkkarController extends Controller
{
    // this is home page الرئيسية
    public function home()
    {
        # code...
        $title = 'الرئيسية';

        $all = akkar::where('bu_status', '1')->orderBy('id', "desc")->paginate(9);

        // return $all;

        $latest = akkar::where('bu_status', '1')->orderBy('id', "desc")->limit(9)->get();
        $latest_villa = akkar::where('bu_status', '1')->where('bu_type', '0')->orderBy('id', "desc")->limit(9)->get();
        $latest_choka = akkar::where('bu_status', '1')->where('bu_type', '1')->orderBy('id', "desc")->limit(9)->get();
        $latest_chalee = akkar::where('bu_status', '1')->where('bu_type', '2')->orderBy('id', "desc")->limit(9)->get();

        return view('design/welcome', ['bus' => $latest, 'title' => $title, 'bu_all' => $all, "latest_villa" => $latest_villa, 'latest_choka' => $latest_choka, 'latest_chalee' => $latest_chalee]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'قائمة العقارات';

        return view('dashboard.admin.akkar.index', ['title' => $title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "اضافة عقار جديد";
        return view('dashboard.admin.akkar.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            "bu_name" => 'required|string|min:10|max:25',
            "bu_price" => 'required|integer|min:10',
            "bu_place" => 'required',
            "bu_rooms_count" => 'required|integer|min:1|max:30',
            "bu_rent" => 'required',
            "bu_square" => 'required|integer|min:20',
            "bu_type" => 'required',
            "bu_meta" => 'required|string|min:30|max:160',
            "bu_small_desc" => 'required|string|min:10|max:200',
            "bu_large_desc" => 'required|string|min:50',
            "bu_langtituide" => 'required|string|min:5|max:70',
            "bu_latituide" => 'required|string|min:5|max:70',
            "bu_status" => 'required',
            'image' => 'image|mimes:png,jpg,gif,jpeg|max:1024',
        ];

        $niceNames = [
            "bu_name" => 'العنوان',
            "bu_price" => 'السعر',
            "bu_place" => 'مكان العقار',
            "bu_rooms_count" => 'عدد الغرف',
            "bu_rent" => 'نوع المعاملة',
            "bu_square" => 'المساحة',
            "bu_type" => 'نوع العقار',
            "bu_meta" => 'وصف محركات البحث',
            "bu_small_desc" => 'الكلمات الدلالية',
            "bu_large_desc" => 'وصف العقار',
            "bu_latituide" => 'عنوان (خط العرض)',
            "bu_langtituide" => 'عنوان (خط الطول)',
            "bu_status" => 'الحالة',
            "image" => 'صورة العقار',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);
        $data['user_id'] = auth()->user()->id;

        if ($request->hasFile('image') and $request->file('image') != '') {

            $data['image'] = $request->file('image')->store('website/bu_images');
        }

        akkar::create($data);

        // update the variable bu_watting in the session to show the building wattings in the menu dashboard
        update_bu_wattings();

        $request->session()->flash('msgSuccess', 'تم اضافة المعاملة بنجاح');
        return redirect(adminUrl('bu'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\akkar  $akkar
     * @return \Illuminate\Http\Response
     */
    public function show(akkar $akkar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\akkar  $akkar
     * @return \Illuminate\Http\Response
     */
    public function edit(akkar $akkar, $id)
    {
        $akkar = akkar::findOrFail($id);
        $title = "تعديل عقار";
        return view('dashboard.admin.akkar.edit', ['akkar' => $akkar, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\akkar  $akkar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            "bu_name" => 'required|string|min:10|max:25',
            "bu_price" => 'required|integer|min:10',
            "bu_place" => 'required',
            "bu_rooms_count" => 'required|integer|min:1|max:30',
            "bu_rent" => 'required',
            "bu_square" => 'required|integer|min:20',
            "bu_type" => 'required',
            "bu_meta" => 'required|string|min:30|max:160',
            "bu_small_desc" => 'required|string|min:10|max:200',
            "bu_large_desc" => 'required|string|min:50',
            "bu_langtituide" => 'required|string|min:5|max:70',
            "bu_latituide" => 'required|string|min:5|max:70',
            "bu_status" => 'required',
            'image' => 'image|mimes:png,jpg,gif,jpeg|max:1024',
        ];

        $niceNames = [
            "bu_name" => 'العنوان',
            "bu_price" => 'السعر',
            "bu_place" => 'مكان العقار',
            "bu_rooms_count" => 'عدد الغرف',
            "bu_rent" => 'نوع المعاملة',
            "bu_square" => 'المساحة',
            "bu_type" => 'نوع العقار',
            "bu_small_desc" => 'الكلمات الدلالية',
            "bu_meta" => 'وصف محركات البحث',
            "bu_large_desc" => 'وصف العقار',
            "bu_latituide" => 'عنوان (خط العرض)',
            "bu_langtituide" => 'عنوان (خط الطول)',
            "bu_status" => 'الحالة',
            "image" => 'صورة العقار',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);
        // $data['user_id'] = auth()->user()->id;
        $akkar = akkar::findOrFail($id);

        if ($request->hasFile('image')) {
            // dd($akkar->image);
            if (Storage::has($akkar->image) and $akkar->image != 'website/bu_images/default.png') {
                Storage::delete($akkar->image);
            }

            $data['image'] = $request->file('image')->store('website/bu_images');
        }

        $akkar->fill($data)->save();

        // update the variable bu_watting in the session to show the building wattings in the menu dashboard
        update_bu_wattings();

        $request->session()->flash('msgSuccess', 'تم تعديل المعاملة بنجاح');
        return redirect(adminUrl('bu'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\akkar  $akkar
     * @return \Illuminate\Http\Response
     */
    public function destroy(akkar $akkar, $id)
    {
        $akkar = $akkar->findOrFail($id);

        if (Storage::has($akkar->image) and $akkar->image != 'website/bu_images/default.png') {
            Storage::delete($akkar->image);
        }

        $akkar->delete();

        // update the variable bu_watting in the session to show the building wattings in the menu dashboard
        update_bu_wattings();

        request()->session()->flash('msgSuccess', 'تم حذف المعاملة بنجاح');
        return redirect(adminUrl('bu'));
    }

    public function buData()
    {
        $akkars = akkar::all();

        # code...
        return Datatables::of($akkars)

            ->editColumn('bu_type', function ($model) {

                $type = ['فيلا', 'شقة', 'شاليه'];
                $bu_type = '';

                if ($model->bu_type == 0) {
                    $bu_type = '<span class="badge label-danger">' . $type[$model->bu_type] . '</span>';

                } else if ($model->bu_type == 1) {
                    $bu_type = '<span class="badge label-warning">' . $type[$model->bu_type] . '</span>';

                } else {
                    $bu_type = '<span class="badge label-info">' . $type[$model->bu_type] . '</span>';

                }

                return $bu_type;
            })
            ->editColumn('bu_status', function ($model) {

                return $model->bu_status === 0 ? "<span class='badge'>" . "غير مفعل" . "</span>" : "<span class='badge label-success'>" . "مفعل" . "</span>";

            })
            ->editColumn('created_at', function ($model) {

                return date_str($model->created_at);
            })
            ->editColumn('control', function ($model) {

                $all = '<a href="' . adminUrl('bu/' . $model->id . '/edit') . '" class="btn btn-black btn-circle btn-sm"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . adminUrl('bu/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash-o"></i></a>';
                return $all;
            })
            ->rawColumns(['bu_type', "bu_status", "created_at", 'control'])->make(true);
        // ->escapeColumns([])->make(true);

    }

    public function showAll(Request $request)
    {

        # code...
        // بيع / ايجار / كل العقارات
        $bu_type = request()->segment(2);

        $all = [];
        $title = '';
        if ($bu_type == 'show_all') {

            $all = Akkar::where('bu_status', '1')->orderBy('id', 'desc')->paginate(15);

            $title = 'كل العقارات';

        } else if ($bu_type == 'forRent') {
            $all = Akkar::where('bu_status', '1')->where('bu_rent', 1)->orderBy('id', 'desc')->paginate(15);
            $title = 'ايجار';

        } else if ($bu_type == 'forBuy') {
            $all = Akkar::where('bu_status', '1')->where('bu_rent', 0)->orderBy('id', 'desc')->paginate(15);
            $title = 'بيع';

        } else if ($bu_type == 'villa') {
            $all = Akkar::where('bu_status', '1')->where('bu_type', 0)->orderBy('id', 'desc')->paginate(15);
            $title = 'فيلات';

        } else if ($bu_type == 'house') {
            $all = Akkar::where('bu_status', '1')->where('bu_type', 1)->orderBy('id', 'desc')->paginate(15);
            $title = 'شقق';

        } else if ($bu_type == 'chalee') {
            $all = Akkar::where('bu_status', '1')->where('bu_type', 2)->orderBy('id', 'desc')->paginate(15);
            $title = 'شاليات';
        }

        return view('design/bu/index', ['title' => $title, 'all_bu' => $all]);
    }

    public function search(Request $request)
    {
        $rules = [
            'bu_square' => 'nullable|numeric',
            'bu_price_from' => 'nullable|numeric',
            'bu_price_to' => 'nullable|numeric',
        ];

        $niceNames = [
            "bu_price_from" => ' السعر ',
            "bu_price_to" => 'السعر ',
            "bu_square" => 'المساحة',
        ];

        $validate = $this->validate($request, $rules, [], $niceNames);

        // Method 1 ------------------------------------------------------------------------
        # code...
        // $var_search = array_except($request->all(), ['_token','_method']);
        // $output = '';

        // $i = 0;
        // $where = '';
        // foreach ($var_search as $key => $value) {
        //     if ($value != '') {
        //         if ($i == 0) {
        //             $where = 'select * from akkars where ' . $key . ' = ' . $value;
        //             $output = $where;

        //         } else {
        //             $output .= " and " . $key . ' = ' . $value;
        //         }

        //         $i++;
        //     }
        // }
        // if(!empty($output)){

        //     $all = DB::select($output);
        //     $search = 'search';
        //     $title = 'نتيجة البحث';
        //     return view('design/bu/index', ['title' => $title, 'all_bu' => $all, 'search' => $search]);
        // }
        // -------------------------------------------------------------------------------------------------

        // Method 2 ---------------------------------------------------------------------------------------
        $allRequest = array_except($request->all(), ['_method', '_token', 'page', 'd_created']); // get all variable from request except _token and _method
        $query = \DB::table('akkars')->where('bu_status', '1')->orderBy('id', 'desc')->select('*');
        // $query = akkar::all();

        $breadcrumb = [];

        $count = count($allRequest);
        $i = 0;

        foreach ($allRequest as $key => $value) {
            $i++;
            if ($value != '') {

                if ($key == 'bu_price_from' and $request->bu_price_to == '') {

                    // if has price_from and not set price to
                    $query->where('bu_price', '>=', $value)->orderBy('bu_price', 'asc');

                } elseif ($key == 'bu_price_to' and $request->bu_price_from == '') {

                    // if has price_to and not set price from
                    $query->where('bu_price', '<=', $value)->orderBy('bu_price', 'desc');

                } else {

                    // the request has where his value != '' and the key deferent of bu_price_from and bu_price_to
                    if ($key != 'bu_price_from' and $key != 'bu_price_to') {
                        $query->where($key, $value);
                    }
                }

                $breadcrumb[$key] = $value;

            } else {

                // this truck used to calculate the price from -> to
                //  it's used here to evit the loop if you are used in the if where value != ''
                if ($i == $count and $request->bu_price_from != '' and $request->bu_price_to != "") {
                    $query->whereBetween('bu_price', [$request->bu_price_from, $request->bu_price_to])->orderBy('bu_price', 'asc');
                }
            }
        }

        $all = $query->paginate(9);

        return view('design/bu/index', ['breadcrumb' => $breadcrumb, 'all_bu' => $all, 'search' => 'search']);

    }

    public function singleBu(Request $request, $id)
    {
        $buInfo = akkar::findOrFail($id);

        if ($buInfo->bu_status == 0) {
            $title = 'عقارغير مفعل';
            return view('design/userBu/bu_not_active', compact('title'));
        }
        $moreType = akkar::where('bu_type', $buInfo->bu_type)->where('id', '!=', $buInfo->id)->orderBy('id', "desc")->limit(6)->get();
        $moreRent = akkar::where('bu_rent', $buInfo->bu_rent)->where('id', '!=', $buInfo->id)->orderBy('id', "desc")->limit(6)->get();

        $title = $buInfo->bu_name;
        return view('design/bu/single', ['buInfo' => $buInfo, 'moreType' => $moreType, "moreRent" => $moreRent, 'title' => $title]);
    }

    // user add new building

    public function userCreateBu()
    {
        $title = 'اضافة عقار جديد';
        $is_user = '1'; // use this var to hide the status and small desc from form off add new building
        // because not the admin add its a user or a guest

        return view('design.userBu.create', compact('title', 'is_user'));
    }

    public function userStoreBu(akkar $bu, Request $request)
    {
        $rules = [
            "bu_name" => 'required|string|min:10|max:25',
            "bu_price" => 'required|integer|min:10',
            "bu_place" => 'required',
            "bu_rooms_count" => 'required|integer|min:1|max:30',
            "bu_rent" => 'required',
            "bu_square" => 'required|integer|min:20',
            "bu_type" => 'required',
            "bu_meta" => 'sometimes|nullable|string|min:30|max:200',
            "bu_small_desc" => 'required|string|min:10|max:160',
            "bu_large_desc" => 'required|string|min:50',
            "bu_langtituide" => 'required|string|min:5|max:70',
            "bu_latituide" => 'required|string|min:5|max:70',
            "bu_status" => 'sometimes|nullable',
            'image' => 'image|mimes:png,jpg,gif,jpeg|max:1024',
        ];

        $niceNames = [
            "bu_name" => 'العنوان',
            "bu_price" => 'السعر',
            "bu_place" => 'مكان العقار',
            "bu_rooms_count" => 'عدد الغرف',
            "bu_rent" => 'نوع المعاملة',
            "bu_square" => 'المساحة',
            "bu_type" => 'نوع العقار',
            "bu_meta" => 'وصف محركات البحث',
            "bu_small_desc" => 'الكلمات الدلالية',
            "bu_large_desc" => 'وصف العقار',
            "bu_latituide" => 'عنوان (خط العرض)',
            "bu_langtituide" => 'عنوان (خط الطول)',
            "image" => 'صورة العقار',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);

        // check if the user registred is add this bu or a guest
        $data['user_id'] = auth()->check() ? auth()->user()->id : 00;
        $data['bu_meta'] = 'الكلمات الدلالية';

        if(auth()->check()){

            if (auth()->user()->is_admin == 0) {
                $data['bu_status'] = 0;
            } else {
                $data['bu_status'] = 1;
            }
        }else{
            $data['bu_status'] = 0;

        }

        if ($request->hasFile('image') and $request->file('image') != '') {

            $data['image'] = $request->file('image')->store('website/bu_images');
        }

        akkar::create($data);

        // update the variable bu_watting in the session to show the building wattings in the menu dashboard
        update_bu_wattings();

        $request->session()->flash('msgSuccess', 'تم اضافة المعاملة بنجاح');
        return redirect(url('bu/show_all'));
    }

    // user show all buildings active
    public function allUserBuActive()
    {

        $title = 'كل عقاراتك المفعلة';
        $all = akkar::where('user_id', auth()->user()->id)->where('bu_status', 1)->paginate(6);
        return view('design/bu/index', ['title' => $title, 'all_bu' => $all]);

    }
    // user show all not active
    public function allUserBuWAttings()
    {

        $title = 'عقارات غير مفعلة';
        $all = akkar::where('user_id', auth()->user()->id)->where('bu_status', 0)->paginate(6);
        return view('design/bu/index', ['title' => $title, 'all_bu' => $all]);

    }

    /* user edit a building not approved bu_status = 0
    if the status=1 / bu approved the user not has a permission to update the building */
    public function userEditBu($id)
    {
        $title = 'تعديل عقارك';
        $bu = Akkar::findOrFail($id);

        // this condition used to check if the building approved and the user added this building not the user be edit this building
        if ($bu->bu_status == 1 || $bu->user_id != auth()->user()->id) {

            $title = 'عقار غير موجود';
            $msg = 'عقار غير موجود أو انه تمت الموافقة عليه (مفعل) ان كنت تواجه صعوبة قم بالاتصال بنا للمزيد من التوضيح';
            return view('design.userBu.buNotEdited', compact('title', 'msg'));
        }

        return view('design.userBu.edit', compact('title', 'bu'));
    }
    public function userUpdateBu(Request $request, $id)
    {

        $rules = [
            "bu_name" => 'required|string|min:10|max:25',
            "bu_price" => 'required|integer|min:10',
            "bu_place" => 'required',
            "bu_rooms_count" => 'required|integer|min:1|max:30',
            "bu_rent" => 'required',
            "bu_square" => 'required|integer|min:20',
            "bu_type" => 'required',
            "bu_small_desc" => 'required|string|min:10|max:160',
            "bu_large_desc" => 'required|string|min:50',
            "bu_langtituide" => 'required|string|min:5|max:70',
            "bu_latituide" => 'required|string|min:5|max:70',
            'image' => 'sometimes|nullable|image|mimes:png,jpg,gif,jpeg|max:1024',
        ];

        $niceNames = [
            "bu_name" => 'العنوان',
            "bu_price" => 'السعر',
            "bu_place" => 'مكان العقار',
            "bu_rooms_count" => 'عدد الغرف',
            "bu_rent" => 'نوع المعاملة',
            "bu_square" => 'المساحة',
            "bu_type" => 'نوع العقار',
            "bu_small_desc" => 'الكلمات الدلالية',
            "bu_large_desc" => 'وصف العقار',
            "bu_latituide" => 'عنوان (خط العرض)',
            "bu_langtituide" => 'عنوان (خط الطول)',
            "image" => 'صورة العقار',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);
        $bu = Akkar::findOrFail($id);

        if ($bu->user_id != auth()->user()->id || $bu->bu_status == 1) {
            $title = 'عقار غير موجود';
            $msg = 'عقار غير موجود أو انه تمت الموافقة عليه (مفعل) ان كنت تواجه صعوبة قم بالاتصال بنا للمزيد من التوضيح';
            return view('design.userBu.buNotEdited', compact('title', 'msg'));
        }

        if ($request->hasFile('image')) {
            if (Storage::has($bu->image) and $bu->image != 'website/bu_images/default.png') {
                Storage::delete($bu->image);
            }
            $data['image'] = $request->file('image')->store('website/bu_images');
        }

        $bu->fill($data)->save();

        $request->session()->flash('msgSuccess', 'تم تعديل المعاملة بنجاح');
        return redirect(url('user/bu_wattings'));
    }

    // change the status of building with admin in the dashboard
    public function changeStatus($id, $status)
    {

        $bu = akkar::findOrFail($id);

        $bu->fill(['bu_status' => $status])->save();

        request()->session()->flash('msgSuccess', 'تم تعديل حالة العقار بنجاح');

        return redirect()->back();

    }

    // search buildings with axios
    public function get_data_axios($query){

        $buildings = \DB::table('akkars')->select('id','bu_name')->where('bu_status','1')->where("bu_name","like",'%'.$query.'%')->get();


        return response()->json(['buildings'=>$buildings,'status'=>'200']);

    }
}
