!function(e,t){"use strict";t="default"in t?t["default"]:t,e.Field.create("fielder-datepicker",{mounted:function(){var e=this;this.$nextTick(function(){var i=Assely.locale.split("_")[0],d=t.datepicker.regional[i];t.datepicker.setDefaults(d),t('[data-uuid="'+e.field.uuid+'"]').datepicker({dateFormat:"dd.mm.yy",altField:'[data-uuid="alt-'+e.field.uuid+'"]',altFormat:"yy-mm-dd 00:00:00",onSelect:function(){this.parsley.validate({group:this.field.uuid})}.bind(e)})})},computed:{date:function(){if(this.field.value)return t.datepicker.formatDate("dd.mm.yy",new Date(this.field.value))}}})}(Fielder,jQuery);