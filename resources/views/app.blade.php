<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Track</title>

        <link rel="stylesheet" type="text/css" href="/css/app.css">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    </head>

    <body class="gradient-bg h-screen overflow-hidden">

        <div id="app" class="font-sans text-white h-full overflow-hidden">

            @include('partials/response')

            @include('partials/confirm-deletion')

            <div class="container max-w-full flex flex-col h-full overflow-hidden">

                <header class="w-full h-10 bg-track-3 z-50 p-1 flex justify-between items-center flex-none">
                    <div class="flex">
                        <div class="block md:hidden flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded-sm mr-2"><i class="fas fa-bars"></i></div>
                        <router-link class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded-sm no-underline" to="/">
        					<i class="fas fa-home text-xl"></i>
        				</router-link>
                    </div>

                    <div class="text-center">
                        <div class="font-bold text-xl leading-none">MIYENS</div>
                        <div class="font-light text-xs tracking-wide leading-none">TRACK</div>
                    </div>

                    <div class="flex">
                        <div class="flex w-8 h-8 bg-track-3 text-green-lightest justify-center items-center rounded-sm"><i class="fas fa-bell text-xl"></i></div>
                        <div class="flex w-8 h-8 bg-track-3 rounded-full ml-1 justify-center items-center text-sm font-semibold">EI</div>
                    </div>

                </header>

                <main class="flex z-10 relative flex-grow h-full">

                    <aside class="hidden md:block w-1/6 relative h-full pb-10 min-h-screen bg-track-5 overflow-y-auto">

                        <ul class="list-reset text-xs capitalize">

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/projects"> <i class="fas fa-project-diagram mr-1"></i> Projects</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/tasks"> <i class="fas fa-tasks mr-1"></i> Tasks</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/teams"> <i class="fas fa-users mr-1"></i> Teams</router-link>
                            </li>


                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b border-t mt-2">
                                <router-link class="text-orange-lightest no-underline block" to="/users"> <i class="fas fa-user-friends mr-1"></i> Users</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/attendance"> <i class="fas fa-user-clock mr-1"></i> Attendance</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/payroll"> <i class="fas fa-money-bill-wave mr-1"></i> Payroll</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/benefits"> <i class="fas fa-clinic-medical mr-1"></i> Benefits</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/deductions"> <i class="fas fa-cut mr-1"></i> Deductions</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/holidays"> <i class="fas fa-snowman mr-1"></i> Holidays</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/bonus"> <i class="fas fa-money-bill-alt mr-1"></i> Bonus</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/about"> <i class="fas fa-car mr-1"></i> Loans</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/cash-advances"> <i class="fas fa-hand-holding-usd mr-1"></i> Cash Advances</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/allowances"> <i class="fas fa-money-bill-wave-alt mr-1"></i> Allowances</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/overtime"> <i class="fas fa-clock mr-1"></i> Overtime</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/leaves"> <i class="fas fa-user-lock mr-1"></i> Leaves</router-link>
                            </li>


                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b border-t mt-2">
                                <router-link class="text-orange-lightest no-underline block" to="/announcements"> <i class="fas fa-bullhorn mr-1"></i> Announcements</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/rewards"> <i class="fas fa-award mr-1"></i> Rewards</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/slider"> <i class="fas fa-images mr-1"></i> Slider</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b">
                                <router-link class="text-orange-lightest no-underline block" to="/stats"> <i class="fas fa-chart-line mr-1"></i> Statistics</router-link>
                            </li>

                            <li class="bg-track-2 p-2 leading-loose border-track-3 border-b mt-2">
                                <a class="text-orange-lightest no-underline block" href="/logout"> <i class="fas fa-sign-out-alt mr-1"></i> Logout</a>
                            </li>

                        </ul>

                    </aside>

                    <div class="primary flex-1 h-full overflow-y-auto">

                        <router-view></router-view>

                    </div>

                </main>

            </div>

        </div>

        <script src="/js/app.js"></script>

    </body>

</html>
