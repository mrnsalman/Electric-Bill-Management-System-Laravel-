<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function addShop()
    {
        return view('admin.shop.addShop');
    }


    /**
     * @param Request $request
     * @return $this
     * @throws \Illuminate\Validation\ValidationException
     */
    public function newShop(Request $request)
    {
        $this->validate($request, [
            'shop_no'=>'required',
            'floor'=>'required',
            'shop_id'=>'required|unique:shops,shop_id',
            'shop_name'=>'required',
            'user'=>'required',
            'shop_owner'=>'required',
            'owner_address'=>'required',
            'owner_contact'=>'required',

        ]);
        if ($request->file('image'))
        {
            $userImage = $request->file('image');
            $imageName = time() . '.' . $userImage->getClientOriginalName();
            $directory = 'shopOwner-images/';
            $imageUrl = $directory . $imageName;
            //$userImage->move($directory, $imageName);
            $image = Image::make($userImage)->resize(300, 300);
            $image->save($imageUrl);
        }
        else
        {
            $imageUrl = 'shopOwner-images/avatar5.png';
        }

        $shop = new Shop();
        $shop->shop_no = $request->shop_no;
        $shop->floor = $request->floor;
        $shop->shop_id= $request->shop_id;
        $shop->shop_name = $request->shop_name;
        $shop->user_id = $request->user;
        $shop->shop_owner = $request->shop_owner;
        $shop->owner_address = $request->owner_address;
        $shop->owner_contact = $request->owner_contact;
        $shop->image = $imageUrl;
        $shop->save();
        Toastr::success('Shop Added Successfully', 'SUCCESS');
        return redirect('/manageShop');
    }

    public function manageShop()
    {
        if (Auth::user()->role == 'visitor')
        {
            $user = User::find(Auth::user()->id);
            $shops = $user->shops()->paginate(10);
            return view('admin.shop.manageShop',[
                'shops' => $shops
            ]);
        }
        else
        {
            $shops = Shop::orderBy('status', 'asc')->paginate(10);
            return view('admin.shop.manageShop',[
                'shops' => $shops
            ]);
        }
    }

    public function viewShop($id)
    {
        $showShop = Shop::find($id);
        return view('admin.shop.viewShop',[
            'showShop' => $showShop
        ]);
    }

    public function editShop($id)
    {
        $shopInfo = Shop::find($id);
        return view('admin.shop.editShop',[
            'shopInfo' => $shopInfo
        ]);
    }

    public function updateShop(Request $request)
    {
        $this->validate($request, [
            'shop_no'=>'required',
            'floor'=>'required',
            'shop_id'=>'required|unique:shops,shop_id',
            'shop_name'=>'required',
            'user'=>'required',
            'shop_owner'=>'required',
            'owner_address'=>'required',
            'owner_contact'=>'required',

        ]);

        $updateShop = Shop::find($request->id);

        if ($request->file('image') && $request->image !== $updateShop->image)
        {
            $userImage = $request->file('image');
            $imageName = time() . '.' . $userImage->getClientOriginalName();
            $directory = 'shopOwner-images/';
            $imageUrl = $directory . $imageName;
            //$userImage->move($directory, $imageName);
            $image = Image::make($userImage)->resize(300, 300);
            $image->save($imageUrl);
            if (file_exists($updateShop->image) && $updateShop->image !== 'shopOwner-images/avatar5.png')
            {
                @unlink($updateShop->image);
            }
        }
        else
        {
            $imageUrl = $updateShop->image;
        }

        $updateShop->shop_no = $request->shop_no;
        $updateShop->floor = $request->floor;
        $updateShop->shop_id= $request->shop_id;
        $updateShop->shop_name = $request->shop_name;
        $updateShop->user_id = $request->user;
        $updateShop->shop_owner = $request->shop_owner;
        $updateShop->owner_address = $request->owner_address;
        $updateShop->owner_contact = $request->owner_contact;
        $updateShop->image = $imageUrl;
        $updateShop->save();

        Toastr::success('Shop Updated Successfully', 'SUCCESS');
        return redirect('/manageShop');
    }

    public function deleteShop($id)
    {

        $deleteShop = Shop::find($id);
        $deleteShop->delete();
        if (file_exists($deleteShop->image) && $deleteShop->image !== 'shopOwner-images/avatar5.png')
        {
            @unlink($deleteShop->image);
        }
        Toastr::success('Shop Deleted Successfully', 'SUCCESS');
        return redirect('/manageShop');
    }

    public function search(Request $request)
    {
        if ($request->field && $request->search)
        {
            $data = DB::table('shops')
                ->where($request->field,'like','%'.$request->search.'%')
                ->get();

            if ($data->count() > 0)
            {
                foreach ($data as $key => $search)
                {
                    echo '<tr class="text-bold text-secondary">
                            <td>'. $search->shop_no .'</td>
                            <td>'. $search->floor .'</td>
                            <td>'. $search->shop_name .'</td>
                            <td>'. $search->shop_owner .'</td>
                            <td>'. $search->owner_contact .'</td>
                            <td>
                                <img src="'. $search->image .'" alt="userImage" style="width: 50px;height: 50px;border-radius: 50%">
                            </td>
                            <td>
                                '.(Auth::user()->role == 'super' ? "
                                 ".($search->status == 2 ? "
                                 <a href=\"".route('statusChange',['id' => $search->id])."\" class=\"btn btn-dark\">
                                   <i class=\"fa fa-arrow-circle-down\" aria-hidden=\"true\"></i>
                                 </a>
                                 " : "
                                 <a href=\"".route('statusChange',['id' => $search->id])."\" class=\"btn btn-warning\">
                                   <i class=\"fa fa-arrow-circle-up\" aria-hidden=\"true\"></i>
                                 </a>
                                 ")."
                                " : "
                                 ".($search->status == 2 ? "
                                 <a href=\"".route('statusChange',['id' => $search->id])."\" class=\"btn btn-dark disabled\">
                                   <i class=\"fa fa-arrow-circle-down\" aria-hidden=\"true\"></i>
                                 </a>
                                 " : "
                                 <a href=\"".route('statusChange',['id' => $search->id])."\" class=\"btn btn-warning disabled\">
                                   <i class=\"fa fa-arrow-circle-up\" aria-hidden=\"true\"></i>
                                 </a>
                                 ")."
                                 ").'
                            </td>
                            <td>
                                <a href="'.route('viewShop',['id' => $search->id]).'" class="btn btn-primary">
                                   <i class="fa fa-eye" aria-hidden="true"></i>
                                 </a>
                                 '.($search->status == 1 ? "
                                 <a href=\"".route('manageBill',['id' => $search->id])."\" class=\"btn btn-secondary\">
                                   <i class=\"fa fa-list\" aria-hidden=\"true\"></i>
                                 </a>
                                 " : "
                                 <a href=\"'.route('addBill',['id' => $search->id]).'\" class=\"btn btn-secondary disabled\">
                                   <i class=\"fa fa-list\" aria-hidden=\"true\"></i>
                                 </a>").'
                                 <a href="'.route('editShop',['id' => $search->id]).'" class="btn btn-success">
                                   <i class="fa fa-edit" aria-hidden="true"></i>
                                 </a>
                                 <a href="'.route('deleteShop',['id' => $search->id]).'" class="btn btn-danger">
                                   <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                 </a>
                            </td>
                          </tr>';



                }


            }
            else
            {
                echo '<tr>
                        <td colspan="8">
                            <span class="text-bold text-danger">No Shop Found..!!</span>
                        </td>
                     </tr>';
            }
        }
    }

    public function userSearch(Request $request)
    {
        if ($request->user)
        {
            $data = DB::table('users')
                ->where($request->field,'like',''.$request->user.'%')
                ->get();

            $output = '<ul class="dropdown-menu" style="display:block;position:relative">';
            foreach ($data as $user)
            {
                $output .= '<li class="dropdown-item" value="'.$user->id.'" style="cursor:pointer">'.$user->username.'</li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function statusChange($id)
    {
        $shopStatus = Shop::find($id);

        if ($shopStatus->status == 2)
        {
            $shopStatus->status = 1;
        }
        else
        {
            $shopStatus->status = 2;
        }

        $shopStatus->save();

        Toastr::success('Status Updated Successfully', 'SUCCESS');
        return redirect('/manageShop');
    }

    public function shop_id_validation(Request $request)
    {
        $validate = Shop::where($request->field, $request->shop_id)->get();


        if ($validate->count() > 0)
        {
            echo 'This shop has already added';
        }
        else
        {
            echo '';
        }
    }
}

