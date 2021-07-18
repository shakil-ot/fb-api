<?php

namespace App\Http\Controllers;

use App\Contracts\Services\FacebookMarketingContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $facebookMarketingService;

    public function __construct(FacebookMarketingContract $facebookMarketingService)
    {
        $this->middleware('auth');
        $this->facebookMarketingService = $facebookMarketingService;

    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request['access_token'] = 'EAAqXFOLkdBcBAESa7WMogshSZBqA1yShdyLQnSXHAWZB7L6QWhrgd6ydXL2V9plDPdJB0vddFcyhKjoYjZBAZCZA7AEZATg4eIU4cyvk7DJx6wr3q0OaqMhknuL4FP6LMcIA89XsM1Dlvlg3gXIdcLiZAWRmVTYvhcLDFy4WkKBAiWALHASGxUjSFvtJeaTPQIe21645biAdveSVbhlpAITSd0JxqO9JJtft3Ct4wQYYKMv2LNWJWmi';
        $request['page_access_token'] = 'EAAqXFOLkdBcBAMAfuK4Fe50xDSWZA7wSSWojscq9s6ntzRpvndfLan8gdV4j4I7N7nRh4K7lXGsO2uUzVxNhcMygjcs85ZCRHhuNwmPhZCg2qnS8Cux5MVYhgY97uYntmgeEnQZCyNTjZBipINWvxkN56zZCtb7bPc1RseUnI6zB0JP3q0poi4RTri5nZBHpZBXZBONMuETXAIT4RPdttjhoZA';
        $request['businessId'] = '100405035640930';
        $request['act_ad_account'] = 'act_493626251700401';

        $adAccount = $this->facebookMarketingService->adAccountAPI($request);

        $pageList = $this->facebookMarketingService->getPageListAPI($request);

        $pixelList = $this->facebookMarketingService->getPixelListAPI($request);

        $igList = $this->facebookMarketingService->getInstagramListAPI($request);

        //dd(json_decode($adAccount,true));

        $adAccount = json_decode($adAccount, true);

        $pageList = json_decode($pageList, true);

        $pixelList = json_decode($pixelList, true);

        $igList = json_decode($igList, true);

        if (isset($adAccount["data"][0])) {
            $adAccount = $adAccount["data"];
        }

        if (isset($pageList["data"][0])) {
            $pageList = $pageList["data"];
        }

        if (isset($pixelList["data"][0])) {
            $pixelList = $pixelList["data"];
        }

        if (isset($igList["data"][0])) {
            $igList = $igList["data"];
        }

        return view('home')->with([
            'adAccounts' => $adAccount,
            'pageLists' => $pageList,
            'pixelLists' => $pixelList,
            'igLists' => $igList
        ]);

    }

    public function sendEmailForBusinessManager(Request $request)
    {

        /**
         * You’ve been given access to Cloud's test (business Manager)
         *
         * this function will give your business manager access to your client
         */

        $request['business_id']='100405035640930';
        $request['email']='alabir65@gmail.com';
        $request['role']='ADMIN';
        $request['access_token']='EAAqXFOLkdBcBAOZBOuutum5d4bZCS1Ev2GKSwHKwNgR814LZCFZCiE5eosR5ZAAZBOPEXhoYh2xRrxMEFjjQUYCI5HlC4nqqZCZCXNZCxluYOZA0DiPK00lJQ0lV46NqNJkv1kRMiN3hl6GZCbQ6sQNCRFUG9vPwRm6myic30aye5bSPNeIuFLKIyCesZBUtE77eCKNWBlIDHXuELdpbrHFy1tVn4huVOvFjiy2Ts30oAP2ZALS15fZB9ZBd73M';

        $sendEmail=$this->facebookMarketingService->invitePeopleAPI($request);

    }

    public function givePageAccess(Request $request)
    {
        /**
         *
         *
         * this function will give your Page access to your client
         *
         * business ID shakil vai
         *
         * page id and access token is mine
         *
         */

        $request['clientBusinessId']='619658698964160';
        $request['pageId']='100340215658876';
        $request['pageRole']='MANAGE';

        /**
         *
         * aram permitted_tasks[0] must be one of {MANAGE, CREATE_CONTENT, MODERATE, MESSAGING, ADVERTISE, ANALYZE, MODERATE_COMMUNITY, MANAGE_JOBS, PAGES_MESSAGING, PAGES_MESSAGING_SUBSCRIPTIONS, READ_PAGE_MAILBOXES, VIEW_MONETIZATION_INSIGHTS, MANAGE_LEADS, PROFILE_PLUS_FULL_CONTROL, PROFILE_PLUS_MANAGE, PROFILE_PLUS_FACEBOOK_ACCESS, PROFILE_PLUS_CREATE_CONTENT, PROFILE_PLUS_MODERATE, PROFILE_PLUS_MESSAGING, PROFILE_PLUS_ADVERTISE, PROFILE_PLUS_ANALYZE, CASHIER_ROLE}."
         */

        $request['access_token']='EAAqXFOLkdBcBAHDQZAowcitB3PkpDg0M4WrNDSX6BNiKZBQq1dKKM33ZCFWhUMLlmSThpawzEUdBYwYSNL9YAQMAZCGGidVqOBZBMWVphZCPrZCbUHHplyYlBahCojR9FzMd61mZBpXEQM2HjEZA4wBiw4UZBFUkjGN34c0X4ZBwKZC6FXzyiNxOEmIpUppZAZCJWEdRGhHZB4gy9UtlNgjHvwKaJCP';


        $pageAccess = $this->facebookMarketingService->claimClientPageAPI($request);


    }
}
