<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;


class DavinciConfigController extends Controller
{
    /**
     * Display TTS configuration settings
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::orderBy('languages.language', 'asc')->get();

        return view('admin.davinci.configuration.index', compact('languages'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'default-model-admin' => 'required',
            'language' => 'required',
            'tone' => 'required',
            'creativity' => 'required',
            'templates-admin' => 'required',
            'max-results-admin' => 'required|integer|max:4000',
            'default-model-user' => 'required',
            'free-tier-words' => 'required|integer',
            'free-tier-images' => 'required|integer',
            'image-feature-user' => 'required',
            'max-results-user' => 'required|integer|max:4000',
            'templates-user' => 'required',
        ]);    

        $this->storeConfiguration('DAVINCI_SETTINGS_DEFAULT_STORAGE', request('default-storage'));
        $this->storeConfiguration('DAVINCI_SETTINGS_DEFAULT_DURATION', request('default-duration'));
        $this->storeConfiguration('DAVINCI_SETTINGS_DEFAULT_MODEL_ADMIN', request('default-model-admin'));
        $this->storeConfiguration('DAVINCI_SETTINGS_DEFAULT_MODEL_USER', request('default-model-user'));
        $this->storeConfiguration('DAVINCI_SETTINGS_DEFAULT_LANGUAGE', request('language'));
        $this->storeConfiguration('DAVINCI_SETTINGS_TONE_DEFAULT_STATE', request('tone'));
        $this->storeConfiguration('DAVINCI_SETTINGS_CREATIVITY_DEFAULT_STATE', request('creativity'));
        $this->storeConfiguration('DAVINCI_SETTINGS_TEMPLATES_ACCESS_ADMIN', request('templates-admin'));
        $this->storeConfiguration('DAVINCI_SETTINGS_TEMPLATES_ACCESS_USER', request('templates-user'));
        $this->storeConfiguration('DAVINCI_SETTINGS_FREE_TIER_WORDS', request('free-tier-words'));
        $this->storeConfiguration('DAVINCI_SETTINGS_FREE_TIER_IMAGES', request('free-tier-images'));
        $this->storeConfiguration('DAVINCI_SETTINGS_IMAGE_FEATURE_USER', request('image-feature-user'));
        $this->storeConfiguration('DAVINCI_SETTINGS_CODE_FEATURE_USER', request('code-feature-user'));
        $this->storeConfiguration('DAVINCI_SETTINGS_CHAT_FEATURE_USER', request('chat-feature-user'));
        $this->storeConfiguration('DAVINCI_SETTINGS_MAX_RESULTS_LIMIT_ADMIN', request('max-results-admin'));
        $this->storeConfiguration('DAVINCI_SETTINGS_MAX_RESULTS_LIMIT_USER', request('max-results-user'));
        $this->storeConfiguration('OPENAI_SECRET_KEY', request('secret-key'));

        $this->storeConfiguration('AWS_ACCESS_KEY_ID', request('set-aws-access-key'));
        $this->storeConfiguration('AWS_SECRET_ACCESS_KEY', request('set-aws-secret-access-key'));
        $this->storeConfiguration('AWS_DEFAULT_REGION', request('set-aws-region'));
        $this->storeConfiguration('AWS_BUCKET', request('set-aws-bucket'));

        $this->storeConfiguration('WASABI_ACCESS_KEY_ID', request('set-wasabi-access-key'));
        $this->storeConfiguration('WASABI_SECRET_ACCESS_KEY', request('set-wasabi-secret-access-key'));
        $this->storeConfiguration('WASABI_DEFAULT_REGION', request('set-wasabi-region'));
        $this->storeConfiguration('WASABI_BUCKET', request('set-wasabi-bucket'));


        toastr()->success(__('Settings were successfully updated'));
        return redirect()->back();       
    }


    /**
     * Record in .env file
     */
    private function storeConfiguration($key, $value)
    {
        $path = base_path('.env');

        if (file_exists($path)) {

            file_put_contents($path, str_replace(
                $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
            ));

        }
    }
}
