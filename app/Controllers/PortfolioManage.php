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
     * Uploads a photo
     * 
     * Specifically, this function will
     * - Validate the file (ensure the file ends in a valid extension, proper name, etc.)
     * - Copy the file to the user's public folder (which will have to be created when the user is)
     * - Maybe there should be some JS on the frontend to update the preview? 
     */
    public function uploadPhoto()
    {
        return;
    }

    /*
     * Deletes a photo, given an id (add details later)
     */
    public function deletePhoto()
    {
        return;
    }
}
