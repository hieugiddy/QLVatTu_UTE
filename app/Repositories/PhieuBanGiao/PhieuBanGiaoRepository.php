<?php

namespace App\Repositories\PhieuBanGiao;

use Carbon\Carbon;
use App\Models\PhieuDeNghi;
use App\Repositories\BaseRepository;

class PhieuBanGiaoRepository extends BaseRepository implements PhieuBanGiaoInterface
{
    public function getModel()
    {
        return PhieuDeNghi::class;
    }

    public function getIDPhieuBG()
    {
        $now = Carbon::now();
        $code = 'BG';
        $month = $now->format('m');
        $year = $now->format('y');
        $prefix = $code . $month . $year;
        $last_field = $this->model->where('ID', 'like', "$prefix%")->orderby('ID', 'desc')->first();
        if (!$last_field) {
            $count = str_pad(1, 4, '0', STR_PAD_LEFT);
        } else {
            $count = intval(substr($last_field->ID, -4)) + 1;
            $count = str_pad($count, 4, '0', STR_PAD_LEFT);
        }
        $new_id = $prefix . $count;
        return $new_id;
    }
}
