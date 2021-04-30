<template>
    <div>
        <input type="file" @change="onFileChange" class="form-control" name="featured[]" multiple accept="image/*"/>

        <img v-if="url" :src="url" alt="" width="100" height="70">
    </div>
</template>

<script>
    export default {
        data(){
            return {
                url: ''
            }
        },
        methods:{
            onFileChange(e){
                const file = e.target.files[0];
                this.url = URL.createObjectURL(file)
            }
        }
        
    }
</script>
