<?php
    class Home extends Controller {
        //function mặc định
        function SayHi() {
            $sinhvien = $this->model("SinhVienModel");
            echo $sinhvien->getSinhVien();
        }

        function Show($a, $b) {
            $sinhvien = $this->model("SinhVienModel");
            $tong = $sinhvien->Tong($a, $b);
            $this->view("clothes", [
                "Page" => "voucher",
                "Number" => $tong,
                "Mau"=>"red"
            ]);
        }
    }
?>