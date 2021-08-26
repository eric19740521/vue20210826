<!DOCTYPE html>
<html>
<head>
<title>WebPOS</title>

	<meta charset="utf-8">
	<!--meta name="viewport" content="width=device-width, initial-scale=1"-->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- index08.css這個要加入 ,TABLE才能正確 RWD -->
	<link rel="stylesheet" href="css/index08.css" charset="utf-8">
	<!-- 自己定義的css -->
	<link rel="stylesheet" href="css/index09.css" charset="utf-8">
	<link rel="stylesheet" href="css/index10.css" charset="utf-8">


	<!-- import CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="element-ui/lib/theme-chalk/index.css">
	<link rel="stylesheet" href="mint-ui/lib/style.css">



	<script src="js/vue.js"></script>
	<script src="js/vue-router.js"></script>
	<script src="js/axios.min.js"></script>

	<!-- jquery.min.js 要載入,不然Collapsible Navbar 不會生效的!! -->
	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script> 

 


	<script src="js/polyfill.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3"></script>
<link href="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3/dist/vue-loading.css" rel="stylesheet">

 

<style>
* {
    box-sizing: border-box;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}  
</style>


</head> 
 <body>
<div id="app" class="d-flex flex-column"   style="-webkit-user-select:none;">


	

		<component :is="view"  ></component>
	

	
	 
</div>	

<script type="text/x-template" id="home">
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
</script>
<script type="text/x-template" id="shop">
	<div>
		<div   style="background-color:#BFFFFF;height:450px;width:100%; ">
			01-01雞肉飯
		</div>
		<div   style="background-color:#EEEEEE;"><a class="nav-link" @click="$root.changeView('home')">關閉</a></div>
	</div>
</script>
<script type="text/x-template" id="exit">
	<div>
		<div   style="background-color:#BFFFFF;height:450px;width:100%; ">
			exit
		</div>
		<div   style="background-color:#EEEEEE;"><a class="nav-link" @click="$root.changeView('home')">關閉</a></div>

      <button id="show-modal" @click="showModal123 = true">Show Modal</button>
      <!-- use the modal component, pass in the prop -->
      <modal v-if="showModal123" @close="showModal123 = false">
        <h3 slot="header">custom header</h3>
      </modal>
		
		
	</div>
</script>
<script type="text/x-template" id="modal-template">
  <transition name="modal">
	<div class="modal-mask">
	  <div class="modal-wrapper">
		<div class="modal-container">

		  <div class="modal-header">
			<slot name="header">
			  default header
			</slot>
		  </div>

		  <div class="modal-body">
			<slot name="body">
			  default body
			</slot>
		  </div>

		  <div class="modal-footer">
			<slot name="footer">
			  default footer
			  <button class="modal-default-button123" @click="$emit('close')">
				OK
			  </button>
			</slot>
		  </div>
		</div>
	  </div>
	</div>
  </transition>
</script>

</script>
<script>
Vue.component("home", {
template: "#home",
	props: ['a1'],
	data(){
	  return{}
	},
	 methods: {
		changeView: function(tab){
			
		  //alert(tab);		
		  this.$root.view=tab;
		}
		},
});
Vue.component("shop", {
template: "#shop"   
 
});
Vue.component("exit", {
template: "#exit",
	data(){
	  return{ showModal123: false }
	}  
 
});
Vue.component("modal", {
	template: "#modal-template"
  });
let app=new Vue({
  el: "#app",
  data: {
    view: "home"
  },
  methods: {
    changeView: function(tab){
      this.view=tab;
    }
  }
})

</script>
</body>
</html>
