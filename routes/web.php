<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    try {
        $encryptedContent = Storage::get('file.dat');
        $decryptedContent = decrypt($encryptedContent);
    } catch (Exception $e) {
        $encryptedContent = null;
        $decryptedContent = null;
    }

    return view('welcome', compact('encryptedContent', 'decryptedContent'));
});

Route::post('/upload', function (Request $request) {

    $request->validate([
        'attachment' => ['required', 'file', 'mimes:jpeg,bmp,png']
    ]);

    $file = $request->file('attachment');

    // Get File Content
    $fileContent = $file->get();

    // Encrypt the content
    $encryptedContent = encrypt($fileContent);

    // Store file
    Storage::put('file.dat', $encryptedContent);

    return redirect()->back();
});

Route::get('/download', function () {

    $encryptedContent = Storage::get('file.dat');
    $decryptedContent = decrypt($encryptedContent);

    return response()->streamDownload(function() use ($decryptedContent) {
        echo $decryptedContent;
    }, 'file.jpg');

});
