<!DOCTYPE html>
<html>
<head>
<title>WebPOS</title>

	<meta charset="utf-8">
	<!--meta name="viewport" content="width=device-width, initial-scale=1"-->
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- import CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="element-ui/lib/theme-chalk/index.css">
	<link rel="stylesheet" href="mint-ui/lib/style.css">



	<script src="js/vue.js"></script>
	<script src="js/vue-router.js"></script>
	<script src="js/axios.min.js"></script>
<script src="https://unpkg.com/http-vue-loader"></script>


	<!-- jquery.min.js 要載入,不然Collapsible Navbar 不會生效的!! -->
	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script> 

 


	<script src="js/polyfill.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3"></script>
<link href="https://cdn.jsdelivr.net/npm/vue-loading-overlay@3/dist/vue-loading.css" rel="stylesheet">

 

<style>

</style>


</head> 
 <body>
<div id="app" class="d-flex flex-column"   style="-webkit-user-select:none;">


		<component :is="view"  ></component>
	
  
</div>	
 


 
<script>
  
let app=new Vue({
  el: "#app",
  data: {
    view: "home"
  },
components: {
          'home': httpVueLoader('component/pos-home.vue'),
		  'shop': httpVueLoader('component/pos-shop.vue'),
		  'exit': httpVueLoader('component/pos-exit.vue')
        } ,
  methods: {
    changeView: function(tab){
      this.view=tab;
    }
  }
})

</script>
</body>
</html>
