<template>
  <form action="./api/inquiry" method="POST" @submit.prevent="submitInquiry()" class="w-full" style="margin-top:10px;">
    
       <div class=" container md:flex mb-8">
      <div class="md:w-1/3">
        <legend class="w-1/2 ml-auto  h-12" style="font-weight:bold;">Contact</legend>
      </div>
      <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
        <div class="mb-4">
          <label class="block uppercase tracking-wide text-xs font-bold">Name</label>
          <input v-model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="name" placeholder="Brandon Oakley">
          <span v-if="errors.name" class="error" style="color:red;">{{ errors.name + '!'}}</span>
        </div>
        <div class="mb-4">
          <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Email</label>
          <input v-model="email" class="w-full shadow-inner p-4 border-0" type="text" name="email" placeholder="brandonoakley324@gmail.com">
          <span v-if="errors.email" class="error" style="color:red;">{{ errors.email + 'and must be of email format!' }}</span>
        </div>
        <div class="mb-4">
          <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Phone</label>
          <input v-model="phone" class="w-full shadow-inner p-4 border-0" type="text" name="phone" placeholder="902-304-8546">
          <span v-if="errors.phone" class="error" style="color:red;">{{ errors.phone + '!' }}</span>
        </div>
         <div class="mb-4">
          <label class="block uppercase tracking-wide text-charcoal-darker text-xs font-bold">Message</label>
           <textarea v-model="message" class="w-full shadow-inner p-4 border-0" placeholder="Ask us about our services" rows="6" name="message"></textarea>
           <span v-if="errors.message" class="error" style="color:red;">{{ errors.message + '!' }}</span>
        </div>
        <div class="mb-4">
            <input class="bg-gray-500 hover:bg-gray-400 text-white font-bold py-2 px-4 border-b-4 border-lightgray-700 hover:border-gray-500 rounded" type="submit" value="Send Inquiry">
        </div>
      </div>
    </div>
    
 </form>


</template>

<script>
    export default {
        data()  {
            return {
                name: '',
                email: '',
                phone: '',
                message: '',
                errors: []
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            submitInquiry() {
                axios.post('/api/inquiry', { 
                    name: this.name,
                    email: this.email,
                    phone: this.phone,
                    message: this.message  })
                    .then(function (){
                         alert('Submitted inquiry successfully!');
                    })
                    .catch(error => {
                        if (error.response.status == 422 ) {
                            this.errors = error.response.data.errors
                        }
                    })
            }
        }
    }
</script>
