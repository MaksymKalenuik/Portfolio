<?php

namespace core;


class Uploader
{

    const UPLOAD_DIR = ABSOLUTE_PATH . '/source/images/' /* This is an absolute path */
    ;
    const UPLOAD_DIR_ACCESS_MODE = 0777;
    const UPLOAD_MAX_FILE_SIZE = 10485760;
    const UPLOAD_ALLOWED_MIME_TYPES = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif',
    ];

    public function __construct()
    {

    }

    public function upload($file = [])
    {
        $uploadResult = $this->uploadFile($file);

        if ($uploadResult !== TRUE) {
            $errors[] = $uploadResult;
        }

        return empty($errors) ? '' : $uploadResult;
    }

    private function uploadFile($file = [])
    {
        $name = $file['name'];
        $type = $file['type'];
        $tmpName = $file['tmp_name'];
        $error = $file['error'];
        $size = $file['size'];


        switch ($error) {
            case UPLOAD_ERR_OK:
                if ($size > self::UPLOAD_MAX_FILE_SIZE) {
                    echo sprintf('The size of the file "%s" exceeds the maximal allowed size (%s Byte).'
                        , $name
                        , self::UPLOAD_MAX_FILE_SIZE
                    );
                    return '';
                }
                if (!in_array($type, self::UPLOAD_ALLOWED_MIME_TYPES)) {
                    echo sprintf('The file "%s" is not of a valid MIME type. Allowed MIME types: %s.'
                        , $name
                        , implode(', ', self::UPLOAD_ALLOWED_MIME_TYPES)
                    );
                    return '';
                }

                $uploadDirPath = rtrim(self::UPLOAD_DIR, '/');
                $uploadPath = $uploadDirPath . '/' . $name;

                $this->createDirectory($uploadDirPath);

                if (!move_uploaded_file($tmpName, $uploadPath)) {
                    echo sprintf('The file "%s" could not be moved to the specified location.'
                        , $name
                    );
                    return '';
                }

                return $file['name'];

                break;

            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                echo sprintf('The provided file "%s" exceeds the allowed file size.'
                    , $name
                );
                return '';
                break;

            case UPLOAD_ERR_PARTIAL:
                echo sprintf('The provided file "%s" was only partially uploaded.'
                    , $name
                );
                return '';
                break;

            case UPLOAD_ERR_NO_FILE:
                echo 'No file provided. Please select at least one file.';
                return '';
                break;

            default:
                echo 'There was a problem with the upload. Please try again.';
                return '';
                break;
        }

        return $file['name'];
    }

    private function createDirectory($path)
    {
        try {
            if (file_exists($path) && !is_dir($path)) {
                throw new \Exception(
                    'The upload directory can not be created because '
                    . 'a file having the same name already exists!'
                );
            }
        } catch (\Exception $exc) {
            echo $exc->getMessage();
            exit();
        }
        if (!is_dir($path)) {
            mkdir($path, self::UPLOAD_DIR_ACCESS_MODE, TRUE);
        }
        return $this;
    }
}