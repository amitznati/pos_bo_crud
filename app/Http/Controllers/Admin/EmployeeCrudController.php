<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\EmployeeRequest as StoreRequest;
use App\Http\Requests\EmployeeRequest as UpdateRequest;
use App\Models\Person;
use App\Models\Employee;
use App\Models\Address;
use App\Models\Role;
use App\Models\Permission;
use App\Models\SaleryType;
use App\Models\EmployeeSalery;

class EmployeeCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Employee');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/employee');
        $this->crud->setEntityNameStrings('Employee', 'Employees');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
         $show_fields = [
            [
               // n-n relationship (with pivot table)
               'label' => "Role", // Table column heading
               'type' => "select_multiple",
               'name' => 'roles', // the method that defines the relationship in your Model
               'entity' => 'roles', // the method that defines the relationship in your Model
               'attribute' => "name", // foreign key attribute that is shown to user
               'model' => "App\Models\Role", // foreign key model
            ],
            [
               // n-n relationship (with pivot table)
               'label' => "Extra Permissions", // Table column heading
               'type' => "select_multiple",
               'name' => 'permissions', // the method that defines the relationship in your Model
               'entity' => 'permissions', // the method that defines the relationship in your Model
               'attribute' => "name", // foreign key attribute that is shown to user
               'model' => "App\Models\Permission", // foreign key model
            ],
        ];

        //$this->crud->setFromDb();
        $this->crud->setCreateView('employees/create');
        $this->crud->setEditView('employees/edit');
        $this->crud->setShowView('employees/show');

        // ------ CRUD FIELDS
        $this->crud->addColumns($show_fields);
        $this->crud->addColumns(Person::$show_fields);
        
        // $this->crud->addField($options, 'update/create/both');
        // $this->crud->addFields($array_of_arrays, 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);

        // ------ CRUD ACCESS
        $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete','show']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $this->validate($request,array(
                'first_name'       => 'required|max:50|min:2',
                'last_name'        => 'required|max:50|min:2',
                'identifier'       => 'required|min:4|max:50|unique:persons,identifier',
                'role'             => 'required|size:1',
                'amount'           => 'required|numeric|between:0,999999.99',
        ));

        $input = $request->all();
        //xdebug_break();
        //Employee
        $employee = new Employee();     
        $employee->save();

        //Role
        $employee->roles()->sync($request->role, false);

        //Permissions
        if($request->permissions)
            $employee->permissions()->sync($request->permissions, false);

        //Salery
        $employee_salery = new EmployeeSalery($input);
        $employee_salery->employee()->associate($employee);
        $employee_salery->save();

        //Person
        $person = new Person($input);
        $person->personable()->associate($employee);
        $person->save();

        //Address
        $address = new Address($input);       
        $address->addressable()->associate($person);
        $address->save();

        \Alert::success(trans('Employee saved successfully!'))->flash();

        return $this->performSaveAction($employee->id);
    }

    public function update(UpdateRequest $request)
    {
        $employee = $this->crud->getEntry($request->id);
        // your additional operations before save here
        $input = $request->all();
        $identifier_validation = '';
        $amount_validation = '';
        if($employee->person->identifier != $request->identifier)
        {
            $identifier_validation = 'required|min:4|max:50|unique:persons,identifier';
        }
        if($request->add_salery == 'checked')
        {
        	$amount_validation = 'required|numeric|between:0,999999.99';
        }

        $this->validate($request,array(
                'first_name'       => 'required|max:50|min:2',
                'last_name'        => 'required|max:50|min:2',
                'identifier'       => $identifier_validation,
                'role'             => 'required|size:1',
                'amount'           => $amount_validation,
        ));
        
        //Role
        if(!$employee->hasRole(Role::find($request->role[0])->name))
        {
            $employee->roles()->detach();
            $employee->roles()->sync($request->role, false);
        }
        

        //Permissions
        if($request->permissions)
        {
            $employee->permissions()->detach();
            $employee->permissions()->sync($request->permissions, false);
        }
        
        //Salery
        if($request->add_salery == 'checked')
        {
            $employee->employeeSaleries()->delete();
            $employee_salery = new EmployeeSalery($input);
            $employee_salery->employee()->associate($employee);
            $employee_salery->save();
        }

        //Person
        $employee->person->update($input);

        //Address
        $employee->person->address->update($input);

        \Alert::success(trans('backpack::crud.update_success'))->flash();

        $this->setSaveAction();

        return $this->performSaveAction();
    }

    public function create()
    {
        $this->crud->hasAccessOrFail('create');
        
        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getCreateFields();
        $this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;
        $this->data['roles'] = Role::all()->load('permissions');
        $this->data['permissions'] = Permission::all();
        $this->data['saleries'] = SaleryType::all()->pluck('name','id');
        //xdebug_break();
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getCreateView(), $this->data);
    }

    public function edit($id)
    {
        $this->crud->hasAccessOrFail('update');

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;
        $this->data['employee'] = $this->data['entry']->load('employeeSaleries');
        $this->data['person'] = $this->data['employee']->person;
        $this->data['roles'] = Role::all()->load('permissions');
        $this->data['permissions'] = Permission::all();
        $this->data['saleries'] = SaleryType::all()->pluck('name','id');

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getEditView(), $this->data);
    }
}
