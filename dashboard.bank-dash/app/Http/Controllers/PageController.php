<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function dashboardView(): Response
    {
        return Inertia::render('dashboard/Home');
    }
    public function transactionView(): Response
    {
        return Inertia::render('dashboard/Transactions');
    }
    public function accountView(): Response
    {
        return Inertia::render('dashboard/Accounts');
    }
    public function investmentView(): Response
    {
        return Inertia::render('dashboard/Investments');
    }
    public function creditcardView(): Response
    {
        return Inertia::render('dashboard/CreditCards');
    }
    public function loanView(): Response
    {
        return Inertia::render('dashboard/Loans');
    }
    public function serviceView(): Response
    {
        return Inertia::render('dashboard/Services');
    }
    public function privilegeView(): Response
    {
        return Inertia::render('dashboard/Privileges');
    }
    public function settingView(): Response
    {
        return Inertia::render('dashboard/Settings');
    }


}
