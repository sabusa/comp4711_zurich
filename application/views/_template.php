<?php
if (!defined('APPPATH'))
    exit('No direct script access allowed');
/**
 * view/template.php
 *
 * Pass in $pagetitle (which will in turn be passed along)
 * and $pagebody, the name of the content view.
 *
 * ------------------------------------------------------------------------
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>{title}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
    </head>
    <body>
        <img src="../../assets/images/general_view_day-zurich.jpg" alt="" width=100% height=150px />
        <div id="header">
            <!--<div class="mylogo">
                <img src="../../assets/images/images.jpg" width=100px height=100px />
            </div>-->
            <div class="mynav">
                    {menubar}
            </div>
        </div>
        <div id="wrapper">
            <div class="alone"></div>
            <div>
                <div id="content">
                    {content}
                </div>
            </div>
        </div>
            <div id="footer" class="span12">
                Copyright &copy; 2014,  <a href="mailto:someone@somewhere.com">Jason Roque & Sandra Buchanan</a>.
            </div>
    </body>
</html>
