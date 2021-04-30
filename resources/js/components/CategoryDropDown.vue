<template>
<div class="col-lg-12">
    <div class="row">
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">Product Category</label>
                <select @change="getSubCategory" name="category_id" class="form-control custom-select" v-model="category">
                    <option  value="" selected>Select Category</option>
                    <option v-for="data in categories" :key="data.id" :value="data.id">{{data.name}}</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">Sub Category</label>
                <select name="subcategory_id" class="form-control custom-select" v-model="subcategory" @change="getChildCategory">
                    <option value="" selected>Select Sub Category</option>     
                   <option v-for="data in subcategories" :key="data.id" :value="data.id">{{data.name}}</option>
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form-group">
                <label class="form-label">Child Category</label>
                <select name="childcategory_id" class="form-control custom-select" v-model="childcategory">
                    <option selected value="">Select Category</option>
                    <option v-for="data in childcategories" :key="data.id" :value="data.id">{{data.name}}</option>
                </select>   
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default { 
        name: 'category',
        data(){
            return {
                category:0,
                categories:[],
                subcategory:0,
                subcategories:[],
                childcategory:0,
                childcategories:[]
            }
        },
        mounted(){
            this.getCategory()
        },
        methods:{
            getCategory(){
                axios.get('http://localhost:8080/newprojects/classified/public/api/category').then((response) => {
                    this.categories = response.data
                })
            },
            getSubCategory(){
                axios.get('http://localhost:8080/newprojects/classified/public/api/subcategory' , {params:{category_id:this.category} }).then((response) => {
                    this.subcategories  = response.data
                })
            },
            getChildCategory(){
                axios.get('http://localhost:8080/newprojects/classified/public/api/childcategory' , {params:{subcategory_id:this.subcategory} }).then((response) => {
                    this.childcategories  = response.data
                })
            }
        }
    }
</script>
