<?php

namespace Aidph\Helpers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait CsvSeederTrait {


    /**
     * @param $filePath
     * @return array
     */
    public function csvToArray($filePath)
    {
        if(!file_exists($filePath) || !is_readable($filePath)) {
            return false;
        }

        $result = array();

        $file_handle = fopen($filePath, 'r');

        $headers = fgetcsv($file_handle, 1024);

        while(($row = fgetcsv($file_handle, 1024)) !== false)
        {
            $result[] = array_combine($headers, $row);
        }

        fclose($file_handle);

        return $result;
    }


    //        $keys = array('name', 'type', 'contact_person', 'contact_no');
//        $modelName = Str::singular(str_replace('TableSeeder', '', static::class));
} 