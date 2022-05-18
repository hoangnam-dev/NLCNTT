<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Categories;
use App\Models\Cities;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function checkOut(Request $request)
    {
        $this->data['title'] = 'Đặt hàng';
        $this->data['categories'] = Categories::orderBy('madm', 'ASC')->get();
        $this->data['cities'] = Cities::orderBy('id_ttp', 'ASC')->get();
        $this->data['carts'] = session()->get('carts');
        $this->data['customerAddress'] = Address::where('makh', Auth::user()->makh)->get();
        $this->data['Address'] = DB::table('diachi')
            ->join('xaphuong', 'diachi.id_xp', '=', 'xaphuong.id_xp')
            ->join('quanhuyen', 'xaphuong.id_qh', '=', 'quanhuyen.id_qh')
            ->join('tinhthanhpho', 'quanhuyen.id_ttp', '=', 'tinhthanhpho.id_ttp')
            ->where('diachi.makh', '=', Auth::user()->makh)
            ->get();
        $this->data['total_item'] = isset(Session::all()['carts']) ? count(Session::all()['carts']) : 0;

        return view('client.cart.checkOut', $this->data);
    }

    // Order
    public function order(Request $request)
    {
        // Get order info
        $deliveryAddr = $request->customerAddr;
        $customerID = $request->customerID;
        $orderTime = date('Y-m-d H:i:s');
        $orderStatus = 0;
        $orderNote = $request->customerNote;

        // Create new record in donhang
        // DB::table('donhang')->insert([
        //     'diachi_gh' => $deliveryAddr,
        //     'makh' =>  $customerID,
        //     'ngaydh' =>  $orderTime,
        //     'trangthai' => $orderStatus,
        //     'ghichu' => $orderNote,
        //     'tongtien' => 0
        // ]);

        // Get new orderID
        $orderID = DB::getPdo()->lastInsertId();
        $carts = session()->get('carts');
        foreach ($carts as $key => $value) {
            // Get carts info
            $productID = $value['product_id'];
            $productQty = $value['product_qty'];
            $productPrice = $value['product_price'];
            $productSubtotal += $value['subtotal'];
            $prd = Products::find($productID);
            $newQty = $prd->soluong - $productQty;

            // Update product quantity
            DB::table('sanpham')
                ->where('masp', $productID)
                ->update(['soluong' => $newQty]);

            // Create new record in chitietdh
            DB::table('chitietdh')->insert([
                'madh' => $orderID,
                'masp' => $productID,
                'soluongmua' =>  $productQty,
                'dongiaban' => $productPrice,
            ]);
        }
        dd($productSubtotal);

        // Update colum tongtien in table donhang
        DB::table('donhang')
            ->where('madh', $orderID)
            ->update(['tongtien' => $productSubtotal]);

        // Destroy session carts
        $request->session()->forget('carts');
        return redirect(route('client.user.order-detail', ['id' => $orderID]))->with('status', 'success')->with('msg', 'Đặt hàng thành công! Cảm ơn vì bạn đã đặt hàng!');
    }

    // Momo Payment
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public function payMoMo(Request $request)
    {
        // dd($request->all());
        $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";

        $partnerCode = "MOMOBKUN20180529";
        $accessKey = "klm05TvNBzhg7h7j";
        $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
        $orderInfo = "Thanh toán qua MoMo";
        $amount = "10000";
        $orderId = time() . "";
        $returnUrl = "http://localhost:8000/test";
        $notifyurl = "http://localhost:8000/test";
        // Lưu ý: link notifyUrl không phải là dạng localhost
        $bankCode = "SML";

        $requestId = time() . "";
        $requestType = "payWithMoMoATM";
        $extraData = "";
        //before sign HMAC SHA256 signature
        $rawHashArr =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'bankCode' => $bankCode,
            'returnUrl' => $returnUrl,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType
        );
        // echo $serectkey;die;
        $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        $data =  array(
            'partnerCode' => $partnerCode,
            'accessKey' => $accessKey,
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'returnUrl' => $returnUrl,
            'bankCode' => $bankCode,
            'notifyUrl' => $notifyurl,
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);  // decode json

        // dd($result);
        error_log(print_r($jsonResult, true));
        return redirect()->to($jsonResult['payUrl']);
        // header('Location: ' . $jsonResult['payUrl']);
    }
}
