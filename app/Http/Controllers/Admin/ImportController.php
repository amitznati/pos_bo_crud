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
    function getArrayFromCSV($file)
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
    
    function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
        // open raw memory as file so no temp files needed, you might run out of memory though
        $f = fopen('php://memory', 'w'); 
        //collumns
        fputcsv($f, array_keys($array), $delimiter);
        //sample data
        fputcsv($f, $array, $delimiter); 
        // reset the file pointer to the start of the file
        fseek($f, 0);
        // tell the browser it's going to be a csv file
        header('Content-Type: application/csv');
        // tell the browser we want to save it instead of displaying it
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        // make php send the generated csv lines to the browser
        fpassthru($f);
    }
    
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

    

    public function downloadSample($crud,$type)
    {
        $crud_name = 'App\Models\\'.$crud;
        $sample = $crud_name::$sampleModel;
        $array_to_type_download = 'array_to_'. $type.'_download';
        $this->$array_to_type_download($sample);
    }
    
    



}
