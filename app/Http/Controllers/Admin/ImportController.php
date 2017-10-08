<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Throwable;
use Validator;
use function view;

class ImportController extends Controller
{
    //
    public function importDialog($crud,$type)
    {
       $data = array();
       $data['crud'] = $crud;
       return view('import/import-'.$type)->with($data);
    }

    public function import(Request $request)
    {
        $file = $request->import_file;
        $crud_name = 'App\Models\\'.$request->crud_name;
        $arrayFromFileMethod = 'getArrayFrom'.$request->import_type;
        $items = $this->$arrayFromFileMethod($file);

        try{
            foreach($items as $item)
            {
                $new_item = new $crud_name($item);
                $v = Validator::make($item, $new_item::$rules);
                if($v->passes())
                    $new_item->save();
                else
                {
                   \Alert::error('Import '.$request->crud_name.' Failed!: \n'.$v->errors())->flash();
                    return redirect('admin/product'); 
                }
            }
        } catch (Exception $ex) {
            \Alert::error('Import '.$request->crud_name.' Failed!: '.$ex->getMessage())->flash();
            return redirect('admin/product');
        } catch (Throwable $exc) {
            \Alert::error('Import '.$request->crud_name.' Failed: '.$exc->getMessage())->flash();
            return redirect('admin/product');
        }
        \Alert::success('Import '.$request->crud_name.' Success!')->flash();
        return redirect('admin/product');
    } 

    private function getArrayFromCSV($file)
    {
        $csv = array_map('str_getcsv', file($file));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv); # remove column header
        $newarray = [];
        foreach($csv as $item)
        {
            array_push($newarray,array_filter($item));
        }

        return $newarray;
    }

}
