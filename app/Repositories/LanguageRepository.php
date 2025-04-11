<?php
namespace App\Repositories;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Language;
use Illuminate\Support\Facades\Log;

class LanguageRepository {

    static function getAll() {
        $languages = Language::get();
        return $languages;
    }

    static function getByCode($code) {
        $language = Language::where('code', $code)->first();
        return $language;
    }

    static function update(
        $id, $name, $code
    ) {
        $language = Language::find($id);
        $language->name = $name;
        $language->code = $code;
        $language->save();
        return $language;
    }

    static function create(
        $name, $code
    ) {
        $languageData = [
            'name' => $name,
            'code' => $code
        ];
        $language = Language::create($languageData);
        return $language;
    }
}
