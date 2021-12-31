import Vue from "vue";
import VueRouter from "vue-router";

import signin from "@/components/authentication/SignIn.vue";
import signupone from "@/components/authentication/SignUpOne.vue";
import signuptwo from "@/components/authentication/SignUpTwo.vue";
import signupthree from "@/components/authentication/SignUpThree.vue";

import MyProfile from '@/components/views/MyProfile.vue'
import ExplorAlumni from '@/components/views/Alumni_Company.vue'
import Event from '@/components/views/Event.vue'
import ManageUser from '@/components/views/ManageUser.vue'
import Warning from '@/components/ui/Warning.vue'
// import Alumni_Company from '@/comments/views/Alumni_Company.vue'
Vue.use(VueRouter)

const routes = [{
      path: "/",
      component: signin
    },
    {
      path: "/signin",
      component: signin
    },
    {
      path: "/signupone",
      component: signupone
    },
    {
      path: "/signuptwo",
      component: signuptwo
    },
    {
      path: "/signupthree",
      component: signupthree
    },
    {
      path: '/profile-view',
      component: MyProfile
    },
    {
      path: '/explor-view',
      component: ExplorAlumni
    },
    {
      path: '/event-view',
      component: Event
    },
    {
      path: '/manage-view',
      component: ManageUser
    },
    {
      path: '/warning',
      component: Warning
    },
    {
      path: '/company-view',
      component: ExplorAlumni
    },


  ]

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router