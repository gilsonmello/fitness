<template>
	<select style="width: 100%;">
    	<slot></slot>
  	</select>
</template>

<style type="text/css">
	.select2{
		width: 100%;
	}
</style>

<script type="text/x-template">
	import Select2 from 'select2';

	export default{
		props: ['options', 'value'],
		mounted: function () {
		    var vm = this
		    $(this.$el).select2({ 
		    	data: this.options
		    })
	      	.val(this.value)
	      	.trigger('change')
	      	// emit event on change.
	      	.on('change', function (val) {
	        	vm.$emit('input', this.value);
	      	})
	  	},
	  	watch: {
	    	value: function (value) {
	      		// update value
	      		$(this.$el).val(value);
	    	},
	    	options: function (options) {
	      		// update options
      			$(this.$el).empty().select2({ 
      				data: options
      			}).val(0)
	      		.trigger('change');
			}
	  	},
	  	destroyed: function () {
	    	$(this.$el).off().select2('destroy');
	  	}
	}


</script>