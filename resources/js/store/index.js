import Vuex from "vuex";
import auth from "./modules/auth";
import department from "./modules/department";
import course from "./modules/course";
import coupon from "./modules/coupon";



export default new Vuex.Store({
    modules: {
        auth,
        department,
        course,
        coupon
    }
})