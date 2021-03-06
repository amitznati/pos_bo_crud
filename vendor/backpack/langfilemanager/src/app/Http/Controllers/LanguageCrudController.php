<?php

namespace Backpack\LangFileManager\app\Http\Controllers;

use App\Http\Requests;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\LangFileManager\app\Services\LangFiles;
use Backpack\LangFileManager\app\Models\Language;
use Illuminate\Http\Request;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\LangFileManager\app\Http\Requests\LanguageRequest as StoreRequest;
use Backpack\LangFileManager\app\Http\Requests\LanguageRequest as UpdateRequest;
# Imports the Google Cloud client library
       // use Google\Cloud\Translate\TranslateClient;

class LanguageCrudController extends CrudController
{

    
    public function __construct()
    {
        parent::__construct();

        # Instantiates a client
        // $this->translate = new TranslateClient([
        //     'projectId' => "mypos-1492327738853",
        // ]);

        $this->crud->setModel("Backpack\LangFileManager\app\Models\Language");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/language');
        $this->crud->setEntityNameStrings(trans('backpack::langfilemanager.language'), trans('backpack::langfilemanager.languages'));

        $this->crud->setColumns([
            [
                'name' => 'name',
                'label' => trans('backpack::langfilemanager.language_name'),
            ],
            [
                'name' => 'active',
                'label' => trans('backpack::langfilemanager.active'),
                'type' => 'boolean',
            ],
            [
                'name' => 'default',
                'label' => trans('backpack::langfilemanager.default'),
                'type' => 'boolean',
            ],
        ]);
        $this->crud->addField([
            'name' => 'name',
            'label' => trans('backpack::langfilemanager.language_name'),
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'native',
            'label' => trans('backpack::langfilemanager.native_name'),
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'abbr',
            'label' => trans('backpack::langfilemanager.code_iso639-1'),
            'type' => 'text',
        ]);
        $this->crud->addField([
            'name' => 'flag',
            'label' => trans('backpack::langfilemanager.flag_image'),
            'type' => 'browse',
        ]);
        $this->crud->addField([
            'name' => 'active',
            'label' => trans('backpack::langfilemanager.active'),
            'type' => 'checkbox',
        ]);
        $this->crud->addField([
            'name' => 'default',
            'label' => trans('backpack::langfilemanager.default'),
            'type' => 'checkbox',
        ]);
    }

    public function store(StoreRequest $request)
    {
        $defaultLang = Language::where('default', 1)->first();
        // Copy the default language folder to the new language folder
        \File::copyDirectory(resource_path('lang/'.$defaultLang->abbr), resource_path('lang/'.$request->input('abbr')));
        \File::copyDirectory(resource_path('lang/'.$defaultLang->abbr), resource_path('lang/vendor/backpack/'.$request->input('abbr')));

        return parent::storeCrud();
    }

    

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }

    /**
     * After delete remove also the language folder.
     *
     * @param int $id
     *
     * @return string
     */
    public function destroy($id)
    {
        $language = Language::find($id);
        $destroyResult = parent::destroy($id);

        if ($destroyResult) {
            \File::deleteDirectory(resource_path('lang/'.$language->abbr));
            \File::deleteDirectory(resource_path('lang/vendor/backpack/'.$language->abbr));
        }

        return $destroyResult;
    }

    public function showTexts(LangFiles $langfile, Language $languages, $lang = '', $file = 'site')
    {
        
        // SECURITY
        // check if that file isn't forbidden in the config file
        if (in_array($file, config('backpack.langfilemanager.language_ignore'))) {
            abort('403', trans('backpack::langfilemanager.cant_edit_online'));
        }

        if ($lang) {
            $langfile->setLanguage($lang);
        }

        $langfile->setFile($file);
        $this->data['crud'] = $this->crud;
        $this->data['currentFile'] = $file;
        $this->data['currentLang'] = $lang ?: config('app.locale');
        $this->data['currentLangObj'] = Language::where('abbr', '=', $this->data['currentLang'])->first();
        $this->data['browsingLangObj'] = Language::where('abbr', '=', config('app.locale'))->first();
        $this->data['languages'] = $languages->orderBy('name')->get();
        $this->data['langFiles'] = $langfile->getlangFiles();
        $this->data['fileArray'] = $langfile->getFileContent();
        $this->data['langfile'] = $langfile;
        $this->data['title'] = trans('backpack::langfilemanager.translations');
        
        
  //       $newArray = [];
		// if(is_array($this->data['fileArray']))
		// 	$newArray = $this->translateArray($this->data['fileArray'],$this->data['currentLang']);
  //       $this->data['fileArray'] = $newArray;
        
        
        return view('langfilemanager::translations', $this->data);
    }

    public function updateTexts(LangFiles $langfile, Request $request, $lang = '', $file = 'site')
    {
        // SECURITY
        // check if that file isn't forbidden in the config file
        if (in_array($file, config('backpack.langfilemanager.language_ignore'))) {
            abort('403', trans('backpack::langfilemanager.cant_edit_online'));
        }

        $message = trans('error.error_general');
        $status = false;

        if ($lang) {
            $langfile->setLanguage($lang);
        }

        $langfile->setFile($file);

        $fields = $langfile->testFields($request->all());
        if (empty($fields)) {
            if ($langfile->setFileContent($request->all())) {
                \Alert::success(trans('backpack::langfilemanager.saved'))->flash();
                $status = true;
                \File::copyDirectory(resource_path('lang/'.$lang), resource_path('lang/vendor/backpack/'.$lang));
            }
        } else {
            $message = trans('admin.language.fields_required');
            \Alert::error(trans('backpack::langfilemanager.please_fill_all_fields'))->flash();
        }

        return redirect()->back();
    }


    private function translateArray($postArray,$lang)
    {
        $returnArray = [];

        foreach ($postArray as $key => $value) {
            if (is_array($value)) {
            	$returnArray[$key] = $this->translateArray($value,$lang);
            } else {
            	$returnArray[$key] = $this->translateText($value,$lang);
            }
        }
        return $returnArray;
    }


    public function translateText($text,$target)
    {
        $translation = $this->translate->translate($text, [ 'target' => $target ]);
        return $translation['text'];
    }
}
