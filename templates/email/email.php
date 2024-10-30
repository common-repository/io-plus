<?php
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
      style="width:100%;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title><?php _e('IO Plus Email', 'io-plus'); ?></title>
    <!--[if (mso 16)]>
    <style type="text/css">
        a {
            text-decoration: none;
        }
    </style>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup {
        font-size: 100% !important;
    }</style><![endif]-->
    <!--[if gte mso 9]>
    <xml>
        <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
        </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->

    <style type="text/css">
        @media only screen and (max-width: 600px) {
            p, ul li, ol li, a {
                font-size: 16px !important;
                line-height: 150% !important
            }

            h1 {
                font-size: 30px !important;
                text-align: center;
                line-height: 120% !important
            }

            h2 {
                font-size: 26px !important;
                text-align: center;
                line-height: 120% !important
            }

            h3 {
                font-size: 20px !important;
                text-align: center;
                line-height: 120% !important
            }

            h1 a {
                font-size: 30px !important
            }

            h2 a {
                font-size: 26px !important
            }

            h3 a {
                font-size: 20px !important
            }

            .es-menu td a {
                font-size: 16px !important
            }

            .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a {
                font-size: 16px !important
            }

            .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a {
                font-size: 16px !important
            }

            .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a {
                font-size: 12px !important
            }

            *[class="gmail-fix"] {
                display: none !important
            }

            .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 {
                text-align: center !important
            }

            .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 {
                text-align: right !important
            }

            .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 {
                text-align: left !important
            }

            .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img {
                display: inline !important
            }

            .es-button-border {
                display: block !important
            }

            a.es-button {
                font-size: 20px !important;
                display: block !important;
                border-width: 15px 25px 15px 25px !important
            }

            .es-btn-fw {
                border-width: 10px 0px !important;
                text-align: center !important
            }

            .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right {
                width: 100% !important
            }

            .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header {
                width: 100% !important;
                max-width: 600px !important
            }

            .es-adapt-td {
                display: block !important;
                width: 100% !important
            }

            .adapt-img {
                width: 100% !important;
                height: auto !important
            }

            .es-m-p0 {
                padding: 0px !important
            }

            .es-m-p0r {
                padding-right: 0px !important
            }

            .es-m-p0l {
                padding-left: 0px !important
            }

            .es-m-p0t {
                padding-top: 0px !important
            }

            .es-m-p0b {
                padding-bottom: 0 !important
            }

            .es-m-p20b {
                padding-bottom: 20px !important
            }

            .es-mobile-hidden, .es-hidden {
                display: none !important
            }

            tr.es-desk-hidden, td.es-desk-hidden, table.es-desk-hidden {
                width: auto !important;
                overflow: visible !important;
                float: none !important;
                max-height: inherit !important;
                line-height: inherit !important
            }

            tr.es-desk-hidden {
                display: table-row !important
            }

            table.es-desk-hidden {
                display: table !important
            }

            td.es-desk-menu-hidden {
                display: table-cell !important
            }

            table.es-table-not-adapt, .esd-block-html table {
                width: auto !important
            }

            table.es-social {
                display: inline-block !important
            }

            table.es-social td {
                display: inline-block !important
            }
        }

        #outlook a {
            padding: 0;
        }

        .ExternalClass {
            width: 100%;
        }

        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }

        .es-button {
            mso-style-priority: 100 !important;
            text-decoration: none !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        .es-desk-hidden {
            display: none;
            float: left;
            overflow: hidden;
            width: 0;
            max-height: 0;
            line-height: 0;
            mso-hide: all;
        }
    </style>
</head>
<body style="width:100%;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0">

<div class="es-wrapper-color" style="background-color:#F4F4F4">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
        <v:fill type="tile" color="#f4f4f4"></v:fill>
    </v:background>
    <![endif]-->
    <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0"
           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top">
        <tr class="gmail-fix" height="0" style="border-collapse:collapse">
            <td style="padding:0;Margin:0">
                <table cellspacing="0" cellpadding="0" border="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;width:600px">
                    <tr style="border-collapse:collapse">
                        <td cellpadding="0" cellspacing="0" border="0"
                            style="padding:0;Margin:0;line-height:1px;min-width:600px" height="0"><img
                                    src="https://esputnik.com/repository/applications/images/blank.gif"
                                    style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;max-height:0px;min-height:0px;min-width:600px;width:600px"
                                    alt width="600" height="1"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr style="border-collapse:collapse">
            <td valign="top" style="padding:0;Margin:0">
                <table cellpadding="0" cellspacing="0" class="es-content" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                   cellspacing="0" cellpadding="0" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px">
                                        <!--[if mso]>
                                        <table style="width:580px" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width:282px" valign="top"><![endif]-->
                                        <!--<table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:282px">
                                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td class="es-infoblock es-m-txt-c" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:14px;color:#CCCCCC">Business Sign-Up</p></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table>-->
                                        <!--[if mso]></td>
                                        <td style="width:20px"></td>
                                        <td style="width:278px" valign="top"><![endif]-->
                                        <!--<table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                            <tr style="border-collapse:collapse">
                                                <td align="left" style="padding:0;Margin:0;width:278px">
                                                    <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="right" class="es-infoblock es-m-txt-c" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:14px;color:#CCCCCC"><a href="https://viewstripo.email" class="view" target="_blank" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC">View in browser</a></p></td>
                                                        </tr>
                                                    </table></td>
                                            </tr>
                                        </table>-->
                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-header" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#EC6D64;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" bgcolor="#0081FF" style="padding:0;Margin:0;background-color:#0081FF">
                            <table class="es-header-body" cellspacing="0" cellpadding="0" align="center"
                                   bgcolor="#0081FF"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#0081FF;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:580px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="Margin:0;padding-left:10px;padding-right:10px;padding-top:25px;padding-bottom:25px;font-size:0px">
                                                                <img src="<?php echo esc_url($image_logo_white); ?>" alt
                                                                     style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                     width="230"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td style="padding:0;Margin:0;background-color:#0081FF" bgcolor="#0081FF" align="center">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                   cellspacing="0" cellpadding="0" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#FFFFFF;border-radius:4px"
                                                           width="100%" cellspacing="0" cellpadding="0"
                                                           bgcolor="#ffffff" role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px">
                                                                <h1 style="Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:48px;font-style:normal;font-weight:normal;color:#111111">
                                                                    <?php _e('Thank you for Sign-Up', 'io-plus'); ?></h1>
                                                            </td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td bgcolor="#ffffff" align="center"
                                                                style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;font-size:0">
                                                                <table width="100%" height="100%" cellspacing="0"
                                                                       cellpadding="0" border="0" role="presentation"
                                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #FFFFFF;height:1px;width:100%;margin:0px"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px"
                                   cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-top:20px">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:600px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0;font-size:0px">
                                                                <img class="adapt-img"
                                                                     src="<?php echo esc_url($image_mail); ?>"
                                                                     alt
                                                                     style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                     width="600"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF"
                                                           width="100%" cellspacing="0" cellpadding="0"
                                                           bgcolor="#ffffff" role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td class="es-m-txt-l" bgcolor="#ffffff" align="left"
                                                                style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px">
                                                                <h1 style="Margin:0;line-height:48px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:32px;font-style:normal;font-weight:normal;color:#444546">
                                                                    <strong><?php echo esc_html($business_info['business_name']); ?></strong>
                                                                </h1></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="padding:0;Margin:0;padding-top:20px;padding-left:30px;padding-right:30px">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:540px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:36px;color:#666666">
                                                                    <strong><?php echo esc_html($address); ?>
                                                                        <br>
                                                                        <?php if (!empty($website)): ?>
                                                                            <a target="_blank"
                                                                               href="<?php echo esc_url($website); ?>"
                                                                               style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;text-decoration:underline;color:#0081FF"><?php echo esc_url($website); ?></a>
                                                                            <br>
                                                                        <?php endif; ?>
                                                                        <?php if (!empty($phone)): ?>
                                                                            <?php echo esc_html($phone); ?><br>
                                                                        <?php endif; ?>
                                                                        <?php /*echo esc_html($address);*/ ?>
                                                                        <span
                                                                                data-cke-bookmark="1"
                                                                                style="display:none">&nbsp;</span><span
                                                                                data-cke-bookmark="1"
                                                                                style="display:none">&nbsp;</span></p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-left:30px;padding-right:30px">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:540px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="padding:20px;Margin:0;font-size:0">
                                                                <table border="0" width="100%" height="100%"
                                                                       cellpadding="0" cellspacing="0"
                                                                       role="presentation"
                                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #CCCCCC;background:none;height:1px;width:100%;margin:0px"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0;padding-left:30px;padding-right:30px">
                                        <table cellpadding="0" cellspacing="0" width="100%"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" valign="top" style="padding:0;Margin:0;width:540px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="left" style="padding:0;Margin:0"><p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:36px;color:#666666">
                                                                    <?php /* _e('Max Occupancy', 'io-plus'); ?>: <?php echo esc_html($max_occupancy);?><br><?php _e('Current Limit', 'io-plus'); ?>: <?php echo esc_html($current_Limit);?>%<br> */ ?>
                                                                    <?php _e('Manager Name', 'io-plus'); ?>
                                                                    : <?php echo esc_html($user_name); ?><span
                                                                            data-cke-bookmark="1" style="display:none">&nbsp;</span>
                                                                </p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-left:30px;padding-right:30px;padding-top:40px;padding-bottom:40px">
                                        <!--[if mso]>
                                        <table style="width:540px" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width:187px" valign="top"><![endif]-->
                                        <!--<table cellpadding="0" cellspacing="0" class="es-left" align="left"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p0r es-m-p20b" align="center"
                                                    style="padding:0;Margin:0;width:167px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><span
                                                                        class="es-button-border"
                                                                        style="border-style:solid;border-color:#EC6D64;background:#0081FF;border-width:0px;display:inline-block;border-radius:5px;width:auto"><a
                                                                            href="<?php echo esc_url($business_info['link']) ?>"
                                                                            class="es-button" target="_blank"
                                                                            style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:16px;color:#FFFFFF;border-style:solid;border-color:#0081FF;border-width:15px 25px 15px 25px;display:inline-block;background:#0081FF;border-radius:5px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">Employee List</a></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td class="es-hidden" style="padding:0;Margin:0;width:20px"></td>
                                            </tr>
                                        </table>-->
                                        <!--[if mso]></td>
                                        <td style="width:167px" valign="top"><![endif]-->
                                        <table cellpadding="0" cellspacing="0" class="es-left" align="left"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left">
                                            <tr style="border-collapse:collapse">
                                                <td class="es-m-p20b" align="center"
                                                    style="padding:0;Margin:0;width:167px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><span
                                                                        class="es-button-border"
                                                                        style="border-style:solid;border-color:#EC6D64;background:#0081FF;border-width:1px;display:inline-block;border-radius:5px;width:auto"><a
                                                                            href="<?php echo esc_url($business_info['link']) ?>"
                                                                            class="es-button" target="_blank"
                                                                            style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:16px;color:#FFFFFF;border-style:solid;border-color:#0081FF;border-width:15px 25px 15px 25px;display:inline-block;background:#0081FF;border-radius:5px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">Employee Link</a></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td>
                                        <td style="width:20px"></td>
                                        <td style="width:166px" valign="top"><![endif]-->
                                        <table cellpadding="0" cellspacing="0" class="es-right" align="right"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right">
                                            <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;width:166px">
                                                    <table cellpadding="0" cellspacing="0" width="100%"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><span
                                                                        class="es-button-border"
                                                                        style="border-style:solid;border-color:#EC6D64;background:#0081FF;border-width:1px;display:inline-block;border-radius:5px;width:auto"><a
                                                                            href="<?php echo esc_url($business_info['link']) ?>"
                                                                            class="es-button" target="_blank"
                                                                            style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, 'helvetica neue', arial, verdana, sans-serif;font-size:16px;color:#FFFFFF;border-style:solid;border-color:#0081FF;border-width:15px 25px 15px 25px;display:inline-block;background:#0081FF;border-radius:5px;font-weight:normal;font-style:normal;line-height:19px;width:auto;text-align:center">Manage Link</a></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if mso]></td></tr></table><![endif]--></td>
                                </tr>
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#FFFFFF"
                                                           width="100%" cellspacing="0" cellpadding="0" bgcolor="#FFF"
                                                           role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0;font-size:0px">
                                                                <img class="adapt-img" src="cid:image-qr-code" alt
                                                                     style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                                                     width="350"></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center" style="padding:0;Margin:0"><p
                                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:27px;color:#414141; padding-bottom: 20px;">
                                                                    <?php _e('Your url with the code', 'io-plus'); ?>:&nbsp;<a
                                                                            href="<?php echo esc_url($business_info['link']) ?>"
                                                                            style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;text-decoration:underline;color:#0081FF"><?php echo esc_html($business_link_text) ?></a>
                                                                </p></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body" cellspacing="0" cellpadding="0" bgcolor="#ffffff"
                                   align="center"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px;background-color:#FFFFFF"
                                                           width="100%" cellspacing="0" cellpadding="0"
                                                           bgcolor="#FFFFFF">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="padding:0;Margin:0;display:none"></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                   cellspacing="0" cellpadding="0" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px;font-size:0">
                                                                <table width="100%" height="100%" cellspacing="0"
                                                                       cellpadding="0" border="0" role="presentation"
                                                                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                                    <tr style="border-collapse:collapse">
                                                                        <td style="padding:0;Margin:0;border-bottom:1px solid #F4F4F4;height:1px;width:100%;margin:0px"></td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#0081FF;width:600px"
                                   cellspacing="0" cellpadding="0" bgcolor="#0081ff" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left" style="padding:0;Margin:0">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                                                    <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:4px"
                                                           width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation">
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="padding:0;Margin:0;padding-top:30px;padding-left:30px;padding-right:30px;padding-right:30px">
                                                                <h3 style="Margin:0;line-height:24px;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:20px;font-style:normal;font-weight:normal;color:#FFFFFF">
                                                                    <?php _e('Need more help?', 'io-plus'); ?></h3></td>
                                                        </tr>
                                                        <tr style="border-collapse:collapse">
                                                            <td align="center"
                                                                style="padding:0;Margin:0;padding-bottom:30px;padding-left:30px;padding-right:30px">
                                                                <a target="_blank" href="https://ioplus.org/contact-us/"
                                                                   style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:18px;text-decoration:underline;color:#FFFFFF">
                                                                    <?php _e('We’re here, ready to talk', 'io-plus'); ?></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellpadding="0" cellspacing="0" class="es-footer" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-footer-body" cellspacing="0" cellpadding="0" align="center"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:540px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <!--<td align="center" style="padding:0;Margin:0;padding-top:25px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;line-height:21px;color:#666666">You received this email because you just signed up in ioplus.org with your business. if it looks weird, <strong><a class="view" target="_blank" href="https://viewstripo.email" style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:14px;text-decoration:underline;color:#111111">view it in your browser</a></strong>.</p></td>-->
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table class="es-content" cellspacing="0" cellpadding="0" align="center"
                       style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                    <tr style="border-collapse:collapse">
                        <td align="center" style="padding:0;Margin:0">
                            <table class="es-content-body"
                                   style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px"
                                   cellspacing="0" cellpadding="0" align="center">
                                <tr style="border-collapse:collapse">
                                    <td align="left"
                                        style="Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;padding-bottom:30px">
                                        <table width="100%" cellspacing="0" cellpadding="0"
                                               style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                                    <table width="100%" cellspacing="0" cellpadding="0"
                                                           role="presentation"
                                                           style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                                        <tr style="border-collapse:collapse">
                                                            <td class="es-infoblock made_with" align="center"
                                                                style="padding:0;Margin:0;line-height:0px;font-size:0px;color:#CCCCCC">
                                                                <a target="_blank" href="<?php echo home_url(); ?>"
                                                                   style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:lato, 'helvetica neue', helvetica, arial, sans-serif;font-size:12px;text-decoration:underline;color:#CCCCCC"><img
                                                                            src="<?php echo esc_url($image_logo); ?>"
                                                                            alt
                                                                            width="200"
                                                                            style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"></a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
