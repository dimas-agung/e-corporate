<?php

namespace App\Services;

use App\Models\Uom;
use App\Models\UomItem;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UomService
{
    private static array $UomInput;
    private static array $UomItemInput;
    public function __construct()
    {
        self::$UomInput = [];
        self::$UomItemInput = [];
    }
    // setter
    public function setUomInput($uom_code, $description): void
    {
        self::$UomInput = [
            'uom_code' => $uom_code,
            'description' => $description,
        ];
    }
    public function setUomItemInput($uom_code, $uom_desc, $to_uom_code, $to_uom_desc): void
    {
        self::$UomItemInput[] = [
            'uom_code' => $uom_code,
            'uom_desc' => $uom_desc,
            'to_uom_code' => $to_uom_code,
            'to_uom_desc' => $to_uom_desc,
        ];
    }
    //getter
    function getUomInput()
    {
        return self::$UomInput;
    }
    function getUomItemInput()
    {
        return self::$UomItemInput;
    }


    public function saveUom($uom_code, $description)
    {
        if (self::isExistUomCode($uom_code)) {
            // throw new Exception("Error Processing Request", 1);
            throw new \Exception('Uom code is not unique!');
        }
        $uom = Uom::create([
            'uom_code' => $uom_code,
            'description' => $description,
        ]);
        return $uom;
    }
    public function saveUomItem($uom_code, $uom_desc, $to_uom_code, $to_uom_desc)
    {
        $uomItem = UomItem::create([
            'uom_code' => $uom_code,
            'uom_desc' => $uom_desc,
            'to_uom_code' => $to_uom_code,
            'to_uom_desc' => $to_uom_desc,
        ]);
        return $uomItem;
    }

    // v2
    function create()
    {
        DB::transaction();
        self::createUom();
        self::createUomItem();
        DB::commit();
    }
    public function createUom()
    {
        $uom = Uom::create(self::$UomInput);
        return $uom;
    }
    public function createUomItem()
    {
        $uom_item = UomItem::insert(self::$UomItemInput);
        return $uom_item;
    }
    public function isExistUomCode($uom_code)
    {
        return Uom::where('uom_code', $uom_code)->exists();
    }
}
