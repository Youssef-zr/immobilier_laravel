<?php

// active link

if (!function_exists('setActive')) {
    function setActive($path, $active = 'active')
    {
        return call_user_func_array('Request::is', (array) $path) ? $active : '';
    }
}

// the request shurthund of admin resource
if (!function_exists('adminUrl')) {
    function adminUrl($url = null)
    {
        return url('/admin/' . $url);

    }
}

// if (!function_exists('adminGuard')) { //shurthund function to the admin guard (auth()->guard("admin"))
//     function adminGuard()
//     {
//         return auth()->user('admin');
//     }
// }

if (!function_exists("lang")) { // get the session of language
    function lang()
    {
        if (session()->has('lang')) {
            return session("lang");
        } else {
            // set the default language when changed from menu  navigation bar and get from table settings
            session()->put('lang', settings()->main_lang);
            return settings()->main_lang;
        }
    }
}

if (!function_exists("direction")) { // change the direction of template
    function direction()
    {
        if (session()->has("lang")) {
            if (lang() == "ar") {
                return "RTL";
            } else {
                return "LTR";
            }
        } else {
            return "LTR";
        }
    }
}

if (!function_exists('tablesLang')) { // datatables variables of language
    function tablesLang()
    {
        return [

            "sProcessing" => trans('admins/admin.processing'),
            "sLengthMenu" => trans('admins/admin.lengthMenu'),
            "sZeroRecords" => trans('admins/admin.zeroRecords'),
            "sEmptyTable" => trans('admins/admin.emptyTable'),
            "sInfo" => trans('admins/admin.info'),
            "sInfoEmpty" => trans('admins/admin.infoEmpty'),
            "sInfoFiltered" => trans('admins/admin.infoFiltred'),
            "sSearch" => trans('admins/admin.search'),
            "sInfoThousands" => ",",
            "sLoadingRecords" => trans('admins/admin.loadingRecords'),
            "oPaginate" => [
                "sFirst" => trans('admins/admin.first'),
                "sLast" => trans('admins/admin.last'),
                "sNext" => trans('admins/admin.next'),
                "sPrevious" => trans('admins/admin.previous'),
            ],
            "oAria" => [
                "sSortAscending" => trans('admins/admin.sortAsc'),
                "sSortDescending" => trans('admins/admin.sortDesc'),

            ],

        ];
    }
}

// get the segment of request and user in the navigation bar to open the li activated

if (!function_exists("active_menu")) {
    function active_menu($link)
    {

        if (preg_match("/" . $link . "/i", request()->segment(2))) {
            return ["active", "display:block"];
        } else {
            return ["", ""];
        }
    }
}

if (!function_exists("active_dashboard_item")) { //this function for active dashboard link in the navigation bar its a link not has a item
    function active_dashboard_item($link)
    {
        if (preg_match('/' . $link . '/i', request()->segment(0)) && request()->segment(1) == "") {
            return ["active"];
        } else {
            return [""];
        }
    }
}

// helper function to get the information from setings table

// set the settings to session ---------------------------------------------
if (!function_exists("set_settings")) {
    function set_settings()
    {
        $settings = \DB::table("settings")->find(1);
        if (!is_null($settings)) {
            session()->push('settings', $settings);

        }
    }
}

// update the settings information
if (!function_exists("update_settings")) {
    function update_settings()
    {
        if (session()->has('settings')) { // check if the has session settings

            session()->forget('settings'); // delete the old session settings
            set_settings(); // set the new settings session

        }

    }
}

// get the settings from session
if (!function_exists("settings")) {
    function settings()
    {
        return session()->get('settings')[0];

    }
}

// set the messages to session ---------------------------------------------
if (!function_exists("set_messages")) {
    function set_messages()
    {
        $messages = \DB::table("contacts")->where('status', '0')->orderBy('id', 'desc')->get();
        $count = count($messages);

        if (!is_null($messages)) {
            session()->push('messages', [$messages, $count]);
        } else {
            session()->forget('messages');
            session()->push('messages', [[], 0]);
        }

    }
}

// update the messages information
if (!function_exists("update_messages")) {
    function update_messages()
    {
        if (session()->has('messages')) { // check if the has session messages
            session()->forget('messages'); // delete the old session messages
        }

        set_messages(); // set the new messages session
    }
}

// get the messages from session
if (!function_exists("messages")) {
    function messages()
    {
        return session()->get('messages')[0];

    }
}

// -------------------------------------------------------------------------

// start helper function to the uploaded files conneted with the upload class
if (!function_exists('upload')) {
    function upload()
    {
        return new App\Http\Controllers\upload;
    }
}
// end helper function to the uploaded files

// start our validation rules ------------------
if (!function_exists('validate_image')) { // validate image rule
    function validate_image($extension = null)
    {
        if (!is_null($extension)) {
            return 'image|mimes:' . $extension;
        } else {
            return "image|mimes:jpg,jpeg,gif,png";
        }

    }
}
// end our validation rules ------------------

// ----------------------------------------------------------------------------------------
if (!function_exists('bu_type')) {
    function bu_type()
    {
        return [
            '0' => 'فيلا',
            '1' => 'شقة',
            '2' => 'شاليه',
        ];
    }
}

if (!function_exists('bu_rent')) {
    function bu_rent()
    {
        return [
            '0' => 'بيع',
            '1' => 'ايجار',
        ];
    }
}

if (!function_exists('bu_rooms')) {
    function bu_rooms()
    {
        $i = 1;
        $rooms = [];
        while ($i <= 30) {
            $rooms[$i] = $i;
            $i++;
        }
        return $rooms;
    }
}

