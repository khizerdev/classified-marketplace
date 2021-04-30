<template>
  <div class="mx-auto">
       <a v-if="showViewConversationOnSuccess" data-toggle="modal" data-target="#chatModal" class="btn btn-inline text-white"><i class="fas fa-envelope"></i><span>send message</span></a>
       <a v-else href="/newprojects/classified/public/admin/chats"  class="btn btn-inline text-white"><i class="fas fa-envelope"></i><span>View Conversation</span></a>

        <div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="chatModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="chatModalLabel">Send Message to {{sellerName}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <textarea v-model="body" rows="2" class="form-control" placeholder="Type message here"></textarea>
            
            <p v-if="successMessage" class="alert alert-success">Your message has been sent</p>
          </div>
          <div class="modal-footer">
            <button type="button" :disabled="!body" class="btn btn-inline" @click.prevent="sendMessage()">Send Message</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  props: ['sellerName','userId','recieverId','adId'],
  data(){
      return {
          body:'',
          successMessage:false,
          showViewConversationOnSuccess:true
      }
  },
  methods: {
      sendMessage(){
          axios.post('/newprojects/classified/public/send/message' , {
              body:this.body,
              receiverId: this.recieverId,
              userId: this.userId,
              adId: this.adId
          }).then((response) => {
              this.body = ''
              this.successMessage = true,
              this.showViewConversationOnSuccess = false
          })
      }
  }
}
</script>

