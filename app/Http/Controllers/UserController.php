<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;
use DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function addUser()
    {
        return view('admin.user.addUser');
    }


    /**
     * @param Request $request
     * @return $this
     * @throws \Illuminate\Validation\ValidationException
     */
    public function newUser(Request $request)
    {
        $this->validate($request, [
           'username'=>'required|unique:users,username',
           'fullName'=>'required',
           'email'=>'required|unique:users,email',
           'password'=>'required|min:6',
           'role'=>'required',
        ]);
        if ($request->file('image'))
        {
            $userImage = $request->file('image');
            $imageName = time() . '.' . $userImage->getClientOriginalName();
            $directory = 'user-images/';
            $imageUrl = $directory . $imageName;
            //$userImage->move($directory, $imageName);
            $image = Image::make($userImage)->resize(300, 300);
            $image->save($imageUrl);
        }
        else
        {
            $imageUrl = 'user-images/avatar5.png';
        }

        $user = new User();
        $user->username = $request->username;
        $user->fullName = $request->fullName;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->image = $imageUrl;
        $user->remember_token = str_random(10);
        $user->save();
        Toastr::success('User Added Successfully', 'SUCCESS');
        return redirect('/manageUser');
    }

    public function manageUser()
    {
       $users = User::paginate(10);
       return view('admin.user.manageUser',[
           'users' => $users
       ]);
    }

    public function viewUser($id)
    {
        $showUser = User::find($id);
        return view('admin.user.viewUser',[
            'showUser' => $showUser
        ]);
    }

    public function editUser($id)
    {
        $userInfo = User::find($id);
        return view('admin.user.editUser',[
           'userInfo' => $userInfo
        ]);
    }

    public function updateUser(Request $request)
    {
        $this->validate($request, [
            'username'=>'required|unique:users,username',
            'fullName'=>'required',
            'email'=>'required|unique:users,email',
            'role'=>'required',
        ]);

        $updateUser = User::find($request->id);

        if ($request->file('image') && $request->image !== $updateUser->image)
        {
            $userImage = $request->file('image');
            $imageName = $userImage->getClientOriginalName();
            $directory = 'user-images/';
            $imageUrl = $directory . $imageName;
            //$userImage->move($directory, $imageName);
            $image = Image::make($userImage)->resize(300, 300);
            $image->save($imageUrl);
            if (file_exists($updateUser->image) && $updateUser->image !== 'user-images/avatar5.png')
            {
                @unlink($updateUser->image);
            }
        }
        else
        {
            $imageUrl = $updateUser->image;
        }

        $updateUser->username = $request->username;
        $updateUser->fullName = $request->fullName;
        $updateUser->email = $request->email;
        $updateUser->role = $request->role;
        $updateUser->image = $imageUrl;
        $updateUser->save();

        Toastr::success('User Updated Successfully', 'SUCCESS');
        return redirect('/manageUser');
    }

    public function deleteUser($id)
    {

        $deleteUser = User::find($id);
        $deleteUser->delete();
        if (file_exists($deleteUser->image) && $deleteUser->image !== 'user-images/avatar5.png')
        {
            @unlink($deleteUser->image);
        }
        Toastr::success('User Deleted Successfully', 'SUCCESS');
        return redirect('/manageUser');
    }

    public function search(Request $request)
    {

        if ($request->field && $request->search)
        {
            $data = DB::table('users')
                        ->where($request->field,'like','%'.$request->search.'%')
                        ->get();

           if ($data->count() > 0)
            {
                foreach ($data as $key => $search)
                {
                    echo '<tr class="text-bold text-secondary">
                            <td>'. $search->username .'</td>
                            <td>'. $search->fullName .'</td>
                            <td>'. $search->email .'</td>
                            <td>'. ($search->role == 'super' ? "Super Admin" : ($search->role == 'admin' ? "Admin" : "Visitor")) .'</td>
                            <td>
                                <img src="'. $search->image .'" alt="userImage" style="width: 50px;height: 50px;border-radius: 50%">
                            </td>
                            <td>'. $search->created_at .'</td>
                            <td>
                                <a href="'.route('viewUser',['id' => $search->id]).'" class="btn btn-primary">
                                   <i class="fa fa-eye" aria-hidden="true"></i>
                                 </a>
                                 '.(Auth::user()->role == 'super' ? "
                                 <a href=\"".route('editUser',['id' => $search->id])."\" class=\"btn btn-success\">
                                   <i class=\"fa fa-edit\" aria-hidden=\"true\"></i>
                                 </a>
                                 <a href=\"".route('deleteUser',['id' => $search->id])."\" onclick=\"return confirm('Are You Sure!')\" class=\"btn btn-danger\">
                                  <i class=\"fa fa-trash-alt\" aria-hidden=\"true\"></i>
                                 </a>
                                 " : "").'
                            </td>
                          </tr>';


                }

            }
           else
           {
               echo '<tr>
                        <td colspan="7">
                            <span class="text-bold text-danger">No User Found..!!</span>
                        </td>
                     </tr>';
           }
        }
    }

    public function viewProfile()
    {
        return view('admin.profile.viewProfile');
    }

    public function editProfile()
    {
        return view('admin.profile.editProfile');
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, [
            'username'=>'required',
            'fullName'=>'required',
            'email'=>'required',
            'role'=>'required',
        ]);

        $updateProfile = User::find($request->id);

        if ($request->file('image') && $request->image !== $updateProfile->image)
        {
            $userImage = $request->file('image');
            $imageName = $userImage->getClientOriginalName();
            $directory = 'user-images/';
            $imageUrl = $directory . $imageName;
            //$userImage->move($directory, $imageName);
            $image = Image::make($userImage)->resize(300, 300);
            $image->save($imageUrl);
            if (file_exists($updateProfile->image) && $updateProfile->image !== 'user-images/avatar5.png')
            {
                @unlink($updateProfile->image);
            }
        }
        else
        {
            $imageUrl = $updateProfile->image;
        }

        $updateProfile->username = $request->username;
        $updateProfile->fullName = $request->fullName;
        $updateProfile->email = $request->email;
        $updateProfile->role = $request->role;
        $updateProfile->image = $imageUrl;
        $updateProfile->save();

        Toastr::success('Profile Updated Successfully', 'SUCCESS');
        return redirect('/viewProfile');
    }

    public function changePassword()
    {
        return view('admin.profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword'=>'required',
            'newPassword'=>'required',
            'confirmPassword'=>'required',
        ]);

        if (Hash::check($request->oldPassword, Auth::user()->password) )
        {
            if ($request->newPassword == $request->confirmPassword)
            {
                Auth::user()->password = bcrypt($request->newPassword);
                Auth::user()->save();

                Toastr::success('Password Changed Successfully', 'SUCCESS');
                return redirect('/changePassword');
            }
            else
            {
                Toastr::error('New & Confirm Password Not Matching!!', 'ERROR');
                return redirect('/changePassword');
            }
        }
        else
        {
            Toastr::error('Old Password Not Matching!!', 'ERROR');
            return redirect('/changePassword');
        }
    }

    public function username_validation(Request $request)
    {
        $validate = User::where($request->field, $request->username)->get();


        if ($validate->count() > 0)
        {
            echo 'This username has already taken';
        }
        else
        {
            echo '';
        }
    }

    public function email_validation(Request $request)
    {
        $validate = User::where($request->field, $request->email)->get();


        if ($validate->count() > 0)
        {
            echo 'This email has already taken';
        }
        else
        {
            echo '';
        }
    }
}
