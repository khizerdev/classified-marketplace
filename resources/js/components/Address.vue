<template>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">Country</label>
                <select @change="getState" name="country_id" class="form-control custom-select" v-model="country">
                    <option  value="" selected>Select Country</option>
                    <option v-for="data in countries" :key="data.id" :value="data.id">{{data.name}}</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">State</label>
                <select name="state_id" class="form-control custom-select" v-model="state" @change="getCity">
                    <option value=""  selected>Select State</option>     
                   <option v-for="data in states" :key="data.id" :value="data.id">{{data.name}}</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">City</label>
                <select name="city_id" class="form-control custom-select" v-model="city">
                    <option selected value="">Select City</option>
                    <option v-for="data in cities" :key="data.id" :value="data.id"  >{{data.name}}</option>
                </select>   
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default { 
        name: 'address-dropdown',
        data(){
            return {
                country:0,
                countries:[],
                state:0,
                states:[],
                city:0,
                cities:[],
            }
        },
        mounted(){
            this.getCountry();
        },
        methods:{
            getCountry(){
                axios.get('http://localhost:8080/newprojects/classified/public/api/country').then((response) => {
                    this.countries = response.data
                })
            },
            getState(){
                axios.get('http://localhost:8080/newprojects/classified/public/api/state' , {params:{country_id:this.country} }).then((response) => {
                    this.states  = response.data
                })
            },
            getCity(){
                axios.get('http://localhost:8080/newprojects/classified/public/api/city' , {params:{state_id:this.state} }).then((response) => {
                    this.cities  = response.data
                })
            }
        }
    }
</script>
