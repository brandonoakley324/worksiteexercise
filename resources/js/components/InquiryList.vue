<template>



  <div class="container leading-normal my-4 mx-auto px-4">

      <ul>
          <li v-for="inquiry in inquiries" :key="inquiry.id">
  <div class="flex flex-wrap my-6 ml-auto" style="border-bottom:1px solid black;">
      <div class=" h-12 w-full md:w-12 lg:w-1/3 ml-auto font-bold">{{ inquiry.name}}</div>
        <div class=" h-full w-full md:w-12 lg:w-1/3 mr-auto" >
        <ul >
           <li style="margin-bottom:3px;"><p> {{ inquiry.email }}</p></li>
           <li style="margin-bottom:10px;"><p>{{ inquiry.phone }}</p></li>
           <li style="margin-bottom:3px;"><p>{{ inquiry.message}}</p></li>
        </ul>
        </div>
  </div>
  </li>
  </ul>
  </div>


   

</template>

<script>
    export default {
       name: 'inquiry-list',
        data()  {
            return {
               inquiries: []
            }
        },
      
        created(){
            axios.get('./api/inquiry')
            .then(response => this.inquiries = response.data);
        }
    }
</script>
