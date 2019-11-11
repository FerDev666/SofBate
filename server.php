<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';

// <div class="k-grid-norecords-template"{1}><span class="k-icon k-i-gear k-icon-64"></span><p>{0}</p></div>
// >>> .k-icon-64 {
//         font-size: 64px; /* Sets icon size to 64px */
//     }
// $color_1: #767676;
// $background_color_1: #e8e8e8;
// $background_color_2: #f5faff;
// $border_color_1: #979797;

// .k-grid {
// 	font-size: 12px;
// 	font-weight: bold;
// }
// > {
// 	> {
// 		>.k-grouping-header {
// 			color: $color_1;
// 			background-color: $background_color_1;
// 			.k-group-indicator {
// 				border-color: $border_color_1;
// 			}
// 		}
// 		>.k-grid-header {
// 			background-color: $background_color_2;
// 			.k-grid-header-wrap {
// 				th.k-header {
// 					text-align: center;
// 					padding: 0.5em;
// 				}
// 			}
// 		}
// 		>.k-grid {
// 			tbody {
// 				tr {
// 					line-height: 20px;
// 					text-align: center;
// 				}
// 				td {
// 					padding: 0.5em;
// 				}
// 			}
// 		}
// 	}
// }