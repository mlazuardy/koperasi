<template>
<div class="form">
      <div class="form-group">
      <label for="name">Name: {{name}}</label>
      <input type="text" name="name" v-model="name" class="form-control">
  </div>
  <div class="form-group">
      <label for="tes">Tes</label>
      <input type="text" name="tes" :value="name + 5" class="form-control"  >
  </div>
  <a @click="doSomething">aasdasd</a>
</div>
</template>

<script>
    export default {
        data() {
            return{
                name:''
            }
        },
       methods:{
            doSomething(){
           window.location.href =  location.pathname;
        }
       }

    }
</script>