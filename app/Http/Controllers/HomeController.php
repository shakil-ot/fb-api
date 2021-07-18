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
        $request['access_token'] = 'EAAqXFOLkdBcBADGRdz5wyu8I05qH1YQuZB1jVjzGY856N9DFOrP2QLsosvEvZAOmeLNulylcrB1dc7ZCvxqv6JX7Sa2FVy0bZAYGmv5ZB4vK00FH0ZBNTtNzPNg1fvgDHzE0cH3SoCvZC8VCDmWhVzZCjO3HLhm2s2kXZALUmSu8wGyGmedNiAqTz8jfkgtSmniPoRBZCN6lXJZADdFrpxmOyT9FUbXgdngAENySvRmbIAwhrA7u0qGGGwf';
        $request['page_access_token'] = 'EAAqXFOLkdBcBAMcfSfIWZCSvy0hCh4zuigBFzEtdma5crWw1orZAUQu7Wbrjy59Lpa5ZAWRyEmDOxcDeMg7zZBJN65lG3BaqnsEFyfS7t8Dr7WF45chpHjQKJ1EcxD09ZAqbzZA6GZAf44IFLdFItWts81nz4ve7eT72syDmZAwExWbBAGKRXt3NoC06Bf8txCfPstyvMKMAGgZDZD';
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
        $request['access_token']='EAAqXFOLkdBcBADGRdz5wyu8I05qH1YQuZB1jVjzGY856N9DFOrP2QLsosvEvZAOmeLNulylcrB1dc7ZCvxqv6JX7Sa2FVy0bZAYGmv5ZB4vK00FH0ZBNTtNzPNg1fvgDHzE0cH3SoCvZC8VCDmWhVzZCjO3HLhm2s2kXZALUmSu8wGyGmedNiAqTz8jfkgtSmniPoRBZCN6lXJZADdFrpxmOyT9FUbXgdngAENySvRmbIAwhrA7u0qGGGwf';

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
         * aram permitted_tasks[0] must be one of {MANAGE, CREATE_CONTENT, MODERATE,
         * MESSAGING, ADVERTISE, ANALYZE, MODERATE_COMMUNITY, MANAGE_JOBS, PAGES_MESSAGING,
         * PAGES_MESSAGING_SUBSCRIPTIONS, READ_PAGE_MAILBOXES, VIEW_MONETIZATION_INSIGHTS,
         * MANAGE_LEADS, PROFILE_PLUS_FULL_CONTROL, PROFILE_PLUS_MANAGE, PROFILE_PLUS_FACEBOOK_ACCESS,
         * PROFILE_PLUS_CREATE_CONTENT, PROFILE_PLUS_MODERATE, PROFILE_PLUS_MESSAGING,
         * PROFILE_PLUS_ADVERTISE, PROFILE_PLUS_ANALYZE, CASHIER_ROLE}."
         */

        $request['access_token']='EAAqXFOLkdBcBADGRdz5wyu8I05qH1YQuZB1jVjzGY856N9DFOrP2QLsosvEvZAOmeLNulylcrB1dc7ZCvxqv6JX7Sa2FVy0bZAYGmv5ZB4vK00FH0ZBNTtNzPNg1fvgDHzE0cH3SoCvZC8VCDmWhVzZCjO3HLhm2s2kXZALUmSu8wGyGmedNiAqTz8jfkgtSmniPoRBZCN6lXJZADdFrpxmOyT9FUbXgdngAENySvRmbIAwhrA7u0qGGGwf';


        $pageAccess = $this->facebookMarketingService->claimClientPageAPI($request);


    }
}
