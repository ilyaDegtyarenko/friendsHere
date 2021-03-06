<?php

namespace App\Http\Traits\Helpers\Tools;

use App\Events\BugReportEvent;

trait BugReportHelper
{
    /**
     * Making bug report.
     *
     * @param $error
     */
    public static function bugReport($request, $error)
    {
        $controller = $request->route() ? class_basename($request->route()->getAction()['controller']) : 'BugReport';
        $method = $request->method();
        $uri = $request->decodedPath();

        $place = 'In ' . $controller . '. Request method: ' . $method . '. Uri: ' . $uri;

        event(new BugReportEvent($place, $error));
    }
}