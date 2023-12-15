<?php

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/**
 * _date_format function format date as user needs
 * @param string $date date('Y-m-d')
 * @param string $format "Y-m-d"
 * @return string $date
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_date_format')) {
    function _date_format($date = "date('Y-m-d')", $format = "Y-m-d")
    {
        $date = date_create($date);
        $date = date_format($date, $format);

        return $date;
    }
}


if (!function_exists('_convert_seconds_to_minutes')) {
    function _convert_seconds_to_minutes($seconds)
    {
        $minutes = floor($seconds / 60);
        $remainingSeconds = $seconds % 60;

        return "{$minutes} min {$remainingSeconds} sec";
    }
}


/**
 * _icons function returns necessary icons
 * @param string $icon_name The name of icon
 * @param bool $all To return all icons pass boolean value true, default is false
 * @return array <array|string>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_icons')) {
    function _icons(string $icon_name = 'user', bool $all = false)
    {
        $icon_list = [
            'about' => 'bi bi-person-badge',
            'activity_log' => 'bi bi-clock-history',
            'address' => 'bi bi-house-heart',
            'add' => 'bi bi-plus-lg',
            'age' => 'bi bi-calendar-heart',
            'api' => 'bi bi-database',
            'attachments' => 'bi bi-folder-symlink',
            'arrow_right' => 'bi bi-arrow-right-short',
            'arrow_right_2' => 'bi bi-caret-right',
            'arrow_right_3' => 'bi bi-chevron-right',
            'arrow_left' => 'bi bi-arrow-left-short',
            'arrow_left_2' => 'bi bi-caret-left',
            'arrow_left_3' => 'bi bi-chevron-left',
            'arrow_up' => 'bi bi-arrow-up',
            'arrow_down' => 'bi bi-arrow-down',
            'arrow_right_square' => 'bi bi-arrow-right-square',
            'blog' => 'bi bi-newspaper',
            'bell' => 'bi bi-bell',
            'bin' => 'bi bi-trash2',
            'business' => 'bi bi-building',
            'buildings' => 'bi bi-buildings',
            'bucket' => 'bi bi-bucket-fill',
            'book' => 'bi bi-book',
            'hints' => 'bi bi-lightbulb',
            'box_arrow_up' => 'bi bi-box-arrow-up',
            'check' => 'bi bi-check',
            'circle' => 'bi bi-circle',
            'client' => 'bi bi-universal-access-circle',
            'client_projects' => 'bi bi-suit-spade',
            'clients' => 'bi bi-universal-access-circle',
            'close' => 'bi bi-x',
            'cog' => 'bi bi-gear',
            'contact' => 'bi bi-envelope-open',
            'conversations' => 'bi bi-person',
            'creator' => 'bi bi-person-workspace',
            'checkmark' => 'bi bi-check-all',
            'category' => 'bi bi-puzzle',
            'category_patient' => 'bi bi-recycle',
            'dashboard' => 'bi bi-speedometer2',
            'date' => 'bi bi-calendar3',
            'daily_task' => 'bi bi-pencil-square',
            'dark' => 'bi bi-lightbulb',
            'dial' => 'bi bi-telephone-outbound',
            'default' => 'bi bi-info-circle',
            'delete' => 'bi bi-trash3',
            'delete_all' => 'bi bi-trash2',
            'download' => 'bi bi-cloud-arrow-down',
            'distribution' => 'bi bi-people',
            'email' => 'bi bi-envelope-at',
            'exclamation_triangle' => 'bi bi-exclamation-triangle',
            'exclamation_shield' => 'bi bi-shield-exclamation',
            'right_double' => 'bi bi-chevron-double-right',
            'edit' => 'bi bi-pen',
            'example' => 'bi bi-example',
            'facebook' => 'bi bi-facebook',
            'flag' => 'bi bi-flag',
            'file' => 'bi bi-file-earmark-arrow-up',
            'files' => 'bi bi-files',
            'fullscreen' => 'bi bi-fullscreen',
            'follow_up' => 'bi bi-arrow-left-right',
            'fullscreen2' => 'bi bi-arrows-fullscreen',
            'bars' => 'bi bi-grid',
            'globe' => 'bi bi-globe2',
            'group' => 'bi bi-people-fill',
            'heart' => 'bi bi-heart',
            'hangup' => 'bi bi-telephone-x',
            'home' => 'bi bi-house-door',
            'history' => 'bi bi-clock-history',
            'image' => 'bi bi-card-image',
            'images' => 'bi bi-images',
            'id' => 'bi bi-person-vcard',
            'industry_type' => 'bi bi-bank',
            'lead' => 'bi bi-person-gear',
            'left_double' => 'bi bi-chevron-double-left',
            'light' => 'bi bi-lightbulb',
            'linkedin' => 'bi bi-linkedin',
            'link' => 'bi bi-link',
            'link45' => 'bi bi-link-45deg',
            'logout' => 'bi bi-box-arrow-right',
            'lock' => 'bi bi-lock',
            'list' => 'bi bi-list',
            'list2' => 'bi bi-list-nested',
            'location' => 'bi bi-house-gear',
            'messages' => 'bi bi-chat-dots',
            'minus' => 'bi bi-dash',
            'moon' => 'bi bi-moon',
            'mobile' => 'bi bi-phone-flip',
            'note' => 'bi bi-pen',
            'name_first' => 'bi bi-person-add',
            'name_middle' => 'bi bi-person-check',
            'name_last' => 'bi bi-person-dash',
            'order_by' => 'bi bi-sort-alpha-down',
            'order_by_type' => 'bi bi-sort-down',
            'option' => 'bi bi-0-circle',
            'pdf' => 'bi bi-file-pdf',
            'per_page' => 'bi bi-sort-numeric-down',
            'portfolio' => 'bi bi-briefcase',
            'products' => 'bi bi-boxes',
            'projects' => 'bi bi-minecart-loaded',
            'project' => 'bi bi-balloon',
            'plus' => 'bi bi-plus',
            'password' => 'bi bi-lock',
            'password_file' => 'bi bi-file-lock',
            'password_unlock' => 'bi bi-unlock',
            'permission' => 'bi bi-key',
            'question' => 'bi bi-question-circle',
            'reboot' => 'bi bi-bootstrap-reboot',
            'resume' => 'bi bi-file-diff',
            'reset' => 'bi bi-arrow-repeat',
            'remove' => 'bi bi-x-lg',
            'reports' => 'bi bi-graph-up-arrow',
            'role' => 'bi bi-person-rolodex',
            'remarks' => 'bi bi-mic',
            'save' => 'bi bi-save2',
            'save2' => 'bi bi-check2-circle',
            'save3' => 'bi bi-check-lg',
            'save4' => 'bi bi-check2',
            'search' => 'bi bi-search',
            'sections' => 'bi bi-puzzle',
            'services' => 'bi bi-tools',
            'service' => 'bi bi-hammer',
            'server' => 'bi bi-database',
            'setting' => 'bi bi-wrench-adjustable',
            'settings' => 'bi bi-wrench-adjustable-circle',
            'settings_gear' => 'bi bi-gear',
            'slash_shield' => 'bi bi-shield-slash',
            'support' => 'bi bi-megaphone',
            'skill' => 'bi bi-mortarboard',
            'status' => 'bi bi-gem',
            'star' => 'bi bi-star',
            'source' => 'bi bi-binoculars',
            'script' => 'bi bi-code',
            'sms' => 'bi bi-chat-text',
            'sms_group' => 'bi bi-chat-square-dots',
            'twitter' => 'bi bi-twitter',
            'tags' => 'bi bi-tags',
            'tag' => 'bi bi-tag',
            'template' => 'bi bi-code-slash',
            'testimonials' => 'bi bi-vector-pen',
            'task' => 'bi bi-list-check',
            'tasks' => 'bi bi-list-check',
            'trash' => 'bi bi-trash3',
            'telephone' => 'bi bi-telephone',
            'tools' => 'bi bi-tools',
            'time' => 'bi bi-clock',
            'task_types' => 'bi bi-signpost-split',
            'upload' => 'bi bi-cloud-upload',
            'user' => 'bi bi-person',
            'users' => 'bi bi-people',
            'view' => 'bi bi-eye',
            'website' => 'bi bi-globe-asia-australia',
            'welcome' => 'bi bi-megaphone',
            'youtube' => 'bi bi-youtube',
            'role' => 'bi bi-person-rolodex',
            'permission' => 'bi bi-key',
            'bucket' => 'bi bi-bucket-fill',
            'box_arrow_up' => 'bi bi-box-arrow-up',
            'check' => 'bi bi-check',
            'follow_up' => 'bi bi-arrow-left-right',
            'group' => 'bi bi-people-fill',
            'arrow_up' => 'bi bi-arrow-up',
            'arrow_caret_down' => 'bi bi-caret-down-fill',
            'dash_square' => 'bi bi-dash-square',
            'url' => 'bi bi-browser-edge',
            'person_fill_up' => 'bi bi-person-fill-up',
            'tutorial' => 'bi bi-marker-tip',
            'assign_user' => "bi bi-person-fill-add",
            'reassign' => "bi bi-arrow-repeat"

        ];
        if ($all) {
            return $icon_list;
        } elseif (array_key_exists($icon_name, $icon_list)) {
            return $icon_list["$icon_name"];
        } else {
            return $icon_list["default"];
        }
    }
}

/**
 * _str_conversion function convert string as required
 * @param string $string null
 * @param string $type ucfirst
 * @param bool $remove_dash false
 * @param bool $is_file false
 * @return string
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_str_conversion')) {
    function _str_conversion(string $string = null, string $type = 'ucfirst', bool $remove_dash = false, bool $is_file = false, $is_url = false)
    {
        $string = strtolower(Str::squish($string));

        ## Remove (-, _) from text, and replaced by single space
        if ($remove_dash) {
            $string = str_replace('_', ' ', $string);
            $string = str_replace('-', ' ', $string);
        }

        ## Concat text by underscore(_), snake case
        if ($is_file) {
            $string = str_ireplace(" ", "_", $string);
            $string = str_replace('-', '_', $string);
        }
        ## Concat text by hyphen(-)
        if ($is_url) {
            $string = str_ireplace(" ", "-", $string);
            $string = str_replace('_', '-', $string);
        }

        $string = $type(Str::squish($string));
        return $string;
    }
}

/**
 * _os_relevant_file_upload_path this function will format upload absolute path on any type of operating system
 * @param string $path
 * @return string $path
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_os_relevant_file_upload_path')) {
    function _os_relevant_file_upload_path($path)
    {
        $path = str_replace('\\', '/', $path);
        $path = str_replace('///', '/', $path);
        $path = str_replace('//', '/', $path);
        $path = str_replace('\/', '/', $path);
        return $path;
    }
}

/**
 * _sub_string function returns specific length of characters
 * @param string $str
 * @param int $length 50
 * @param bool $dots true
 * @param string $convert type of conversion like ucwords
 * @return string $str
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_sub_string')) {
    function _sub_string($str = '', int $length = 50, bool $dots = false, string $convert = 'ucwords')
    {
        $str = html_entity_decode(urldecode(trim($str)));

        if (strlen($str) > 0 && $length > 0) {
            if (strlen($str) > $length) {
                $str = substr($str, 0, $length);
                ## Add dots
                $str = $dots ? $str . "..." : $str;
            }
        }
        ## Text transform
        $str = !empty($convert) ? $convert($str) : $str;
        return $str;
    }
}

/**
 * _static_strings function returns necessary icons
 * @param string $key 'default'
 * @param bool $all false
 * @return array <mixed>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_static_strings')) {
    function _static_strings(string $key = 'default', bool $all = false)
    {
        $list = [
            'default' => 'default',
            'edit' => 'edit',
            'back' => 'back',
            'add_new' => 'add new',
            'add new' => 'add new',
            'assign' => "assign",
            'action_successful' => 'action successful',
            'project_not_found' => 'project not found',
            'deleted_successfully' => 'deleted successfully',
            'no_matching_records_found' => 'no matching records found',
            'given_combination_exist' => 'given combination exist',
            'lead_creation_failed'  => "contact creation failed",
            'create_lead_first'  => "create a contact first",
            'select_follow_up_details'  => "select follow up details",
            'sms_sent_successfully'  => "sms sent successfully",
            'failed_to_sent_sms'  => "failed to sent sms",
            'call_initiated_successfully' => 'call initiated successfully',
            'call_hangup_successful' => 'call hangup successful',
            'are_you_sure' => 'are you sure',
            'you_can_not_revert' => 'you can not revert this action anymore',
            'this_is_an_delete_action_you_can_not_revert' => 'this is an delete action. you can not revert this action anymore',
            'something_went_wrong' => 'something went wrong',
            "nothing_found" => 'nothing found',
            'no_registered_patient' => 'there is no patient registered for this number',
            'filled the total number questions which is set to the question' => 'filled the total number questions which is set to the question',
            'please, select kmt questions' => 'please, select kmt questions',
            'given mapping exist' => "given mapping exist",
            'already_exist' => 'already exist',
            'lead upload' => 'lead upload',
            'system_is_in_maintenance_mode' => 'system is under maintenance mode',
            'questions have not set yet.' => 'questions have not set yet.'

        ];
        return $all ? $list : (array_key_exists($key, $list) ? $list["$key"] : $list["default"]);
    }
}

/**
 * _allowed_img_ext function returns allowed image extensions for uploading
 * @return array
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_allowed_img_ext')) {
    function _allowed_img_ext()
    {
        return ['jpg', 'png', 'jpeg', 'webp'];
    }
}

/**
 * _allowed_other_ext function returns allowed other extensions for uploading
 * @return array
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_allowed_other_ext')) {
    function _allowed_other_ext()
    {
        return ['pdf', 'xlsx', 'xls', 'ppt', 'pptx', 'docx', 'doc', 'txt'];
    }
}






if (!function_exists('_date_details')) {
    function _date_details($model, string $property = 'created_at')
    {
        return _date_format($model->$property, 'd M, Y') . ' (' . $model->$property->diffForHumans() . ')';
    }
}

if (!function_exists('_get_genders')) {
    function _get_genders(int $index = -1)
    {
        $genders = [
            '1' => 'male',
            '2' => 'female',
            '3' => 'others',
        ];
        if (array_key_exists($index, $genders)) {
            return $genders[$index];
        }
        return $genders;
    }
}


/**
 * _get_sms_types method return list of task steppers
 * @param int $index index of sms types, default is -1
 * @return mixed <string|array>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_get_language_types')) {
    function _get_language_types(int $index = -1)
    {
        $language_types = [
            '1' => 'English',
            '2' => 'Bangla',
            '3' => 'Both',
        ];
        if (array_key_exists($index, $language_types)) {
            return $language_types[$index];
        }
        return $language_types;
    }
}


/**
 * _get_encryption_types method return list of encryption
 * @param int $index index of sms types, default is -1
 * @return mixed <string|array>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_get_encryption_types')) {
    function _get_encryption_types(int $index = -1)
    {
        $encryption_types = [
            '1' => 'tls',
            '2' => 'ssl',
        ];
        if (array_key_exists($index, $encryption_types)) {
            return $encryption_types[$index];
        }
        return $encryption_types;
    }
}


/**
 * _get_user_info method return logged in user full name
 * @return mixed <string>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_get_user_info')) {
    function _get_user_info(string $index = 'name')
    {
        $user_info = [
            'name' => session('user_full_name'),
            'email' => session('user_email'),
            'route_segment' => session('route_segment'),
            'role' => session('role'),
        ];
        return array_key_exists($index, $user_info) ? $user_info[$index] : $user_info[$index];
    }
}

/**
 * _encode function runs PHP's htmlspecialchars function with the double_encode option
 * @return string
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_encode')) {
    function _encode($str, string $convert = 'ucfirst')
    {
        $str = (Str::squish($str));
        $str_to_array = explode('.', $str);

        ## Remove empty values from array
        $str_to_array = array_filter($str_to_array, function ($value) {
            return !empty($value);
        });

        ## Map and update array items
        $str_to_array = array_map(function ($value) use ($convert) {
            return !empty($value) ? (!empty($convert) ? $convert(Str::squish($value)) : Str::squish($value))  : false;
        }, $str_to_array);

        ## Array to string conversion
        $str = implode('. ', $str_to_array);

        return $str;
    }
}

/**
 * _encode function runs PHP's htmlspecialchars function with the double_encode option
 * @return string
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */

