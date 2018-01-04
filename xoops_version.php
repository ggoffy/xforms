<?php
/*
 You may not change or alter any portion of this comment or credits of
 supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit
 authors.

 This program is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * Module: xForms
 *
 * @category        Module
 * @package         xforms
 * @author          XOOPS Module Development Team
 * @copyright       {@see https://xoops.org 2001-2016 XOOPS Project}
 * @license         {@see http://www.fsf.org/copyleft/gpl.html GNU public license}
 * @see             https://xoops.org XOOPS
 * @since           1.00
 */

require_once __DIR__ . '/preloads/autoloader.php';

$moduleDirName = basename(__DIR__);

$modversion['version']       = '2.00';
$modversion['module_status'] = 'Alpha 2';
$modversion['release_date']  = '2016/08/01';
$modversion['name']          = _MI_XFORMS_NAME;
$modversion['description']   = _MI_XFORMS_DESC;
$modversion['author']        = 'Brandycoke Productions, Dylian Melgert, Juan Garcés';
$modversion['credits']       = 'XOOPS Development Team: Black_beard, Cesag, Philou, Mamba, ZySpec';
$modversion['help']          = 'page=help';
$modversion['license']       = 'GNU GPL 2.0 or later';
$modversion['license_url']   = 'www.gnu.org/licenses/gpl-2.0.html';
$modversion['official']      = 0;
$modversion['image']         = 'assets/images/logoModule.png';
$modversion['dirname']       = $moduleDirName;
//$modversion['dirmoduleadmin'] = '/Frameworks/moduleclasses/moduleadmin';
//$modversion['icons16']        = '../../Frameworks/moduleclasses/icons/16';
//$modversion['icons32']        = '../../Frameworks/moduleclasses/icons/32';
$modversion['modicons16'] = 'assets/images/icons/16';
$modversion['modicons32'] = 'assets/images/icons/32';

//help files
$modversion['helpsection'] = [
    [
        'name' => _MI_XFORMS_HELP_OVERVIEW,
        'link' => 'page=help'
    ],
    [
        'name' => _MI_XFORMS_HELP_ISSUES,
        'link' => 'page=issues'
    ]
];

$modversion['module_website_url']  = 'https://xoops.org/';
$modversion['module_website_name'] = 'XOOPS';
$modversion['min_php']             = '5.5';
$modversion['min_xoops']           = '2.5.9';
$modversion['min_admin']           = '1.2';
$modversion['min_db']              = ['mysql' => '5.5'];

// Install, update, unistall
$modversion['onInstall']   = 'include/oninstall.php';
$modversion['onUpdate']    = 'include/onupdate.php';
$modversion['onUninstall'] = 'include/onuninstall.php';

// Sql file (must contain sql generated by phpMyAdmin)
// All tables should not have any prefix!
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'xforms_form';
$modversion['tables'][1] = 'xforms_element';
$modversion['tables'][2] = 'xforms_userdata';

// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu']  = 'admin/menu.php';

// Menu content in main menu block
$modversion['hasMain'] = 1;

// Display main menu (1 = true)
$modversion['system_menu'] = 1;

// Templates
$modversion['templates'] = [
    [
        'file'        => 'xforms_index.tpl',
        'description' => _MI_XFORMS_TMPL_MAIN_DESC
    ],
    [
        'file'        => 'xforms_form.tpl',
        'description' => _MI_XFORMS_TMPL_FORM_DESC
    ],
    [
        'file'        => 'xforms_form_poll.tpl',
        'description' => _MI_XFORMS_TMPL_POLL_DESC
    ],
    [
        'file'        => 'xforms_error.tpl',
        'description' => _MI_XFORMS_TMPL_ERROR_DESC
    ]
];

/*
 * Search definitions
 * 1 = yes, module has search | 0 = no
 */
$modversion['hasSearch'] = 1;
$modversion['search']    = [
    'file' => 'include/search.inc.php',
    'func' => 'xforms_search'
];

// Blocks
$modversion['blocks'] = [
    [
        'file'        => 'list_block.php',
        'name'        => _MI_XFORMS_BLK_LIST,
        'description' => _MI_XFORMS_BLK_LIST_DESC,
        'show_func'   => 'b_xforms_list_show',
        'edit_func'   => 'b_xforms_list_edit',
        'options'     => 'weight|5',
        'template'    => 'xforms_blk_list.tpl'
    ],

    [
        'file'        => 'form_block.php',
        'name'        => _MI_XFORMS_BLK_FORM,
        'description' => _MI_XFORMS_BLK_FORM_DESC,
        'show_func'   => 'b_xforms_form_show',
        'edit_func'   => 'b_xforms_form_edit',
        'options'     => '1',
        'template'    => 'xforms_blk_form.tpl'
    ]

];

xoops_load('XoopsLists');
require_once $GLOBALS['xoops']->path("./modules/{$moduleDirName}/class/constants.php");

