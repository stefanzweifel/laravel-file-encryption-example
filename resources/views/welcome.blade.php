<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>File Encryption Example - Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="bg-white text-black antialiased">

        <div class="container max-w-lg m-auto my-12">

            <h1 class="text-grey-darkest mb-2">File Encryption Example</h1>
            <p class="mb-4">Upload any image. The encrypted version will be stored in <code>/storage/app/file.dat</code></p>

            <form class="w-full my-6" action="/upload" method="post" enctype="multipart/form-data">
                @csrf()
                <input type="file" name="attachment">
                <button type="submit" class="bg-blue text-white py-2 px-4 rounded">Upload and encrypt</button>
            </form>

            @if ($decryptedContent)
                <div class="border-t">
                    <h2 class="mt-6 mb-2">Decrypted Content</h2>
                    <img src="data:image/png;base64,{!! base64_encode($decryptedContent) !!}" alt="">
                </div>

                <a href="/download" class="inline-block mt-2">Download Image</a>
            @endif

        </div>

    </body>
</html>
