<?php
 if (! function_exists('mix')) {
    /**
     * Get the path to a versioned Mix file.
     *
     * @param string $path
     * @param string $manifestDirectory
     * @return string
     *
     * @throws \Exception
     */
    function mix($path, $manifestDirectory = '')
    {
        static $manifest;
        $publicFolder = '';
        $rootPath = $_SERVER['DOCUMENT_ROOT'];
        $publicPath = $rootPath . $publicFolder;

        if ($manifestDirectory && ! str_starts_with($manifestDirectory, '/')) {
            $manifestDirectory = "/{$manifestDirectory}";
        }

     $manifest = json_decode(file_get_contents(__DIR__.DIRECTORY_SEPARATOR.'public/mix-manifest.json'), true);

     $path = "/{$path}";

        if (! array_key_exists($path, $manifest)) {
            throw new Exception(
                "Unable to locate Mix file: {$path}. Please check your ".
                'webpack.mix.js output paths and try again.'
            );
        }
        return $manifest[$path];
    }
}
