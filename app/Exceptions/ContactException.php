<?php

namespace App\Exceptions;

use Exception;

class ContactException extends Exception
{
    // just a stub class to illustrate custom exception handling

    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        //
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response("There was a problem submitting your contact form.  Please try again later.");
    }
}
