<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Hash;
use Illuminate\Http\Request;
use Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "قائمة الاعضاء";
        return view('dashboard.admin.users.index', compact("title"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'اضافة عضو جديد';
        return view('dashboard.admin.users.create', compact('title'));
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
            'name' => 'required|string|min:4|max:25',
            "email" => "required|email|unique:users", // unique email but not this email updated its excepted this email with the $id
            'is_admin' => 'required',
            "password" => 'required|string',
            'password_confirmation' => 'required|same:password',
        ];

        $naceNimes = [
            'name' => 'اسم العضو',
            'is_admin' => 'نوع العضوية',
        ];

        $data = $this->validate($request, $rules, [], $naceNimes);
        $data['password'] = bcrypt($request->password);
        array_pop($data);

        User::create($data);

        $request->session()->flash('msgSuccess', 'تم اضافة العضو بنجاح');
        return redirect(adminUrl('users'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrfail($id);
        $title = 'تعديل العضو ' . $user->name;

        // get the buildings of this user approved and not approved
        $approveds = $user->buildingsApproved()->get();
        $wattings = $user->buildingsWatting()->get();

        return view("dashboard.admin.users.edit", ['user' => $user, "title" => $title, 'approveds' => $approveds, 'wattings' => $wattings]);
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
            'name' => 'required|string|min:4|max:25',
            "email" => "required|email|unique:users,email," . $id, // unique email but not this email updated its excepted this email with the $id
            'is_admin' => 'required',
        ];

        $naceNimes = [
            'name' => 'اسم العضو',
            'email' => 'البريد الالكتروني',
            'is_admin' => 'نوع العضوية',
        ];

        $data = $this->validate($request, $rules, [], $naceNimes);
        $userUpdated = User::findOrFail($id);

        if ($request->hasFile('image')) {
            if (Storage::has($userUpdated->image) and $userUpdated->image != 'website/users/default.png') {
                Storage::delete($userUpdated->image);
            }

            $data['image'] = $request->file('image')->store('website/users');
        }

        $userUpdated->fill($data)->save();

        $request->session()->flash('msgWarning', 'تم تعديل البيانات بنجاح');

        return redirect(adminUrl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::findOrFail($id);
        if ($user->id == 1) {

            request()->session()->flash('msgDanger', 'لا يمكن حذف العضوية رقم 1');
            return back();
        }
        $user->delete();
        request()->session()->flash('msgSuccess', 'ثم حذف العضو بنجاح');
        return redirect(adminUrl('users'));
    }

    public function login(Request $request)
    {
        // return ($request);
        # code...
        $rules = [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ];

        $data = $this->validate($request, $rules);
        $remember = $request->remember == 1 ? true : false;

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            // set the settings of website
            set_settings();
            // update the messages in the dahsboard
            update_messages();
            // update the building not approved in the dashboard menu
            update_bu_wattings();

            $user = auth()->user();

            $request->session()->flash('msgSuccess', 'مرحبا من جديد ' . $user->name);
            return redirect(url('admin'));
        }

        $request->session()->flash('msgDanger', '.البريد الالكتروني أو كلمة المرور غير صحيحة');
        return back();
    }

    public function register(Request $request)
    {
        # code...
        $rules = [
            'name' => 'required|string|min:5',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ];

        $data = $this->validate($request, $rules);
        $data = array_except($data, ['password_confirmation']);
        $data['password'] = bcrypt($request->password);
        User::create($data);

        auth()->attempt(['email' => $request->email, 'password' => $request->password], true);

        $request->session()->flash('msgSuccess', 'مرحبا');

        return redirect(adminUrl('/'));
    }

    public function logout()
    {
        # code...
        if (auth()->check()) {

            auth()->logout();
            return redirect(url('/'));
        }

        return back();
    }

    // change the password of users by admin
    public function changePassword(Request $request)
    {
        # code...

        $data = $this->validate($request, ['password' => 'required|min:6']);

        $user = User::findOrFail($request->user_id);

        $new_password = bcrypt($request->password);

        $data['password'] = $new_password;
        $user->fill($data)->save();

        $request->session()->flash('msgSuccess', 'تم تغيير كلمة المرور بنجاح');

        return redirect(adminUrl('users'));

    }
    public function usersData()
    {
        # code...
        $users = User::all();
        return Datatables::of($users)

            ->editColumn('name', function ($model) {

                return $model->id !== 1 ? '<a href="' . adminUrl('users/' . $model->id . '/edit') . '" class="badge btn-sm">' . $model->name . '</a>' : '<a href="' . adminUrl('users/' . $model->id . '/edit') . '" class="badge label-danger label-sm">' . $model->name . '</a>';
            })
            ->editColumn('is_admin', function ($model) {

                return $model->is_admin === 0 ? "<span class='label label-info'>" . "عضو" . "</span>" : "<span class='label label-warning'>" . "مدير" . "</span>";

            })
            ->editColumn('control', function ($model) {

                $all = '<a href="' . adminUrl('users/' . $model->id . '/edit') . '" class="btn btn-black btn-circle btn-sm"><i class="fa fa-edit"></i></a> ';
                if ($model->id != 1) {
                    $all .= '<a href="' . adminUrl('users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash-o"></i></a>';
                }
                return $all;
            })
            ->rawColumns(['name', "is_admin", 'control'])->make(true);
        // ->escapeColumns([])->make(true);

    }

    // user profile
    public function Profile()
    {

        $user = auth()->user();
        $title = ' بيانات عضويتك ';
        return view('design/profile/userInfo', compact('title', 'user'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $rules = [
            'name' => 'sometimes|nullable|string|min:4|max:25',
            "email" => "sometimes|nullable|email|unique:users,email," . $user->id, // unique email but not this email updated its excepted this email with the $id
            'image' => "sometimes|nullable|image|mimes:jpg,jpeg,png,gif",
        ];

        $naceNimes = [
            'name' => 'اسم العضو',
            'email' => 'البريد الالكتروني',
            'image' => 'صورة العضوية',
        ];

        $data = $this->validate($request, $rules, [], $naceNimes);

        if ($request->hasFile('image')) {
            if (Storage::has($user->image) and $user->image != 'website/users/default.png') {
                Storage::delete($user->image);
            }

            $data['image'] = $request->file('image')->store('website/users');
        }

        $user->fill($data)->save();

        $request->session()->flash('msgSuccess', 'تم تعديل بياناتك بنجاح');

        return redirect()->back();
    }

    // user change his password
    public function userChangePassword(Request $request)
    {

        $rules = [
            'oldPassword' => 'required|string|min:6|max:200',
            'newPassword' => 'required|string|min:6|max:200',
        ];

        $naceNimes = [
            'oldPassword' => 'كلمة المرور القديمة',
            'newPassword' => 'كلمة المرور الجديدة',
        ];

        $this->validate($request, $rules, [], $naceNimes);

        $user = auth()->user();

        if (!Hash::check($request->oldPassword, $user->password)) {
            $request->session()->flash('msgDanger', 'كلمة مرورك القديمة غير صحيحة');
        }

        $user->fill(['password' => bcrypt($request->newPassword)])->save();
        $request->session()->flash('msgSuccess', 'تم تغيير كلمة المرور بنجاح');

        auth()->logout();

        return redirect(url('login'));

    }
}
