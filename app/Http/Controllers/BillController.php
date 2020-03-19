<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Shop;
use Barryvdh\DomPDF\Facade as PDF;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function addBill($id)
    {
        $shop = Shop::find($id);
        return view('admin.shopBill.addBill', [
            'shop' => $shop
        ]);
    }

    public function newBill(Request $request)
    {
        $this->validate($request, [
            'shop_id' => 'required',
            'shop_floor' => 'required',
            'month' => 'required',
            'year' => 'required',
            'bill_id' => 'required|unique:bills,bill_id',
            'previous_unit' => 'required',
            'current_unit' => 'required',
            'used_unit' => 'required',
            'unit_rate' => 'required',
            'total_amount' => 'required',
            'payment_status' => 'required',
            'last_date' => 'required',
        ]);

        $bill = new Bill();
        $bill->shop_id = $request->shop_id;
        $bill->shop_floor = $request->shop_floor;
        $bill->month = $request->month;
        $bill->year = $request->year;
        $bill->bill_id = $request->bill_id;
        $bill->previous_unit = $request->previous_unit;
        $bill->current_unit = $request->current_unit;
        $bill->used_unit = $request->used_unit;
        $bill->unit_rate = $request->unit_rate;
        $bill->previous_due = $request->previous_due;
        $bill->additional_fee = $request->additional_fee;
        $bill->exclude_fee = $request->exclude_fee;
        $bill->exclude_due = $request->total_amount_due;
        $bill->total_amount = $request->total_amount;
        $bill->after_date = $request->after_date;
        $bill->paid_amount = $request->paid_amount;
        $bill->due_amount = $request->due_amount;
        $bill->payment_status = $request->payment_status;
        $bill->last_date = $request->last_date;
        $bill->save();
        Toastr::success('Bill Added Successfully', 'SUCCESS');
        return redirect('/manageBill-' . $request->shop_id);
    }

    public function manageBill($id)
    {
        $shop = Shop::find($id);

        $bills = $shop->bills()->paginate(10);

        return view('admin.shopBill.manageBill', [
            'bills' => $bills,
            'shop' => $shop
        ]);
    }

    public function viewBill($id)
    {
        $showBill = Bill::find($id);
        return view('admin.shopBill.viewBill',[
            'showBill' => $showBill
        ]);
    }

    public function editBill($id)
    {
        $bill = Bill::find($id);

        return view('admin.shopBill.editBill', [
            'bill' => $bill
        ]);
    }

    public function updateBill(Request $request)
    {
        $this->validate($request, [
            'shop_id' => 'required',
            'shop_floor' => 'required',
            'month' => 'required',
            'year' => 'required',
            'previous_unit' => 'required',
            'current_unit' => 'required',
            'used_unit' => 'required',
            'unit_rate' => 'required',
            'total_amount' => 'required',
            'payment_status' => 'required',
            'last_date' => 'required',
        ]);

        $bill = Bill::find($request->id);
        $bill->shop_id = $request->shop_id;
        $bill->shop_floor = $request->shop_floor;
        $bill->month = $request->month;
        $bill->year = $request->year;
        $bill->bill_id = $request->bill_id;
        $bill->previous_unit = $request->previous_unit;
        $bill->current_unit = $request->current_unit;
        $bill->used_unit = $request->used_unit;
        $bill->unit_rate = $request->unit_rate;
        $bill->previous_due = $request->previous_due;
        $bill->additional_fee = $request->additional_fee;
        $bill->exclude_fee = $request->exclude_fee;
        $bill->exclude_due = $request->total_amount_due;
        $bill->total_amount = $request->total_amount;
        $bill->after_date = $request->after_date;
        $bill->paid_amount = $request->paid_amount;
        $bill->due_amount = $request->due_amount;
        $bill->payment_status = $request->payment_status;
        $bill->last_date = $request->last_date;
        $bill->save();

        Toastr::success('Bill Updated Successfully', 'SUCCESS');
        return redirect('/manageBill-' . $request->shop_id);
    }

    public function deleteBill($id)
    {

        $deleteBill = Bill::find($id);
        $deleteBill->delete();

        Toastr::success('Bill Deleted Successfully', 'SUCCESS');
        return redirect('/manageBill-' . $deleteBill->shop_id);
    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        if ($request->field && $request->search)
        {
            $shop = Shop::find($request->id);

            $data = $shop->bills()
                ->where($request->field,'like','%'.$request->search.'%')
                ->get();

            if ($data->count() > 0)
            {
                foreach ($data as $key => $search)
                {
                    echo '
                            <tr class="text-bold text-secondary">
                            <td>'. $search->month .'</td>
                            <td>'. $search->year .'</td>
                            <td>'. $search->current_unit .'</td>
                            <td>'. $search->previous_unit .'</td>
                            <td>'. $search->used_unit .'</td>
                            <td>'. $search->previous_due .'</td>
                            <td>'. $search->additional_fee .'</td>
                            <td>'. $search->total_amount .'</td>
                            <td>'. $search->paid_amount .'</td>
                            <td>'. $search->due_amount .'</td>
                            <td>
                                '.($search->payment_status == 'Paid' ? "
                                    <span class=\"text-bold text-success\">$search->payment_status</span>
                                " : "
                                ".($search->payment_status == 'Due' ? "
                                    <span class=\"text-bold text-danger\">$search->payment_status</span>
                                " : "
                                    <span class=\"text-bold text-primary\">$search->payment_status</span>
                                ")."
                                ").'
                            </td>
                            <td>
                               <a href="'.route('viewBill',['id' => $search->id]).'" class="btn-sm btn-primary mr-1">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                               </a>
                            '.(Auth::user()->role == 'super' || Auth::user()->role == 'admin' ? "
                               <a href=\"".route('editBill',['id' => $search->id])."\" class=\"btn-sm btn-success mr-1\">
                                 <i class=\"fa fa-edit\" aria-hidden=\"true\"></i>
                               </a>
                               <a href=\"".route('deleteBill',['id' => $search->id])."\" onclick=\"return confirm('Are You Sure!')\" class=\"btn-sm btn-danger\">
                                 <i class=\"fa fa-trash-alt\" aria-hidden=\"true\"></i>
                               </a>
                               " : "").'
                            </td>
                          </tr>
                          ';



                }


            }
            else
            {
                echo '<tr>
                         <td colspan="12">
                            <span class="text-bold text-danger">No Bill Found..!!</span>
                         </td>
                      </tr>';
            }



        }
    }

    public function invoiceBill($id)
    {
        $invoiceBill = Bill::find($id);
        //$showBill = Bill::find($id);
        //return view('admin.shopBill.invoiceBill',[
            //'invoiceBill' => $invoiceBill
        //]);

        $pdf = PDF::loadView('admin.shopBill.invoiceBill',[
            'invoiceBill' => $invoiceBill
        ]);
        return $pdf->stream();
    }

    public function bill_list()
    {
        $bill_list = Bill::orderBy('id', 'desc')->paginate(10);
        $total = Bill::all()->sum('total_amount');
        $paid = Bill::all()->sum('paid_amount');
        $due = Bill::all()->sum('due_amount');

        return view('admin.bill_list.bill_list', [
            'bill_list' => $bill_list,
            'total' => $total,
            'paid' => $paid,
            'due' => $due
        ]);
    }

    public function monthlyBill(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $floor = $request->floor;

        $monthlyBill = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->paginate(10);
        $total = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get()->sum('total_amount');
        $paid = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get()->sum('paid_amount');
        $due = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get()->sum('due_amount');

        return view('admin.bill_list.monthlyBill', [
            'month' => $month,
            'year' => $year,
            'floor' => $floor,
            'monthlyBill' => $monthlyBill,
            'total' => $total,
            'paid' => $paid,
            'due' => $due
        ]);
    }

    public function print_monthly_bill($month,$year,$floor)
    {
        $monthlyBill = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get();
        $total = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get()->sum('total_amount');
        $paid = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get()->sum('paid_amount');
        $due = Bill::where('month', $month)->where('year', $year)->where('shop_floor', $floor)->get()->sum('due_amount');



        $pdf = PDF::loadView('admin.bill_list.print_monthly_bill',[
            'month' => $month,
            'year' => $year,
            'floor' => $floor,
            'monthlyBill' => $monthlyBill,
            'total' => $total,
            'paid' => $paid,
            'due' => $due
        ]);
        $pdf->setPaper('A4', 'landscape');
        //$pdf->render();
        return $pdf->stream();
    }

    public function bill_id_validation(Request $request)
    {
       $validate = Bill::where($request->field, $request->bill_id)->get();


       if ($validate->count() > 0)
       {
           echo 'This bill_id has already taken';
       }
       else
       {
           echo '';
       }
    }
}



