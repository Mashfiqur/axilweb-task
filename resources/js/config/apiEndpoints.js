  
const ROOT_URL = '/api/v1';

export default {
    USER_LOGIN_URL: ROOT_URL + '/login',

    //Department Endpoints
    GET_DEPARTMENTS_URL: ROOT_URL + '/departments',

    //Course Endpoints
    GET_COURSES_URL: ROOT_URL + '/courses',

    //Coupon Endpoints
    GET_COUPONS_URL: ROOT_URL + '/coupons',
    ASSIGN_COUPON_URL: ROOT_URL + '/coupon-assign',
}