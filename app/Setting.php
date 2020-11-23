<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Setting extends Model
{
    protected $table = 'Settings';
    protected $guarded = ['logo_src', 'icon_src'];

    public function getLogoSrcAttribute()
    {
        # code...
        $logo = '';
        if ($this->logo != 'website/settings/default_logo.png' and Storage::has($this->logo)) {
            $logo = Storage::url($this->logo);
        } else {
            $logo = Storage::url('website/settings/default_logo.png');
        }

        return $logo;
    }

    public function getIconSrcAttribute()
    {
        # code...
        $icon = '';
        if ($this->icon != 'website/settings/default_Icon.png' and Storage::has($this->icon)) {
            $icon = Storage::url($this->icon);
        } else {
            $icon = Storage::url('website/settings/default_icon.png');
        }

        return $icon;
    }
}
