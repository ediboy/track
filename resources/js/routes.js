import Home from './components/Home';

import Projects from './components/Projects';

import ProjectsCreate from './components/ProjectsCreate';

import ProjectsShow from './components/ProjectsShow';

import ProjectsEdit from './components/ProjectsEdit';

import Tasks from './components/Tasks';

import Teams from './components/Teams';

import TeamsCreate from './components/TeamsCreate';

import TeamsEdit from './components/TeamsEdit';

import Users from './components/Users';

import UsersShow from './components/UsersShow';

import UsersEdit from './components/UsersEdit';

import UsersCreate from './components/UsersCreate';

import Attendance from './components/Attendance';

import Payroll from './components/Payroll';

import Benefits from './components/Benefits';

import Deductions from './components/Deductions';

import Holidays from './components/Holidays';

import Bonus from './components/Bonus';

import CashAdvances from './components/CashAdvances';

import Allowances from './components/Allowances';

import Overtime from './components/Overtime';

import Leaves from './components/Leaves';

import Slider from './components/Slider';

import NotFound from './components/NotFound';

export default {

    mode: 'history',

    routes: [
        {

            path: '*',

            component: NotFound,

            name: 'notfound'

        },

        {

            path: '/',

            component: Home,

            name: ''

        },

        {

            path: '/projects',

            component: Projects,

            name: 'projects'

        },

        {

            path: '/projects/create',

            component: ProjectsCreate,

            name: 'projects.create'

        },

        {

            path: '/projects/:id',

            component: ProjectsShow,

            name: 'projects.show'

        },

        {

            path: '/projects/:id/edit',

            component: ProjectsEdit,

            name: 'projects.edit'

        },

        {

            path: '/tasks',

            component: Tasks,

            name: 'tasks'

        },

        {

            path: '/users',

            component: Users,

            name: 'users'

        },

        {

            path: '/users/create',

            component: UsersCreate,

            name: 'users.create'

        },

        {

            path: '/users/:id',

            component: UsersShow,

            name: 'users.show'

        },

        {

            path: '/users/:id/edit',

            component: UsersEdit,

            name: 'users.edit'

        },

        {

            path: '/teams',

            component: Teams,

            name: 'teams'

        },

        {

            path: '/teams/create',

            component: TeamsCreate,

            name: 'teams.create'

        },

        {

            path: '/teams/:id/edit',

            component: TeamsEdit,

            name: 'teams.edit'

        },

        {

            path: '/attendance',

            component: Attendance,

            name: 'attendance'

        },

        {

            path: '/payroll',

            component: Payroll,

            name: 'payroll'

        },

        {

            path: '/benefits',

            component: Benefits,

            name: 'benefits'

        },

        {

            path: '/deductions',

            component: Deductions,

            name: 'deductions'

        },

        {

            path: '/holidays',

            component: Holidays,

            name: 'holidays'

        },

        {

            path: '/bonus',

            component: Bonus,

            name: 'bonus'

        },

        {

            path: '/cash-advances',

            component: CashAdvances,

            name: 'cash-advances'

        },

        {

            path: '/allowances',

            component: Allowances,

            name: 'allowances'

        },

        {

            path: '/overtime',

            component: Overtime,

            name: 'overtime'

        },

        {

            path: '/leaves',

            component: Leaves,

            name: 'leaves'

        },

        {

            path: '/slider',

            component: Slider,

            name: 'slider'

        }

    ]

}
