<?php
namespace App\Traits;

use Illuminate\Support\Facades\Session;

trait SuccessMessage
{
    public function getSuccessMessage($name)
    {
        Session::put('success',$name.' Created Successfully');
    }
    public function getUpdateSuccessMessage($name)
    {
        Session::put('success',$name.' Updated Successfully');

    }
    public function getDestroySuccessMEssage($name)
    {
        Session::put('success',$name.' deleted Successfully');
    }
}
