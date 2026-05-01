<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    public function dashboardView(): Response
    {
        return Inertia::render('dashboard/HomeView');
    }
    public function transactionView(): Response
    {
        return Inertia::render('dashboard/TransactionsView');
    }
    public function accountView(): Response
    {
        return Inertia::render('dashboard/AccountsView');
    }
    public function investmentView(): Response
    {
        return Inertia::render('dashboard/InvestmentsView');
    }
    public function creditcardView(): Response
    {
        return Inertia::render('dashboard/CreditCardsView');
    }
    public function loanView(): Response
    {
        return Inertia::render('dashboard/LoansView');
    }
    public function serviceView(): Response
    {
        return Inertia::render('dashboard/ServicesView');
    }
    public function privilegeView(): Response
    {
        return Inertia::render('dashboard/PrivilegesView');
    }
    public function settingView(): Response
    {
        return Inertia::render('dashboard/SettingsView');
    }


}
