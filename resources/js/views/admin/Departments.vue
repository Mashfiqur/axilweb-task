<template>
    <h5>Departments</h5>
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Abbreviation</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(department, index) in departments">
          <td>{{ department.name }}</td>
          <td>{{ department.abbreviation }}</td>
        </tr>
      </tbody>
    </table>
</template>

<script>
import {mapState, mapGetters, mapActions} from 'vuex'

export default {
  name: 'Departments',
  data() {
        return {
            processing:false
        }
    },
    computed: {
        ...mapGetters({
          departments: 'department/departments',
        })
    },
    methods:{
        ...mapActions({
            getDepartments:'department/getDepartments'
        }),
    },
    created(){
      this.getDepartments()
    }
}
</script>