<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */
/**
 * xForms module
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         GNU GPL 2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
 * @package         xforms
 * @since           1.30
 * @author          Xoops Development Team
 * @author          trabis <lusopoemas@gmail.com>
 * @author          Harry Fuecks (PHP Anthology Volume II)
 */

// defined("XOOPS_ROOT_PATH") or die("XOOPS root path not defined");

include_once dirname(__DIR__) . '/include/common.php';

/**
 * Class XformsSession
 */
class XformsSession
{
    /**
     * Session constructor<br />
     * Starts the session with session_start()
     * <strong>Note:</strong> that if the session has already started,
     * session_start() does nothing
     */
    protected function __construct()
    {
        @session_start();
    }

    /**
     * Sets a session variable
     *
     * @param string $name  name of variable
     * @param mixed  $value value of variable
     *
     * @return void
     * @access public
     */
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Fetches a session variable
     *
     * @param string $name name of variable
     *
     * @return mixed value of session variable
     * @access public
     */
    public function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        } else {
            return false;
        }
    }

    /**
     * Deletes a session variable
     *
     * @param string $name name of variable
     *
     * @return void
     * @access public
     */
    public function del($name)
    {
        unset($_SESSION[$name]);
    }

    /**
     * Destroys the whole session
     *
     * @return void
     * @access public
     */
    public function destroy()
    {
        $_SESSION = array();
        session_destroy();
    }

    /**
     * @return XformsSession
     */
    public static function &getInstance()
    {
        static $_sess;
        if (!isset($_sess)) {
            $_sess = new XformsSession();
        }

        return $_sess;
    }
}
