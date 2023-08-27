<?php

namespace App\Http\Controllers\Admin;

use App\Models\Language;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

class AdminTranslateController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:translate admin generate,' . getGuardNameAdmin()])->only(['extractLocalizationStrings']);
        $this->middleware(['permission:translate admin index,' . getGuardNameAdmin()])->only(['indexAdmin']);
        $this->middleware(['permission:translate admin trans,' . getGuardNameAdmin()])->only(['translateString']);
        $this->middleware(['permission:translate admin update,' . getGuardNameAdmin()])->only(['updateLanguangeString']);

        $this->middleware(['permission:translate mobile generate,' . getGuardNameAdmin()])->only(['extractLocalizationStrings']);
        $this->middleware(['permission:translate mobile index,' . getGuardNameAdmin()])->only(['indexMobile']);
        $this->middleware(['permission:translate mobile trans,' . getGuardNameAdmin()])->only(['translateString']);
        $this->middleware(['permission:translate mobile update,' . getGuardNameAdmin()])->only(['updateLanguangeString']);

        $this->middleware(['permission:translate website generate,' . getGuardNameAdmin()])->only(['extractLocalizationStrings']);
        $this->middleware(['permission:translate website index,' . getGuardNameAdmin()])->only(['indexWebsite']);
        $this->middleware(['permission:translate website trans,' . getGuardNameAdmin()])->only(['translateString']);
        $this->middleware(['permission:translate website update,' . getGuardNameAdmin()])->only(['updateLanguangeString']);
    }

    public function indexAdmin(): View
    {
        $languages = Language::all();
        return view('admin.translate.admin', compact('languages'));
    }

    public function indexMobile(): View
    {
        $languages = Language::all();
        return view('admin.translate.mobile', compact('languages'));
    }

    public function indexWebsite(): View
    {
        $languages = Language::all();
        return view('admin.translate.website', compact('languages'));
    }

    function extractLocalizationStrings(Request $request)
    {
        $directorys = explode(',', $request->directory);

        $language_code = $request->language_code;
        $file_name = $request->file_name;

        $localization_strings = [];

        foreach ($directorys as $directory) {

            $directory = trim($directory);

            $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));

            // Iterate over each file in the directory
            foreach ($files as $file) {
                if ($file->isDir()) {
                    continue;
                }

                $contents = file_get_contents($file->getPathname());

                preg_match_all('/__\([\'"](.+?)[\'"]\)/', $contents, $matches);

                if (!empty($matches[1])) {
                    foreach ($matches[1] as $match) {
                        $match = preg_replace('/^(admin|member|web)\./', '', $match);
                        $localization_strings[$match] = $match;
                    }
                }
            }
        }

        $phpArray = "<?php\n\nreturn " . var_export($localization_strings, true) . ";\n";

        // create language sub folder if it is not exit
        if (!File::isDirectory(lang_path($language_code))) {
            File::makeDirectory(lang_path($language_code), 0755, true);
        }

        file_put_contents(lang_path($language_code . '/' . $file_name . '.php'), $phpArray);


        return redirect()->back()->with('success', __('admin.Generate string successfully'));
    }

    function updateLanguangeString(Request $request): RedirectResponse
    {
        $languageStrings = trans($request->file_name, [], $request->lang_code);

        $languageStrings[$request->key] = $request->value;

        $phpArray = "<?php\n\nreturn " . var_export($languageStrings, true) . ";\n";

        file_put_contents(lang_path($request->lang_code . '/' . $request->file_name . '.php'), $phpArray);

        return redirect()->back()->with('success', __('admin.Updated translate string successfully'));
    }

    function translateString(Request $request)
    {
        try {

            $lang_code = $request->language_code;

            $language_strings = trans($request->file_name, [], $request->language_code);

            $key_strings = array_keys($language_strings);

            $text = implode(' | ', $key_strings);

            $setting_admin = getSettingAdmin();
            $response = Http::withHeaders([
                'X-RapidAPI-Host' => $setting_admin['site_microsoft_api_host'],
                'X-RapidAPI-Key' => $setting_admin['site_microsoft_api_key'],
                'content-type' => 'application/json',
            ])
                ->post("https://microsoft-translator-text.p.rapidapi.com/translate?to%5B0%5D=$lang_code&api-version=3.0&profanityAction=NoAction&textType=plain", [
                    [
                        "Text" => $text
                    ]
                ]);

            $translated_text = json_decode($response->body())[0]->translations[0]->text;

            $translated_values = explode(' | ', $translated_text);

            $updated_array = array_combine($key_strings, $translated_values);

            $php_array = "<?php\n\nreturn " . var_export($updated_array, true) . ";\n";

            file_put_contents(lang_path($lang_code . '/' . $request->file_name . '.php'), $php_array);

            return response(['status' => 'success', 'message' => __('admin.Translation is completed')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', $th->getMessage()]);
        }
    }
}
