<?php

namespace App\Http\Controllers;

use App\contact;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(messages());
        $title = 'رسائل الموقع';
        $contacts = contact::all();

        return view('dashboard.admin.contact.index', ['title' => $title, 'contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required|min:5|max:100',
            'email' => 'required|email',
            'type' => 'required',
            'msg' => 'required|min:15',
        ];

        $niceNames = [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'type' => 'نوع الرسالة',
            'msg' => 'الرسالة',
        ];
        $data = $this->validate($request, $rules, [], $niceNames);

        contact::create($data);

        // udapete the messages notification
        update_messages();
        //----------------------------------

        $request->session()->flash('msgSuccess', 'تم ارسال رسالتك الينا بنجاح');
        return redirect(url('/'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactUpdated = contact::findOrFail($id);
        $contactUpdated->fill(['status' => '1'])->save();

        // update messages info
        update_messages();
        // --------------------

        $title = 'تعديل رسالة';

        return view('dashboard.admin.contact.edit', ['title' => $title, 'contact' => $contactUpdated]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'sometimes|nullable|min:5|max:100',
            'email' => 'sometimes|nullable|email',
            'type' => 'sometimes|nullable',
            'msg' => 'sometimes|nullable|min:15',
            'status' => 'sometimes|nullable',
        ];

        $niceNames = [
            'name' => 'الاسم',
            'email' => 'البريد الالكتروني',
            'type' => 'نوع الرسالة',
            'msg' => 'الرسالة',
            'status' => 'sometimes|nullable',
        ];
        $data = $this->validate($request, $rules, [], $niceNames);

        $contact = contact::findOrFail($id);

        $contact->fill($data)->save();

        $request->session()->flash('msgSuccess', 'تم تعديل الرسالة بنجاح');

        update_messages(); // update the session messages for notification
        return redirect(adminUrl('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $contact = contact::findOrFail($id);
        $contact->delete();
        update_messages(); // update the session messages for notification

        request()->session()->flash('msgWarning', 'تم حذف الرسالة بنجاح');

        return redirect(adminUrl('contact'));
    }

    public function contactData()
    {
        Carbon::setlocale('ar');

        $contacts = contact::all();

        foreach ($contacts as $contact) {
            $contact->setAttribute('date_created', Carbon::parse($contact->created_at)->diffForHumans());
        }

        # code...
        return Datatables::of($contacts)

            ->editColumn('type', function ($model) {

                $type = '';

                if ($model->type == 1) {
                    $type = '<span class="badge label-primary">' . contact()[$model->type] . '</span>';

                } else if ($model->type == 2) {
                    $type = '<span class="badge label-warning">' . contact()[$model->type] . '</span>';

                } else if ($model->type == 3) {
                    $type = '<span class="badge label-success">' . contact()[$model->type] . '</span>';

                } else {
                    $type = '<span class="badge label-danger">' . contact()[$model->type] . '</span>';

                }

                return $type;
            })
            ->editColumn('status', function ($model) {

                return $model->status === 0 ? "<span class='badge label-success'>" . "رسالة جديدة" . "</span>" : "<span class='badge label-warning'>" . "رسالة قديمة" . "</span>";

            })
            ->editColumn('control', function ($model) {

                $all = '<a href="' . adminUrl('contact/' . $model->id . '/edit') . '" class="btn btn-black btn-circle btn-sm"><i class="fa fa-edit"></i></a> ';
                $all .= '<a href="' . adminUrl('contact/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash-o"></i></a>';
                return $all;
            })
            ->rawColumns(['type', "status", 'control'])->make(true);
        // ->escapeColumns([])->make(true);

    }
}
