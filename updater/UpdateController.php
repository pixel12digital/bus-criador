<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Artisan;

class UpdateController extends Controller
{
    public function version()
    {
        return view('updater.version');
    }

    public function recurse_copy($src, $dst)
    {
        // dd(base_path($src), base_path($dst));
        $dir = opendir(base_path($src));
        @mkdir(base_path($dst), 0775, true);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir(base_path($src) . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy(base_path($src . '/' . $file), base_path($dst) . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function upversion(Request $request)
    {

        $assets = array(
            ['path' => 'app', 'type' => 'folder', 'action' => 'replace'],

            ['path' => 'resources/views', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'routes', 'type' => 'folder', 'action' => 'replace'],
            ['path' => 'version.json', 'type' => 'file', 'action' => 'replace'],
        );
        foreach ($assets as $key => $asset) {
            $des = '';
            if (strpos($asset["path"], 'assets/') !== false) {
                $des = 'public/' . $asset["path"];
            } else {
                $des = $asset["path"];
            }
            // if updater need to replace files / folder (with/without content)
            if ($asset['action'] == 'replace') {
                if ($asset['type'] == 'file') {
                    copy(base_path('public/updater/' . $asset["path"]), base_path($des));
                }
                if ($asset['type'] == 'folder') {
                    $this->delete_directory(base_path($des));
                    $this->recurse_copy('public/updater/' . $asset["path"], $des);
                }
            }
            // if updater need to add files / folder (with/without content)
            elseif ($asset['action'] == 'add') {

                if ($asset['type'] == 'folder') {

                    $this->recurse_copy('public/updater/' . $asset["path"], $des);
                }
            }
        }

        $arr = ['WEBSITE_HOST' => $request->website_host];
        setEnvironmentValue($arr);
        Artisan::call('config:clear');
        Artisan::call('migrate');

        // Add email templates for users who don't have them
        $this->checkAndAddEmailTemplates();

        \Session::flash('success', 'Updated successfully');
        return redirect('updater/success.php');
    }

    function delete_directory($dirname)
    {
        $dir_handle = null;
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while ($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname . "/" . $file))
                    unlink($dirname . "/" . $file);
                else
                    $this->delete_directory($dirname . '/' . $file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }

    public function redirectToWebsite(Request $request)
    {
        $arr = ['WEBSITE_HOST' => $request->website_host];
        setEnvironmentValue($arr);
        \Artisan::call('config:clear');

        return redirect()->route('front.index');
    }

    protected function checkAndAddEmailTemplates()
    {
        // Get all user_ids that need the reset_password template
        $usersMissingTemplate = DB::table('customers')
            ->select('user_id')
            ->distinct()  
            ->whereNotExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('user_email_templates')
                    ->whereColumn('user_email_templates.user_id', 'customers.user_id')
                    ->where('email_type', 'reset_password');
            })
            ->pluck('user_id');


        if ($usersMissingTemplate->isNotEmpty()) {
            $now = now(); 

            $templatesToInsert = $usersMissingTemplate->map(function ($userId) use ($now) {
                return [
                    'user_id' => $userId,
                    'email_type' => 'reset_password',
                    'email_subject' => 'Recover Password of Your Account',
                    'email_body' => '<p>Hi {customer_name},</p><p>We have received a request to reset your password. If you did not make the request, just ignore this email. Otherwise, you can reset your password using the below link.</p><p>{password_reset_link}</p><p>Thanks,<br />{website_title}</p><br />',
                    'created_at' => $now,
                    'updated_at' => $now
                ];
            })->toArray();
            DB::table('user_email_templates')->insert($templatesToInsert);
        }
    }
}
