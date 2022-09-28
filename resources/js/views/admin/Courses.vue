<template>
    <h5>Courses</h5>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>CODE</th>
          <th>Department</th>
          <th>Price</th>

        </tr>
      </thead>
      <tbody>
        <tr v-for="(course, index) in courses">
          <td>{{ course.name }}</td>
          <td>{{ course.code }}</td>
          <td>{{ course.department.name }}</td>
          <td>{{ course.price }}</td>
        </tr>
      </tbody>
    </table>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'

export default {
  name: 'Courses',
  data() {
        return {
            processing:false
        }
    },
    computed: {
        ...mapGetters({
          courses: 'course/courses',
        })
    },
    methods:{
        ...mapActions({
            getCourses:'course/getCourses'
        }),
    },
    created(){
      this.getCourses()
    }
}
</script>