<template>
    <div>
    <button v-if="show" @click.prevent="showPhoneNumber()" class="ad-details-number"><i class="fas fa-phone-alt"></i><span>Click to show the number</span></button>

    <button v-else class="ad-details-number"><i class="fas fa-phone-alt"></i><span>{{phone}}</span></button>
    </div>
</template>

<script>

export default {
  props: ['phone'],
  data(){
      return {
          show: true,
      }
  },
  methods: {
      showPhoneNumber(){
          this.show = false
      }
  }
}
</script>