if (!function_exists('_route_segments')) {
    function _route_segments()
    {
        return ['admin', 'call-center', 'marketing'];
    }
}




/**
 * _get_is_customer_status method return list of task steppers
 * @param int $index index of lead categories, default is -1
 * @return mixed <string|array>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_get_is_customer_status')) {
    function _get_is_customer_status(int $index = -1)
    {
        $status_list = [
            '0' => 'no',
            '1' => 'yes',
        ];
        if (array_key_exists($index, $status_list)) {
            return $status_list[$index];
        }
        return $status_list;
    }
}



/**
 * _get_date_from_datetime method return date from datetime
 * @return mixed <string|array>
 * @author Md. Amzad Hossain Jacky <amzadhossainajacky@gmail.com>
 */
if (!function_exists('_get_date_from_datetime')) {
    function _get_date_from_datetime(string $end_time = '2023-11-01 17:33:08')
    {

        return Carbon::parse($end_time)->toDateString();
    }
}


/**
 * _get_system_mode method return list of system mode status
 * @param int $index, default is -1
 * @return mixed <string|array>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_get_system_mode')) {
    function _get_system_mode(int $index = -1)
    {
        $list = [
            '1' => 'live',
            '2' => 'maintenance',

        ];
        if (array_key_exists($index, $list)) {
            return $list[$index];
        }
        return $list;
    }
}


/**
 * _colors method return list of colors
 * @param int $index, default is -1
 * @return mixed <string|array>
 * @author Sakil Jomadder <sakil.diu.cse@gmail.com>
 */
if (!function_exists('_colors')) {
    function _colors(int $index = -1)
    {
        $list = [
            '0' => 'red',
            '1' => 'green',
            '2' => 'blue',
            '3' => 'black',
            '4' => 'blueViolet',
            '5' => 'cadetBlue',
            '6' => 'chocolate',
            '7' => 'crimson',
            '8' => 'darkCyan',
            '9' => 'darkGreen',
            '10' => 'darkOrange',
            '11' => 'darkOrchid',
            '12' => 'DarkRed',
            '12' => 'DarkSlateBlue',
            '13' => 'DarkViolet',
            '14' => 'DimGrey',
            '15' => 'FloralWhite',
            '16' => 'FireBrick',
            '17' => 'Maroon',
            '18' => 'MidnightBlue',
            '19' => 'OrangeRed',
            '20' => 'SeaGreen',
            '21' => 'SlateBlue',
            '22' => 'SteelBlue',
            '23' => 'Tomato',
            '24' => 'Teal',
            '25' => 'PaleVioletRed',

        ];
        if (array_key_exists($index, $list)) {
            return $list[$index];
        }
        return $list;
    }
}