if (!function_exists('breadcrumb_name')) {

    function breadcrumb_name($key)
    {
        $array = [
            'bu_price_from' => 'السعر من',
            'bu_price_to' => 'السعر الى',
            'bu_price' => 'السعر',
            'bu_name' => 'العنوان',
            'bu_rooms_count' => 'عدد الغرف',
            'bu_type' => 'نوع العقار ',
            'bu_rent' => 'نوع المعاملة',
            'bu_square' => 'المساحة',
            'd_created' => 'أضيف في',
        ];
        return $array[$key];
    }
}

if (!function_exists('bu_place')) {
    function bu_place()
    {
        $array = [
            "552" => "اكادير",
            "553" => "الحسيمة",
            "554" => "أوسرد",
            "555" => "أصيلة",
            "556" => "أزرو",
            "808" => "ابن أحمد",
            "557" => "بني ملال",
            "558" => "بنسليمان",
            "559" => "بركان",
            "560" => "برشيد",
            "561" => "بوجدور",
            "562" => "بوسكورة",
            "792" => "بوزنيقة",
            "563" => "الدار البيضاء",
            "564" => "شفشاون",
            "565" => "الداخلة",
            "827" => "الحاجب",
            "566" => "الجديدة",
            "793" => "الراشيدية",
            "567" => "الصويرة",
            "568" => "السمارة",
            "569" => "فاس",
            "802" => "الفقيه بن صالح",
            "570" => "كلميم",
            "801" => "كرسيف",
            "571" => "افران",
            "573" => "القنيطرة",
            "572" => "كابيلا",
            "574" => "خنيفرة",
            "575" => "الخميسات",
            "576" => "خريبكة",
            "577" => "القصر الكبير",
            "578" => "العيون",
            "579" => "العرائش",
            "580" => "مراكش",
            "581" => "مارتيل",
            "582" => "مكناس",
            "583" => "مليلية",
            "584" => "ميدلت",
            "585" => "المحمدية",
            "586" => "الناضور",
            "794" => "الوليدية",
            "587" => "ورزازات",
            "588" => "وزان",
            "589" => "وجدة",
            "590" => "الرباط",
            "591" => "أسفي",
            "795" => "السعيدية",
            "592" => "سلا",
            "593" => "سبتة",
            "594" => "صفرو",
            "595" => "السطات",
            "806" => "سيدي بنور",
            "596" => "سيدي افني",
            "597" => "سيدي قاسم",
            "598" => "سيدي رحال",
            "807" => "سيدي سليمان",
            "599" => "تامنصورت",
            "600" => "تامسنا",
            "601" => "طنجة",
            "602" => "طنطان",
            "603" => "طرفاية",
            "800" => "تارودانت",
            "604" => "تازة",
            "605" => "تمارة",
            "606" => "تطوان",
            "607" => "تيفلت",
            "798" => "تنغير",
            "608" => "تزنيت",
        ];

        return $array;
    }
}

// retunr image with path
if (!function_exists('image_path')) {
    function image_path($src, $default = 'website/bu_images/default.png')
    {
        $path = '';
        if (\Storage::has($src)) {
            $path = Storage::url($src);
        } else {
            $path = Storage::url($default);
        }

        return $path;
    }
}

if (!function_exists('contact')) {
    function contact()
    {
        return [
            '1' => 'اعجاب',
            '2' => 'مشكلة',
            '3' => 'اقتراح',
            '4' => 'استفسار',
        ];
    }
}

// special date format d-m-y
if (!function_exists('created')) {
    function created($date)
    {
        return \Carbon\Carbon::parse($date)->format('d-m-Y');
    }
}

// special date format منذ 15دقيقة
if (!function_exists('date_str')) {
    function date_str($date)
    {
        // return $date;
        \Carbon\Carbon::setlocale('ar');
        return Carbon\Carbon::parse($date)->diffForHumans();
    }
}

// set building not approved to the session
if (!function_exists('set_bu_wattings')) {
    function set_bu_wattings()
    {

        $bus = \App\akkar::where('bu_status', '0')->get();
        session()->push('bu_wattings', [$bus, count($bus)]);
    }

}

// update building not approved to the session
if (!function_exists('update_bu_wattings')) {
    function update_bu_wattings()
    {

        if (session()->has('bu_wattings')) {

            session()->forget('bu_wattings');
        }

        set_bu_wattings();
    }

}

// get our buildings not approved
if (!function_exists('bu_wattings')) {
    function bu_wattings()
    {

        return request()->session()->get('bu_wattings')[0];
    }
}

// get the month string
if (!function_exists('month_str')) {
    function month_str()
    {
        return [
            '1' => 'يناير',
            '2' => 'فبراير',
            '3' => 'مارس',
            '4' => 'أبريل',
            '5' => 'ماي',
            '6' => 'يونيو',
            '7' => 'يوليوز',
            '8' => 'غشت',
            '9' => 'شتنبر',
            '10' => 'أكتوبر',
            '11' => 'نونبر',
            '12' => 'دجنبر',
        ];
    }
}

// get the years of building added
if (!function_exists('bu_years')) {
    function bu_years()
    {
        $years = \DB::select('select distinct year(created_at) as year from akkars order by year asc');
        $yearValues = [];

        foreach ($years as $year) {
            foreach ($year as $key => $value) {
                $yearValues[$value] = $value;
            }
        }
        return $yearValues;

    }
}
