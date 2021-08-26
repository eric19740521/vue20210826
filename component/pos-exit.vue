<template>
	<div>
		<div   style="background-color:#BFFFFF;height:450px;width:100%; ">
			想走<BR>
			
			<button id="show-modal" @click="showModal123 = true">按我離開?</button>
			
		</div>
		<div   style="background-color:#EEEEEE;"><a class="nav-link" @click="$root.changeView('home')">關閉</a></div>

      
      <!-- use the modal component, pass in the prop -->
      <modal v-if="showModal123" @close="showModal123 = false">
        <h3 slot="header">示範!!</h3>
		<slot></slot>
		<div slot="body">沒辦法</div>
		 
      </modal>
		
		
	</div>
</template>


<script>
const modal = httpVueLoader('component/pos-modal.vue')
module.exports = {
    data() {
        return {
            showModal123: false 
        }
    } ,
  components: {
    modal
  }


	
}
</script>