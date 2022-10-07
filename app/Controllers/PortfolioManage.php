<?php

namespace App\Controllers;

class PortfolioManage extends BaseController
{
    /* 
     * This is where logged-in users can manage their photo galleries
     */ 
    public function index()
    {
        return;
    }

    /*
     * Uploads a photo via AJAX request
     * 
     * Specifically, this function will
     * - Validate the file (ensure the file ends in a valid extension, proper name, etc.)
     * - Copy the file to the user's public folder (which will have to be created when the user is)
     * - Add the photo to the database
     * - Maybe there should be some JS on the frontend to update the preview? 
     */
    public function uploadPhoto()
    {
        $user = auth()->user();
        $uploadDirectory = FCPATH.'uploads/'.$user->getEmail();
        $response_array; // This will hold the response status and message

        // Creates the user's upload directory if it doesn't already exist, and return an error if that operation fails
        if (!(is_dir($uploadDirectory) || mkdir($uploadDirectory, 0744)))
        {
            $response_array['status'] = 'error';
        }


    }

    /*
     * Deletes a photo, given an id (add details later)
     */
    public function deletePhoto()
    {
        return;
    }
}
