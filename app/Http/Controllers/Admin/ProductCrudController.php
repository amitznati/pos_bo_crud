<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Illuminate\Support\Facades\View;


// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;
use App\Models\Department;

class ProductCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Product");
        $this->crud->setRoute("admin/product");
        $this->crud->setEntityNameStrings(trans('pos.catalog.product.product'), trans('pos.catalog.product.products'));

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $all_fields = [
            [
                'name' => 'name', // The db column name
                'label' => trans('pos.catalog.product.product_name'), // Table column heading
                'type' => 'Text'
            ],
            [
               // 1-n relationship
               'label' => trans('pos.catalog.department.department'), // Table column heading
               'type' => "select",
               'name' => 'dept_id', // the column that contains the ID of that connected entity;
               'entity' => 'department', // the method that defines the relationship in your Model
               'attribute' => "name", // foreign key attribute that is shown to user
               'model' => "App\Models\Department", // foreign key model
            ],
            [
               // 1-n relationship
               'label' => trans('pos.catalog.group.group'), // Table column heading
               'type' => "select",
               'name' => 'group_id', // the column that contains the ID of that connected entity;
               'entity' => 'group', // the method that defines the relationship in your Model
               'attribute' => "name", // foreign key attribute that is shown to user
               'model' => "App\Models\Group", // foreign key model
            ],
            [   // Number
                'name' => 'sale_price',
                'label' => trans('pos.catalog.product.sale_price'),
                'type' => 'number',
                // optionals
                 'prefix' => "$",
                // 'suffix' => ".00",
            ],
            [   // Number
                'name' => 'bay_price',
                'label' => trans('pos.catalog.product.bay_price'),
                'type' => 'number',
                // optionals
                 'prefix' => "$",
                // 'suffix' => ".00",
            ],
            [
               // 1-n relationship
               'label' => trans('pos.catalog.vendor.vendor'), // Table column heading
               'type' => "select",
               'name' => 'vendor_id', // the column that contains the ID of that connected entity;
               'entity' => 'vendor', // the method that defines the relationship in your Model
               'attribute' => "company_name", // foreign key attribute that is shown to user
               'model' => "App\Models\Vendor", // foreign key model
            ],
            [
                'name' => 'barcode', // The db column name
                'label' => trans('pos.catalog.product.barcode'), // Table column heading
                'type' => 'Text'
            ],
            [
                'name' => 'brand', // The db column name
                'label' => trans('pos.catalog.product.brand'), // Table column heading
                'type' => 'Text'
            ],
            [
                'name' => 'description', // The db column name
                'label' => trans('pos.catalog.product.description'), // Table column heading
                'type' => 'textarea'
            ],

        ];


        //$this->crud->setFromDb();

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
        //$this->crud->addFields($array_of_arrays, 'update/create/both');
        $this->crud->addFields($all_fields, 'both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
        // $this->crud->addColumns(); // add multiple columns, at the end of the stack
        $this->crud->addColumns($all_fields);

        $this->crud->setCreateView('products/create');
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
        //$this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete','show']);
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
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

	public function store(StoreRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}

	public function update(UpdateRequest $request)
	{
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
	
	/**
	 * Show the form for creating inserting a new row.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->crud->hasAccessOrFail('create');
		
		// prepare the fields you need to show
		$this->data['crud'] = $this->crud;
		$this->data['saveAction'] = $this->getSaveAction();
		$this->data['fields'] = $this->crud->getCreateFields();
		$this->data['title'] = trans('backpack::crud.add').' '.$this->crud->entity_name;
		$this->data['departments'] = Department::all();
		//xdebug_break();
		// load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
		return view($this->crud->getCreateView(), $this->data);
	}
}
