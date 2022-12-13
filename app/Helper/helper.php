<?php
function uploade($image){

    $extension = $image->getClientOriginalExtension();
    $filename = time().'.' . $extension;
    $image->move(public_path('assets/images/shop/'), $filename);
    return $filename;
}
