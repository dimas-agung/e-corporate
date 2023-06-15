<?php

namespace Tests\Feature;

use App\Models\Uom;
use App\Services\UomService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UomServiceTest extends TestCase
{
    private UomService $uomService;
    //sama kayak contruct di controller
    protected function setUp(): void
    {
        parent::setUp();
        $this->uomService = $this->app->make(UomService::class);
    }
    function testSaveUom()
    {
        $count_data = Uom::count();
        // $uom_code = 'UOMTEST';
        $uom_code = 'UOMTEST' . $count_data + 1;
        $description = 'UOM TESTING';
        $unit_code = 'UNITTEST';
        $dataUom = $this->uomService->saveUom($uom_code, $description);

        $this->assertEquals($dataUom->uom_code, $uom_code);
        $this->assertDatabaseHas('uom', [
            'uom_code' => $uom_code
        ]);
    }
    function testSaveUomDuplicateUomCode()
    {
        $count_data = Uom::count();
        // $uom_code = 'UOMTEST';
        $uom_code = 'UOMTEST' . $count_data;
        $description = 'UOM TESTING';
        $unit_code = 'UNITTEST';
        $this->uomService->saveUom($uom_code, $description);
        // $this->expectException("Exception");
        // $this->expectExceptionCode(100);
        $this->expectExceptionMessage("Uom code is not unique!");
        // $this->assertEquals($dataUom, 'Uom code is not unique!');
        // $this->assertEquals($dataUom->uom_code, $uom_code);
    }
    function testIsExistUomCode()
    {

        $count_data = Uom::count();
        $uom_code = 'UOMTEST' . $count_data;
        $IsExistUomCode = $this->uomService->isExistUomCode($uom_code);
        $this->assertTrue($IsExistUomCode);
    }
    function testNotExistUomCode()
    {
        $uom_code = 'UOMTESTwadewa';
        $IsExistUomCode = $this->uomService->isExistUomCode($uom_code);
        $this->assertFalse($IsExistUomCode);
    }
    // function testSaveUomItem()
    // {
    //     $count_data = Uom::count();
    //     $uom_code = 'UOMTEST' . $count_data;
    //     $description = 'UOM TESTING';
    //     $unit_code = 'UNITTEST';
    //     $dataUom = $this->uomService->saveUom($uom_code, $description);

    //     $this->assertEquals($dataUom->uom_code, $uom_code);
    //     $this->assertDatabaseHas('uom', [
    //         'uom_code' => $uom_code
    //     ]);
    // }
}
