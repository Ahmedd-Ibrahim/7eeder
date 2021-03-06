<?php

namespace App\Models;

use Eloquent as Model;
use Spatie\Translatable\HasTranslations;

/**
 * Class AppSetting
 * @package App\Models
 * @version November 11, 2020, 10:17 am UTC
 *
 * @property string $about_desc
 * @property string $term_desc
 * @property string $condation_desc
 * @property string $app_share_link
 * @property string $app_review_link
 */
class AppSetting extends Model
{

    use HasTranslations;

    public $table = 'app_settings';

    public $translatable = ['about','term_desc','condation_desc'];

    public $fillable = [
        'about',
        'term_desc',
        'condation_desc',
        'app_share_link',
        'app_review_link'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'app_share_link' => 'string',
        'app_review_link' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

}
