<?php

namespace App\Traits;

Trait  UploadFileTrait
{
    public function UplodeFile($FileUpload ,$folder){
       /* $Filepath = $FileUpload->store($folder);
        $FileExtension = $FileUpload->getClientOriginalExtension();
        $FileTitle=$FileUpload->getClientOriginalName();*/

        $FileExtention=strtolower($FileUpload->getClientOriginalExtension());
        $FileName=time().rand(100,9999).'.'.$FileExtention;
        $Filepath = $FileUpload->move($folder,$FileName);

        return [
            'Filepath' => $Filepath,
            'FileExtension' => $FileExtention,
            'FileTitle' => $FileName
        ];
    }


}
