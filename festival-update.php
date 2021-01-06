<?php
require_once 'config.php';

try {
    $rules = [
        'festival_id' => 'present|integer|min:1',
        "title" => "present|minlength:2|maxlength:64",
        "description" => "present|minlength:20|maxlength:2000",
        "location" => "present|minlength:4|maxlength:128",
        "start_date" => "present|minlength:10|maxlength:10",
        "end_date" => "present|minlength:10|maxlength:10",
        "contact_name" => "present|minlength:4|maxlength:64",
        "contact_email" => "present|email|minlength:7|maxlength:128",
        "contact_phone" => "present|match:/\A[0-9]{2,3}[-][0-9]{5,7}\Z/"
    ];

    $request->validate($rules);
    if ($request->is_valid()) {
        $image = null;
        if (FileUpload::exists('festival_image')) {
            $file = new FileUpload("festival_image");
            $file_path = $file->get();
            $image = new Image();
            $image->filename = $file_path;
            $image->save();
        }
        $festival = Festival::findById($request->input('festival_id'));
        $festival->title = $request->input("title");
        $festival->description = $request->input("description");
        $festival->location = $request->input("location");
        $festival->start_date = $request->input("start_date");
        $festival->end_date = $request->input("end_date");
        $festival->contact_name = $request->input("contact_name");
        $festival->contact_email = $request->input("contact_email");
        $festival->contact_phone = $request->input("contact_phone");
        if ($image !== null) {
            $festival->image_id = $image->id;
        }
        $festival->save();

        $request->session()->set("flash_message", "The festival was successfully added to the database");
        $request->session()->set("flash_message_class", "alert-info");
        $request->session()->forget("flash_data");
        $request->session()->forget("flash_errors");

        $request->redirect("/home.php");
    } else {
        $festival_id = $request->input('festival_id');

        $request->session()->set("flash_data", $request->all());
        $request->session()->set("flash_errors", $request->errors());

        $request->redirect("/festival-edit.php?festival_id=".$festival_id);
    }
} catch (Exception $ex) {
    $festival_id = $request->input('festival_id');

    $request->session()->set("flash_message", $ex->getMessage());
    $request->session()->set("flash_message_class", "alert-warning");
    $request->session()->set("flash_data", $request->all());
    $request->session()->set("flash_errors", $request->errors());

    $request->redirect("/festival-edit.php?festival_id=".$festival_id);
}
