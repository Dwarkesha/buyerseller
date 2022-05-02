<?php

function generateURL($file = "") {
	// dd($file);
	return App\Http\Controllers\HelperController::generateUrl($file);
}