<?php

namespace Database\Seeders;

use App\Models\MaterialCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    protected $toTruncate = ['users', 'role', 'department', 'section', 'grade_title', 'bank', 'marital_status', 'employee'];

    public function run()
    {
        Model::unguard();

        Schema::disableForeignKeyConstraints();

        foreach ($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }
        Schema::enableForeignKeyConstraints();

        // module User
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(GradeTitleSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(MaritalStatusSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(UomSeeder::class);
        $this->call(UomItemSeeder::class);
        $this->call(MaterialCategorySeeder::class);
        $this->call(MaterialSeeder::class);


        Model::reguard();
    }
}
