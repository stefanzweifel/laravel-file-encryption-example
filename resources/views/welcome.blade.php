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

            <h1 class="text-grey-darkest">File Encryption Example</h1>

            <form class="w-full my-6" action="/upload" method="post" enctype="multipart/form-data">
                @csrf()
                <input type="file" name="attachment">
                <button type="submit" class="bg-blue text-white py-2 px-4 rounded">Upload and encrypt</button>
            </form>

            <div class="flex border-t">
                <div class="w-1/2">
                    <h2 class="mt-6 mb-4">Decrypted Content</h2>
                    {!! $decryptedContent !!}
                </div>
                <div class="w-1/2">
                    <h2 class="mt-6 mb-4">Encrypted Content</h2>
                    <pre
                        style="word-break: break-word; height: 25em;"
                        class="p-6 rounded bg-grey-light overflow-scroll"
                    >{{ $encryptedContent }}</pre>
                </div>
            </div>

        </div>

    </body>
</html>
