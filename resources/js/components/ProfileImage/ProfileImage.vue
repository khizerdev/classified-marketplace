<template>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="form-label">Profile Image</label>
                <input type="file" @change="onFileChange" name="avatar" accept="image/*" class="form-control">
                </div>
            </div>
        <div class="col-lg-6">
            <img v-if="url" :src="url" alt="" width="100" class="img-fluid my-2">
            
        </div>
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
