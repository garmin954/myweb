(function (w) {
    w.YuanLu = {
        // 自动复制到对象
        assignToForm : function (param, data) {
            Object.keys(param).forEach((key)=>{
                param[key] = data[key];
            });

            return param;
        },

		closeIframe : function(index, time){
			setTimeout(function () {
				window.parent.location.reload();//刷新父页面
				parent.layer.close(index);
            }, time)                   
		},
		// 提交表单
		submitForm : function(obj){

            //监听提交
            let index = parent.layer.getFrameIndex(window.name);
            _token = obj._token ? obj._token : '_token'
            time = obj.time ? obj.time : 2000
            type = obj.type ? obj.type : 'post'


            //表单取值
            $.ajax({
                url: obj.url,
                type: type,
                data: obj.params,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="'+_token+'"]').attr('content')
                },
                success:function(res){
                    if(res.code > 0){
                        layer.msg(res.msg, {icon:1, shade:0.5,anim:6});
                        YuanLu.closeIframe(index, time);
                    } else {
                        layer.msg(res.msg, {icon:2, shade:0.5,anim:6})
                    }
                }
            });        
 
		},
		// 获取表单值
		getFrom : function(obj){
            _token = obj._token ? obj._token : '_token'
			$.ajax({
                async: false,
                url: obj.url,
				type: obj.type ? obj.type : 'post',
				data: obj.params,
				dataType: 'json',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="'+_token+'"]').attr('content')
				},
				success:function(res){
					if(res.code > 0){
                        obj.data = YuanLu.assignToForm(obj.data, res.data);
                        obj.form.val('example', obj.data);
					} else {
						layer.msg(res.msg, {icon:2, shade:0.5,anim:6})
					}
				}    
            });
		}
    }
})(window);