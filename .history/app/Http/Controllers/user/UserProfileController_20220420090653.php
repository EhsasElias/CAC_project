<?php

namespace App\Http\Controllers\user;
use App\Models\Payment;
use App\Http\Controllers\Controller;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
      $id=Auth::id();
      $payment =  payment::find($id);
      $profile = UserProfile::find($id);
      return $profile.$payment;
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $payment = Payment::select()->get();
        return view('client.profile', [
            'profile' => $profile, 
              'Payment' => $payment,
            'do' => $do
        ]);

    }
}
