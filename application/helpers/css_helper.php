<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed'); 
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2016, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2016, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter URL Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/helpers/url_helper.html
 */

// ------------------------------------------------------------------------


if ( ! function_exists('base_url'))
{
	/**
	 * Base URL
	 *
	 * Create a local URL based on your basepath.
	 * Segments can be passed in as a string or an array, same as site_url
	 * or a URL to a file can be passed in, e.g. to an image file.
	 *
	 * @param	string	$uri
	 * @param	string	$protocol
	 * @return	string
	 */
	function base_url($uri = '', $protocol = NULL)
	{
		return get_instance()->config->base_url($uri, $protocol);
	}
}

if ( ! function_exists('css_url'))
{
    function css_url($str)
	{
        return base_url('',null).'assets/css/'.$str;
    }
}

if ( ! function_exists('js_url'))
{
    function js_url($str)
	{
        return base_url('',null).'assets/js/'.$str;
    }
}

if ( ! function_exists('vendors_url'))
{
    function vendors_url($str)
	{
        return base_url('',null).'assets/vendors/'.$str;
    }
}

if ( ! function_exists('vendor_url'))
{
    function vendor_url($str)
	{
        return base_url('',null).'assets/vendor/'.$str;
    }
}

?>