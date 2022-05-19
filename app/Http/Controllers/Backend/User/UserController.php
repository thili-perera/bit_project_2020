<?php

namespace App\Http\Controllers\Backend\User;

use App\Model\Role;
use App\Model\User;
use App\Model\District;
use Illuminate\Http\Request;
use App\Model\BillingAddress;
use App\Model\ShippingAddress;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Model\Role_User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /* user authentication */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function index()
    {
        $role = Role_User::whereIn('role_id', [1, 2])->pluck('user_id');
        $allusers = User::whereIn('id', $role)->with('roles')->get();
        // dd($allusers);
        return view('Backend.UserManagement.index', compact('allusers'));
    }
    public function create()
    {
        $districts = District::all();
        $roles =  Role::all();
        return view('Backend.UserManagement.create', compact('roles', 'districts'));
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:8'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => 'required', 'string', 'max:255',
            'district' => ['required', 'string'],
            'mobile' => ['required', 'numeric', 'digits:10', 'unique:users'],
            'zipCode' => ['required', 'numeric'],
            'city' => ['required', 'string', 'max:255'],
            'role' => ['required'],
        ]);
        // dd($request);

        $user = new User();
        if ($request->file('image')) {
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user'), $my_image);
            $user->image = $my_image;
        }

        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->role);

        $billingaddress = new BillingAddress();
        $billingaddress->address_line_1 = $request->address_line_1;
        $billingaddress->address_line_2 = $request->address_line_2;
        $billingaddress->city = $request->city;
        $billingaddress->district = $request->district;
        $billingaddress->zipCode = $request->zipCode;

        $billingaddress->user()->associate($user)->save();
        // $user->billing_address()->save($user);

        Alert::success('User successfully created');
        return redirect()->route('dashboard.user.index');
    }
    public function show(User $user)
    {
        return view('Backend.UserManagement.show', compact('user'));
    }
    /* user profile */
    public function userprofile($user)
    {
        $userpro = User::where('id', $user)->with('billing_address', 'roles')->first();
        $districts = District::all();
        return view('Backend.UserManagement.profile', compact('user', 'districts'));
    }
    public function edit(User $user)
    {
        $districts = District::all();
        $userid = $user->id;
        $user = User::where('id', $userid)->with('roles')->first();
        // dd($userd);
        $roles =  Role::all();
        return view('Backend.UserManagement.edit', compact('user', 'roles', 'districts'));
    }

    public function update(Request $request, User $user)
    {
        // dd($request);
        if ($request->input('frontend')) {
            $request->validate([
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'address_line_1' => ['required', 'string', 'max:255'],
                'address_line_2' => ['required', 'string', 'max:255'],
                'district' => ['required', 'string'],
                'mobile' => ['required', 'numeric', 'digits:10', Rule::unique('users')->ignore($user->id)],
                'zipCode' => ['required', 'numeric'],
                'city' => ['required', 'string', 'max:255'],
            ]);
        } else {
            $request->validate([
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                'username' => ['required', 'string', 'max:255'],
                'new_password' => ['sometimes', 'string', 'min:3', 'max:8', 'nullable'],
                'confirm_password' => ['sometimes', 'same:new_password'],
                'address_line_1' => ['required', 'string', 'max:255'],
                'address_line_2' => ['required', 'string', 'max:255'],
                'district' => ['required', 'string'],
                'mobile' => ['sometimes', 'required', 'numeric', 'digits:10', Rule::unique('users')->ignore($user->id)],
                'zipCode' => ['required', 'numeric'],
                'city' => ['required', 'string', 'max:255'],
                'role' => ['required_without_all'],
            ]);
        }

        // dd($request->image);

        if ($request->image) {
            $image = $request->image;
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user'), $my_image);
            $user->image = $my_image;
        }

        if ($request->role) {
            $user->roles()->sync($request->role);
        }
        // $user->roles()->sync($request->role);
        $user->fname = $request->fname;
        $user->lname = $request->lname;

        if (!$request->frontend) {
            $user->email = $request->email;
        }

        $user->password = Hash::make($request->confirm_password);

        $user->username = $request->username;
        $user->mobile = $request->mobile;
        $user->save();
        // dd($user->roles);
        $billingaddress = BillingAddress::where('user_id', $user->id)->first();
        // dd($billingaddress);
        if (empty($billingaddress)) {
            $billingaddress = new BillingAddress();
            $billingaddress->address_line_1 = $request->address_line_1;
            $billingaddress->address_line_2 = $request->address_line_2;
            $billingaddress->city = $request->city;
            $billingaddress->district = $request->district;
            $billingaddress->zipCode = $request->zipCode;

            $billingaddress->user()->associate($user)->save();
        } else {
            $billingaddress->address_line_1 = $request->address_line_1;
            $billingaddress->address_line_2 = $request->address_line_2;
            $billingaddress->city = $request->city;
            $billingaddress->district = $request->district;
            $billingaddress->zipCode = $request->zipCode;

            $billingaddress->user()->associate($user)->save();
        }


        Alert::success('User successfully updated');

        if ($user->hasRole('Delivery Officer')) {
            return redirect()->route('dashboard.driver.index');
        } elseif ($request->input('frontend')) {
            return redirect()->route('frontend.profile.index')->with('success', 'User successfully updated');
        } elseif ($user->hasRole('Customer')) {
            return redirect()->route('dashboard.customer.index');
        } else {
            return redirect()->route('dashboard.user.index');
        }
    }
    public function destroy(User $user)
    {
        if ($user->image) {
            File::delete('upload/user' . $user->image);
        }
        /* user role remove */
        $user->roles()->detach();

        /* user address remove */
        // $user->billing_address()->detach();

        $user->delete();
        Alert::success('User Deleted Successfully');
        return redirect()->route('dashboard.user.index');
    }
}
