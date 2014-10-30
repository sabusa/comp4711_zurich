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
        <script src="/assets/js/jquery-1.11.0.min.js"></script>
        <script src="/assets/js/lightbox.min.js"></script>
        <link rel="stylesheet" type="text/css" href="/assets/css/style.css"/>
        <link href="/assets/css/lightbox.css" rel="stylesheet" />
    </head>
    <body>
        <div id="header">
            <div class="mylogo">
                <img src="../../assets/images/images.jpg" width=50px height=50px />
            </div>
            <h1>{title}</h1>
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
