<?php

// CONTAINS FUNCTIONS USED TO 'HELP' THROUGHOUT THE APP

// use File;

/** Handle file upload */

// YOU DONT NEED THE $request, YOU CAN USE THE request() FUNCTION
// ACCEPTS 2 PARAMS, INPUT FIELD NAME + THE MODEL
// BY DEFAULT, THE MODEL IS SET TO 'NULL'
// THE MODEL PARAM WILL BE OUT FILE PATH
// WE GRAB THE FULL PATH FROM THE MODEL ROW

// WHENEVER WE CALL THIS CODE IT WILL HANDLE THE UPLOAD FOR YOU
function handleUpload($inputName, $model=null){

    try{
        if(request()->hasFile($inputName)){

            if($model && File::exists(public_path($model->{$inputName}))){ // CHECKS IF THERE IS AN IMAGE IN THE PUBLIC FOLDER // YOU HAVE TO ACCESS THE COLUMN FROM THE MODEL
                File::delete(public_path($model->{$inputName})); // DELETES THE OLD FILE
            }

            $file = request()->file($inputName);
            $fileName = rand().$file->getClientOriginalName(); // GRABS THE FILE'S ORIGINAL NAME, THE METHOD RETURNS THE FILENAME AND ITS EXTENSION, IT MAKES SURE EVERY FILE YOU UPLOAD IS UNIQUE
            $file->move(public_path('/uploads'), $fileName); // STORES THE IMAGE INTO THE UPLOADS FOLDER // '/uploads/' is the SUB-DIRECTORY OF THE PUBLIC FOLDER
            $filePath = "/uploads/".$fileName; // SAVES THE IMAGE PATH INTO THE DB

            return $filePath;
        }
    }catch(\Exception $e){
        throw $e;
    }

}

/*
use a try/catch, check if the data at the file path exists

*/

function deleteFileIfExists($filePath){

    try{
        if(\File::exists(public_path($filePath))){
            \File::delete(public_path($filePath));
        }
    }catch(\Exception $e){
        throw $e;
    }

}
