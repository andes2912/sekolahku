<?php

namespace App\Helpers;

trait GlobalHelpers {
    public function generateNumber($request, $prefix = 'BOOK')
    {
        return $prefix . '-' . sprintf("%'.05d", $request->id);
    }
}