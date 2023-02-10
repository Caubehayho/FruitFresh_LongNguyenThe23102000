<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;


class DeliveryController extends Controller
{

    public function update_feeship(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'], '.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }



    public function select_feeship(){
        $feeship = Feeship::orderby('fee_id', 'DESC')->get();
        $output = '';
        $output .= '
        <div class="table-responsive" style="margin-top: 30px">
            <table class="table align-items-center table-flush">
                <thread class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="budget">Tên thành phố</th>
                        <th scope="col" class="sort" data-sort="status">Tên quận huyện</th>
                        <th scope="col" class="sort" data-sort="status">Tên xã phường</th>
                        <th scope="col" class="sort" data-sort="status">Phí ship</th>
                    </tr>
                </thread>
                <tbody  class="list">
                ';
                foreach($feeship as $key => $fee){
                    $output .= '
                    <tr>
                        <td>'.$fee->city->name_city.'</td>
                        <td>'.$fee->province->name_quanhuyen.'</td>
                        <td>'.$fee->wards->name_xaphuong.'</td>
                        <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').' </td>
                    </tr>
                    ';
                }
                $output .= '
                </tbody>

            </table>
        </div>
        ';
        echo $output;
    }


    public function insert_delivery(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }


    
    public function delivery(Request $request){
        $title ='Quản lý vận chuyển';
        $city = City::orderby('matp', 'ASC')->get();

        return view('admin.delivery.add_delivery', compact('title'))->with(compact('city'));
    }


    public function select_delivery(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_province = Province::where('matp',$data['ma_id'])->orderby('maqh', 'ASC')->get();
                    $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_province as $key =>$province){
                    $output.= '<option value="'.$province->maqh.'">'.$province->name_quanhuyen.'</option>';
                }
            }
            else{
                $select_wards = Wards::where('maqh',$data['ma_id'])->orderby('xaid', 'ASC')->get();
                     $output.='<option>---Chọn xã phường---</option>';
                foreach($select_wards as $key =>$ward){
                    $output.= '<option value="'.$ward->xaid.'">'.$ward->name_xaphuong.'</option>';
                }

            }   
           
        }
        echo $output;
    }



    

    
}
