<template>
	<div id="container" style="background-color:#FFA500;height:500px;width:100%">	
			<div   style="background-color:#FF00FF;height:100%;width:20%;float:left;">
	 
				<a class="nav-link" @click="changeView('home')">home</a> 
				<a class="nav-link" @click="changeView('shop')">Shop</a>
				<a class="nav-link" @click="changeView('exit')">exit</a>
		 

			</div>

			<div   style="background-color:#EEEEEE;height:100%;width:80%;float:right;">
				<div   style="background-color:#ff0000;">選單</div>
				<div   style="background-color:#EEEEEE;height:70%;">內容</div>
				<div   style="background-color:#EEEEEE;"><a class="nav-link" @click="changeView('shop')">Shop {{a1}}</a></div>
				 
			</div>
	</div>
</template>


<script>
module.exports = {
    data() {
        return {
            
        }
    },
    props: ["a1" ],
	 methods: {
		changeView: function(tab){
			
		  //alert(tab);		
		  this.$root.view=tab;
		}
		},	
	
}
</script>