/* Module Configs */
$modversion['config'] = [
    [
        'name'        => 't_width',
        'title'       => '_MI_XFORMS_TEXT_WIDTH',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'int',
        'default'     => '35'
    ],

    [
        'name'        => 't_max',
        'title'       => '_MI_XFORMS_TEXT_MAX',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'int',
        'default'     => '255'
    ],

    [
        'name'        => 'ta_rows',
        'title'       => '_MI_XFORMS_TEXTAREA_ROWS',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'int',
        'default'     => '5'
    ],

    [
        'name'        => 'ta_cols',
        'title'       => '_MI_XFORMS_TEXTAREA_COLS',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'int',
        'default'     => '35'
    ],

    [
        'name'        => 'moreinfo',
        'title'       => '_MI_XFORMS_MOREINFO',
        'description' => '',
        'formtype'    => 'select_multi',
        'valuetype'   => 'array',
        'default'     => ['user', 'ip', 'agent'],
        'options'     => [
            _MI_XFORMS_MOREINFO_USER  => 'user',
            _MI_XFORMS_MOREINFO_IP    => 'ip',
            _MI_XFORMS_MOREINFO_AGENT => 'agent',
            _MI_XFORMS_MOREINFO_FORM  => 'form'
        ]
    ],

    [
        'name'        => 'mycountry',
        'title'       => '_MI_XFORMS_ELE_SELECT_CTRY_DEFAULT',
        'description' => '',
        'formtype'    => 'select',
        'valuetype'   => 'text',
        'default'     => '-----',
        'options'     => array_flip(XoopsLists::getCountryList())
    ],

    [
        'name'        => 'mail_charset',
        'title'       => '_MI_XFORMS_MAIL_CHARSET',
        'description' => '_MI_XFORMS_MAIL_CHARSET_DESC',
        'formtype'    => 'textbox',
        'valuetype'   => 'text',
        'default'     => _CHARSET
    ],

    [
        'name'        => 'prefix',
        'title'       => '_MI_XFORMS_PREFIX',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'text',
        'default'     => ''
    ],

    [
        'name'        => 'suffix',
        'title'       => '_MI_XFORMS_SUFFIX',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'text',
        'default'     => '*'
    ],

    [
        'name'        => 'dtitle',
        'title'       => '_MI_XFORMS_DEFAULT_TITLE',
        'description' => '',
        'formtype'    => 'textbox',
        'valuetype'   => 'text',
        'default'     => _MI_XFORMS_DEFAULT_TITLE_DESC
    ],

    [
        'name'        => 'intro',
        'title'       => '_MI_XFORMS_INTRO',
        'description' => '',
        'formtype'    => 'textarea',
        'valuetype'   => 'text',
        'default'     => _MI_XFORMS_INTRO_DEFAULT
    ],

    [
        'name'        => 'noform',
        'title'       => '_MI_XFORMS_NOFORM',
        'description' => '',
        'formtype'    => 'textarea',
        'valuetype'   => 'text',
        'default'     => _MI_XFORMS_NOFORM_DEFAULT
    ],

    [
        'name'        => 'global',
        'title'       => '_MI_XFORMS_GLOBAL',
        'description' => '',
        'formtype'    => 'textarea',
        'valuetype'   => 'text',
        'default'     => _MI_XFORMS_GLOBAL_DEFAULT
    ],

    [
        'name'        => 'uploaddir',
        'title'       => '_MI_XFORMS_UPLOADDIR',
        'description' => '_MI_XFORMS_UPLOADDIR_DESC',
        'formtype'    => 'textbox',
        'valuetype'   => 'text',
        'default'     => XOOPS_UPLOAD_PATH . "/{$moduleDirName}"
    ],

    [
        'name'        => 'captcha',
        'title'       => '_MI_XFORMS_CAPTCHA',
        'description' => '_MI_XFORMS_CAPTCHA_DESC',
        'formtype'    => 'select',
        'valuetype'   => 'int',
        'options'     => [
            _MI_XFORMS_CAPTCHA_INHERIT   => XformsConstants::CAPTCHA_INHERIT,
            _MI_XFORMS_CAPTCHA_ANON_ONLY => XformsConstants::CAPTCHA_ANON_ONLY,
            _MI_XFORMS_CAPTCHA_EVERYONE  => XformsConstants::CAPTCHA_EVERYONE,
            _MI_XFORMS_CAPTCHA_NONE      => XformsConstants::CAPTCHA_NONE
        ],
        'default'     => XformsConstants::CAPTCHA_INHERIT
    ],

    [
        'name'        => 'showforms',
        'title'       => '_MI_XFORMS_SHOWFORMS',
        'description' => '_MI_XFORMS_SHOWFORMS_DESC',
        'formtype'    => 'yesno',
        'valuetype'   => 'int',
        'default'     => 1
    ],

    [
        'name'        => 'perpage',
        'title'       => '_MI_XFORMS_PERPAGE',
        'description' => '_MI_XFORMS_PERPAGE_DESC',
        'formtype'    => 'textbox',
        'valuetype'   => 'int',
        'default'     => XformsConstants::FORMS_PER_PAGE_DEFAULT
    ]
];
