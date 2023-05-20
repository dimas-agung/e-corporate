<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "bank_code" => "BANK001",
                "bank_name" => "BANK ARTHA GRAHA INTERNASIONAL",
                "description" => "AGI"
            ],
            [
                "bank_code" => "BANK002",
                "bank_name" => "BANK ANDA",
                "description" => "AND"
            ],
            [
                "bank_code" => "BANK003",
                "bank_name" => "BANK BUMI ARTA",
                "description" => "BA"
            ],
            [
                "bank_code" => "BANK004",
                "bank_name" => "BANK CENTRAL ASIA",
                "description" => "BCA"
            ],
            [
                "bank_code" => "BANK005",
                "bank_name" => "BANK CENTRAL ASIA SYARIAH",
                "description" => "BCASRH"
            ],
            [
                "bank_code" => "BANK006",
                "bank_name" => "BANK INTERNASIONAL INDONESIA",
                "description" => "BII"
            ],
            [
                "bank_code" => "BANK007",
                "bank_name" => "BANK NASIONAL INDONESIA",
                "description" => "BNI"
            ],
            [
                "bank_code" => "BANK008",
                "bank_name" => "BANK RAKYAT INDONESIA",
                "description" => "BRI"
            ],
            [
                "bank_code" => "BANK009",
                "bank_name" => "BANK SYARIAH INDONESIA",
                "description" => "BSI"
            ],
            [
                "bank_code" => "BANK010",
                "bank_name" => "BANK TABUNGAN NEGARA",
                "description" => "BTN"
            ],
            [
                "bank_code" => "BANK011",
                "bank_name" => "BANK TABUNGAN PENSIUNAN NEGARA",
                "description" => "BTPN"
            ],
            [
                "bank_code" => "BANK012",
                "bank_name" => "BANK BUKOPIN",
                "description" => "BUK"
            ],
            [
                "bank_code" => "BANK013",
                "bank_name" => "CITYBANK",
                "description" => "CBA"
            ],
            [
                "bank_code" => "BANK014",
                "bank_name" => "CHINA CONTRUCTION BANK INDONESIA",
                "description" => "CCB"
            ],
            [
                "bank_code" => "BANK015",
                "bank_name" => "COMMONWEALTH",
                "description" => "CMW"
            ],
            [
                "bank_code" => "BANK016",
                "bank_name" => "CENTRATAMA NASIONAL BANK",
                "description" => "CNB"
            ],
            [
                "bank_code" => "BANK017",
                "bank_name" => "BANK DANAMON",
                "description" => "DAN"
            ],
            [
                "bank_code" => "BANK018",
                "bank_name" => "BANK HSBC",
                "description" => "HSBC"
            ],
            [
                "bank_code" => "BANK019",
                "bank_name" => "BANK INDEX",
                "description" => "IDX"
            ],
            [
                "bank_code" => "BANK020",
                "bank_name" => "BANK INA PERDANA",
                "description" => "INA"
            ],
            [
                "bank_code" => "BANK021",
                "bank_name" => "BANK JAWA TIMUR",
                "description" => "JATIM"
            ],
            [
                "bank_code" => "BANK022",
                "bank_name" => "J TRUST BANK",
                "description" => "JTB"
            ],
            [
                "bank_code" => "BANK023",
                "bank_name" => "BANK MAYAPADA",
                "description" => "MA"
            ],
            [
                "bank_code" => "BANK024",
                "bank_name" => "BANK MANDIRI",
                "description" => "MAN"
            ],
            [
                "bank_code" => "BANK025",
                "bank_name" => "BANK MANDIRI SYARIAH",
                "description" => "MANS"
            ],
            [
                "bank_code" => "BANK026",
                "bank_name" => "BANK MASPION",
                "description" => "MAS"
            ],
            [
                "bank_code" => "BANK027",
                "bank_name" => "MAY BANK",
                "description" => "MAY"
            ],
            [
                "bank_code" => "BANK028",
                "bank_name" => "BANK MAYAPADA",
                "description" => "MAYA"
            ],
            [
                "bank_code" => "BANK029",
                "bank_name" => "BANK MEGA",
                "description" => "MEG"
            ],
            [
                "bank_code" => "BANK030",
                "bank_name" => "BANK METRO",
                "description" => "MET"
            ],
            [
                "bank_code" => "BANK031",
                "bank_name" => "BANK MUAMALAT",
                "description" => "MUA"
            ],
            [
                "bank_code" => "BANK032",
                "bank_name" => "BANK MULTIARTA SENTOSA",
                "description" => "MUL"
            ],
            [
                "bank_code" => "BANK033",
                "bank_name" => "BANK CIMB NIAGA",
                "description" => "NIA"
            ],
            [
                "bank_code" => "BANK034",
                "bank_name" => "NATIONAL BANK",
                "description" => "NOBU"
            ],
            [
                "bank_code" => "BANK035",
                "bank_name" => "BANK OCBC",
                "description" => "OCBC"
            ],
            [
                "bank_code" => "BANK036",
                "bank_name" => "BANK PANIN",
                "description" => "PAN"
            ],
            [
                "bank_code" => "BANK037",
                "bank_name" => "BANK PAPUA",
                "description" => "PAP"
            ],
            [
                "bank_code" => "BANK038",
                "bank_name" => "BANK PERMATA",
                "description" => "PER"
            ],
            [
                "bank_code" => "BANK039",
                "bank_name" => "PRIMA BANK",
                "description" => "PRIM"
            ],
            [
                "bank_code" => "BANK040",
                "bank_name" => "RABOBANK",
                "description" => "RBB"
            ],
            [
                "bank_code" => "BANK041",
                "bank_name" => "SHINHAN BANK",
                "description" => "SHI"
            ],
            [
                "bank_code" => "BANK042",
                "bank_name" => "BANK SINARMAS",
                "description" => "SIN"
            ],
            [
                "bank_code" => "BANK043",
                "bank_name" => "BANK UOB",
                "description" => "UOB"
            ]
        ];
        Bank::insert($data);
    }
}
