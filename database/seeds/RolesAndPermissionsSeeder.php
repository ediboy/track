<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // projects permissions
        Permission::create(['name' => 'view projects']);
        Permission::create(['name' => 'add projects']);
        Permission::create(['name' => 'edit projects']);
        Permission::create(['name' => 'delete projects']);

        // tasks permissions
        Permission::create(['name' => 'view tasks']);
        Permission::create(['name' => 'add tasks']);
        Permission::create(['name' => 'edit tasks']);
        Permission::create(['name' => 'delete tasks']);

        // teams permissions
        Permission::create(['name' => 'view teams']);
        Permission::create(['name' => 'add teams']);
        Permission::create(['name' => 'edit teams']);
        Permission::create(['name' => 'delete teams']);

        // employees permissions
        Permission::create(['name' => 'view employees']);
        Permission::create(['name' => 'add employees']);
        Permission::create(['name' => 'edit employees']);
        Permission::create(['name' => 'delete employees']);

        // attendance permissions
        Permission::create(['name' => 'view attendance']);
        Permission::create(['name' => 'add attendance']);
        Permission::create(['name' => 'edit attendance']);
        Permission::create(['name' => 'delete attendance']);

        // payroll permissions
        Permission::create(['name' => 'view payroll']);
        Permission::create(['name' => 'add payroll']);
        Permission::create(['name' => 'edit payroll']);
        Permission::create(['name' => 'delete payroll']);

        // benefits permissions
        Permission::create(['name' => 'view benefits']);
        Permission::create(['name' => 'add benefits']);
        Permission::create(['name' => 'edit benefits']);
        Permission::create(['name' => 'delete benefits']);

        // deductions permissions
        Permission::create(['name' => 'view deductions']);
        Permission::create(['name' => 'add deductions']);
        Permission::create(['name' => 'edit deductions']);
        Permission::create(['name' => 'delete deductions']);

        // holidays permissions
        Permission::create(['name' => 'view holidays']);
        Permission::create(['name' => 'add holidays']);
        Permission::create(['name' => 'edit holidays']);
        Permission::create(['name' => 'delete holidays']);

        // bonus permissions
        Permission::create(['name' => 'view bonus']);
        Permission::create(['name' => 'add bonus']);
        Permission::create(['name' => 'edit bonus']);
        Permission::create(['name' => 'delete bonus']);

        // loans permissions
        Permission::create(['name' => 'view loans']);
        Permission::create(['name' => 'add loans']);
        Permission::create(['name' => 'edit loans']);
        Permission::create(['name' => 'delete loans']);
        Permission::create(['name' => 'request loans']);
        Permission::create(['name' => 'approve loans']);

        // cash advances permissions
        Permission::create(['name' => 'view cash advances']);
        Permission::create(['name' => 'add cash advances']);
        Permission::create(['name' => 'edit cash advances']);
        Permission::create(['name' => 'delete cash advances']);
        Permission::create(['name' => 'request cash advances']);
        Permission::create(['name' => 'approve cash advances']);

        // allowances permissions
        Permission::create(['name' => 'view allowances']);
        Permission::create(['name' => 'add allowances']);
        Permission::create(['name' => 'edit allowances']);
        Permission::create(['name' => 'delete allowances']);

        // overtime permissions
        Permission::create(['name' => 'view overtime']);
        Permission::create(['name' => 'add overtime']);
        Permission::create(['name' => 'edit overtime']);
        Permission::create(['name' => 'delete overtime']);
        Permission::create(['name' => 'request overtime']);
        Permission::create(['name' => 'approve overtime']);

        // leaves permissions
        Permission::create(['name' => 'view leaves']);
        Permission::create(['name' => 'add leaves']);
        Permission::create(['name' => 'edit leaves']);
        Permission::create(['name' => 'delete leaves']);
        Permission::create(['name' => 'request leaves']);
        Permission::create(['name' => 'approve leaves']);

        // announcements permissions
        Permission::create(['name' => 'view announcements']);
        Permission::create(['name' => 'add announcements']);
        Permission::create(['name' => 'edit announcements']);
        Permission::create(['name' => 'delete announcements']);

        // rewards permissions
        Permission::create(['name' => 'view rewards']);
        Permission::create(['name' => 'add rewards']);
        Permission::create(['name' => 'edit rewards']);
        Permission::create(['name' => 'delete rewards']);

        // slider permissions
        Permission::create(['name' => 'view slider']);
        Permission::create(['name' => 'add slider']);
        Permission::create(['name' => 'edit slider']);
        Permission::create(['name' => 'delete slider']);

        // statistics permissions
        Permission::create(['name' => 'view statistics']);
        Permission::create(['name' => 'add statistics']);
        Permission::create(['name' => 'edit statistics']);
        Permission::create(['name' => 'delete statistics']);

        // statistics permissions
        Permission::create(['name' => 'view settings']);
        Permission::create(['name' => 'add settings']);
        Permission::create(['name' => 'edit settings']);
        Permission::create(['name' => 'delete settings']);

        // assign peromission to admin
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo([
                'view projects',
                'add projects',
                'edit projects',
                'delete projects',
                'view tasks',
                'add tasks',
                'edit tasks',
                'delete tasks',
                'view teams',
                'add teams',
                'edit teams',
                'delete teams',
                'view employees',
                'add employees',
                'edit employees',
                'delete employees',
                'view attendance',
                'add attendance',
                'edit attendance',
                'delete attendance',
                'view payroll',
                'add payroll',
                'edit payroll',
                'delete payroll',
                'view benefits',
                'add benefits',
                'edit benefits',
                'delete benefits',
                'view deductions',
                'add deductions',
                'edit deductions',
                'delete deductions',
                'view holidays',
                'add holidays',
                'edit holidays',
                'delete holidays',
                'view bonus',
                'add bonus',
                'edit bonus',
                'delete bonus',
                'view loans',
                'add loans',
                'edit loans',
                'delete loans',
                'request loans',
                'approve loans',
                'view cash advances',
                'add cash advances',
                'edit cash advances',
                'delete cash advances',
                'request cash advances',
                'approve cash advances',
                'view allowances',
                'add allowances',
                'edit allowances',
                'delete allowances',
                'view overtime',
                'add overtime',
                'edit overtime',
                'delete overtime',
                'request overtime',
                'approve overtime',
                'view leaves',
                'add leaves',
                'edit leaves',
                'delete leaves',
                'request leaves',
                'approve leaves',
                'view announcements',
                'add announcements',
                'edit announcements',
                'delete announcements',
                'view rewards',
                'add rewards',
                'edit rewards',
                'delete rewards',
                'view slider',
                'add slider',
                'edit slider',
                'delete slider',
                'view statistics',
                'add statistics',
                'edit statistics',
                'delete statistics'
            ]);

        // assign peromission to admin
        $role = Role::create(['name' => 'team-lead'])
            ->givePermissionTo([
                'view projects',
                'add projects',
                'edit projects',
                'delete projects',
                'view tasks',
                'add tasks',
                'edit tasks',
                'delete tasks',
                'view teams',
                'add teams',
                'edit teams',
                'delete teams',
                'view employees',
                'view attendance',
                'view benefits',
                'view deductions',
                'view holidays',
                'view bonus',
                'view loans',
                'request loans',
                'view cash advances',
                'request cash advances',
                'view allowances',
                'view overtime',
                'request overtime',
                'approve overtime',
                'view leaves',
                'request leaves',
                'view announcements',
                'view rewards'
            ]);

        // assign peromission to admin
        $role = Role::create(['name' => 'employee'])
            ->givePermissionTo([
                'view projects',
                'view tasks',
                'add tasks',
                'edit tasks',
                'delete tasks',
                'view teams',
                'view employees',
                'view attendance',
                'view benefits',
                'view deductions',
                'view holidays',
                'view bonus',
                'view loans',
                'request loans',
                'view cash advances',
                'request cash advances',
                'view allowances',
                'view overtime',
                'request overtime',
                'view leaves',
                'request leaves',
                'view announcements',
                'view rewards'
            ]);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
