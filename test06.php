<!DOCTYPE html>
<html>
<head>
<title>test</title>

	<meta charset="utf-8">
	<!--meta name="viewport" content="width=device-width, initial-scale=1"-->
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- import CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">



	<script src="js/vue.js"></script>
	<script src="js/vue-router.js"></script>
	<script src="js/axios.min.js"></script>

	<!-- jquery.min.js 要載入,不然Collapsible Navbar 不會生效的!! -->
	<script src="js/jquery.min.js"></script>

	<script src="js/bootstrap.min.js"></script> 


<style>

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

<p id="app">
 
	<my-z :zname="name" :zage="age" @updatename="uf_setname" @updateage="uf_setage"></my-z>
	
	 
</p>
<template id="a">
<div>	
  <p>
    <h3>A元件：{{aname}}</h3>
    <button  @click="clicka">變更為eric</button>
  </p>
</div>	    
</template>
<template id="b">
<div>	
  <p>
    <h3>B元件：{{bage}}</h3>
    <button  @click="clickb">age+1</button>
  </p>
</div>	    
</template>

<template id="c">
<div>	
  <p>
	<input type="text" v-model="c1age" />
	{{cage}}
  </p>
</div>	  
</template>

<template id="z">
<div>	
  <p>
	<my-a :aname="zname"></my-a>
	<my-b :bage="zage"></my-b>     
	<my-c :cage="zage"></my-d>
  </p>	
	
	<button @click="showm01">改名</button>
      <!-- use the modal component, pass in the prop -->
      <modal v-if="showModal01"    @close="showModal01 = false" @updatem="clickz1">
        <h3 slot="header">改名喔!!</h3>
		
		
		<slot></slot>

		<template slot="body"  >
			<!-- 變數範圍 id="z" -->
			名字:<input type="text" v-model="m1name" />
		</template>			
		 
      </modal>	
	  
	  
	<button @click="showm02">改年齡</button>
      <!-- use the modal component, pass in the prop -->
      <modal v-if="showModal02"   @close="showModal02 = false" @updatem="clickz2">
        <h3 slot="header">改年齡喔!!</h3>
		
		
		<slot></slot>

		<template slot="body"  >
			<!-- 變數範圍 id="z" -->
			年齡:<input type="text" v-model="m1age" />
		</template>			
		 
      </modal>	

</div>	  
</template>

<template id="m">
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

			</slot>
		  </div>

		  <div class="modal-footer">
			<slot name="footer">
			   
			  <button class="modal-default-button" @click="clickm">Y</button>
			  <button class="modal-default-button" @click="$emit('close')">N</button>
			</slot>
		  </div>
		</div>
	  </div>
	</div>
  </transition>
</template>


<script>

var A = {
	template: '#a',
	props: ['aname'],
	data() {
	  return {
	   
	  }
	},
	methods: {
		clicka: function(){
		  this.$root.uf_setname("eric"); 	
		
		}
	}
}
var B = {
	template: '#b',
	props: ['bage'],
	data() {
	  return {
 
	  }
	},
	methods: {
 		clickb: function(){
		  this.$root.uf_setage(parseInt(this.bage)+1); 	
		
		}
	}
}
var C = {
	template: '#c',
	props: ['cage'],
	data() {
	  return {
		c1age:""	
	  }
	},
	mounted() {//在模板編譯完成後執行
		this.c1age = this.cage;
	},
    //监听，并同步到组件内的data属性
    watch: {
      c1age (val) {
	  
        this.$root.age = val;
      },
      cage (val) {
		  
        this.c1age = val;
      },	  
    },	
}
var M = {
	template: '#m',
	props: [ 'mname','mage' ],
	data() {
	  return {
		m1name:"",
		m1age:0	
	  }
	},	
	mounted() {//在模板編譯完成後執行
		this.m1name=this.mname;
		this.m1age=this.mage;
	},
	methods: {
		clickm: function(){
		  this.$emit("updatem"); 

		  this.$emit('close');		
		
		} 
	}
}

var Z = {
	template: '#z',
	props: ['zname','zage'],
	data() {
	  return {
		showModal01: false ,
		showModal02: false ,
		z1name:"",
		m1name:"",	
		m1age:""
	  }
	},
	components: {
	  'my-a': A,
	  'my-b': B,
	  'my-c': C,
	  'modal': M
	},	
	mounted() {//在模板編譯完成後執行
	
		console.log("z mounted...");
		this.z1name=this.zname;
		this.m1name=this.zname;
		this.m1age=this.zage;
	},
	methods: {
		clickz1: function(){
		  this.$emit("updatename",this.m1name); 	
		  //this.$emit("updateage",this.m1age); 	
		
		},
		clickz2: function(){
		  //this.$emit("updatename",this.m1name); 	
		  this.$emit("updateage",this.m1age); 	
		
		},		
		showm01:function(){
			console.log("z showm01...");
			this.showModal01 = true;
			this.m1name=this.zname;
			//this.m1age=parseInt(this.zage);
		},
		showm02:function(){
			console.log("z showm02...");
			this.showModal02 = true;
			//this.m1name=this.zname;
			this.m1age=parseInt(this.zage);
		}		
	},
   //监听，并同步到组件内的data属性
    watch: {
      m1name (val) {
	  
		console.log("m1name="+val);
        //this.$root.uf_setname(val); 	
      },
      m1age (val) {
	  
		console.log("m1age="+val);
        //this.$root.uf_setname(val); 	
      } 	  
    },	
}

var vm = new Vue({
	el: '#app',
	components: {
	  'my-z': Z
	},
	data: {
	  name:"tom",
	  age:30	
		
	},
	methods: {
 		uf_setname: function(val){
		  this.name=val; 	
		
		},
 		uf_setage: function(val){
		  this.age=val; 	
		
		}		
	}	
});
</script>
</body>
</html>
