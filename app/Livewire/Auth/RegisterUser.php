<?php

namespace App\Livewire\Auth;

use App\Models\ComplainantInfo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterUser extends Component
{
    public $firstname,$middlename,$lastname, $age, $sex, $phone_number, $address, $email, $password, $confirm_password;
    public function render()
    {
        return view('livewire.auth.register-user');
    }

    public function register(){
       $this->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'age' => 'required|numeric',
        'sex' => 'required',  
        'phone_number' => 'required|numeric',
        'address' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'confirm_password' => 'required|confirmed:password',
       ]);

       $user = User::create([
        'name' => $this->firstname.' '. $this->lastname,
        'email' => $this->email,
        'password' => bcrypt($this->password),
        'user_type' => 'complainant'
       ]);

       ComplainantInfo::create([
        'user_id' => $user->id,
        'firstname' => $this->firstname,
        'lastname' => $this->lastname,
        'middlename' => $this->middlename,
        'age' => $this->age,
        'sex' => $this->sex,
        'phone_number' => $this->phone_number,
        'address' => $this->address,
       ]);

       Auth::loginUsingId($user->id);
       
       return redirect()->route('dashboard');
    }
}
