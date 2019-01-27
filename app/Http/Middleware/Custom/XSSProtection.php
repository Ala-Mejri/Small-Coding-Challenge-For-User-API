<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Illuminate\Http\Request;

class XSSProtection {

    public function handle(Request $request, Closure $next) {
        $input = $request->input();
        array_walk_recursive($input, function (&$input, $key) {
            if (starts_with($key, 'html_')) {
                return;
            }
            /* Convert To UTF-8 */
            $input = $this->convertToUTF8($input);
            /* Remove Tags */
            $input = e(strip_tags($input));
        });
        $request->merge($input);
        return $next($request);
    }

    /**
      |------------------------------------------------------------
      | CONVERT TO UTF-8
      |------------------------------------------------------------
     */
    public function convertToUTF8($text) {
        $encoding = mb_detect_encoding($text, mb_detect_order(), false);
        if ($encoding == "UTF-8") {
            $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');
        }
        $out = iconv(mb_detect_encoding($text, mb_detect_order(), false), "UTF-8//IGNORE", $text);
        return $out;
    }

}
