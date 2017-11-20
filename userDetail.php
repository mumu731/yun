<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>用户情页</title>
		<link rel="stylesheet" href="../css/default/easyui.css" />
		<link rel="stylesheet" href="../css/icon.css" />
		<script src="../js/jquery.min.js"></script>
		<script src="../js/jquery.easyui.min.js"></script>
		<script src="../js/easyui-lang-zh_CN.js"></script>
		<script src="../js/jquery.edatagrid.js"></script>
		<style>
			.infoTable td{
				width: 100px;
				height: 33px;
				text-align: right;
			}
			input{
				border: 1px solid #95B8E7;
				width: 130px;
				height: 17px;
			}
			textarea{
				border: 1px solid #95B8E7;
				width: 650px;
				height: 40px;
				resize: none;
			}
			#upload{
				width: 100px;
				height: 100px;
				border: 1px solid black;
				text-align: center;
				line-height: 100px;
				font-weight: bold;
				font-size: 12px;
				margin-left: 30px;
				cursor: pointer;
			}
		</style>
	</head>
	
	<body>
		<div id="info" class="easyui-panel" title="基本信息"     
        style="width:100%;height:200px;padding:10px;"   
        data-options="iconCls:'icon-edit',collapsible:true">
        <form enctype="multipart/form-data" method="post" id="imgForm">
			<input type="file" hidden="hidden" id="file" name="file" accept="image/*">
		</form>
        <form method="post" id="infoForm">  
			<input type="hidden" name="userid" id="userid" />
			<table class="infoTable">
				<tr>
					<td><span style="color: red;">*</span>用户账号：</td>
					<td>
						<input type="text" name="usernum" id="usernum" />
					</td>
					<td><span style="color: red;">*</span>用户名：</td>
					<td>
						<input type="text" name="username" id="username" />
					</td>
					<td>联系方式：</td>
					<td>
						<input type="text" name="tel" id="tel" />
					</td>
					<td rowspan="3">
						<input type="hidden" name="imgSrc" id="imgSrc" />
						<div id="upload">
							<img style="width:100%; height: 100%;" id="img" alt="上传图片" />
						</div>
						
					</td>
				</tr>
				<tr>
					<td><span style="color: red;">*</span>系统角色：</td>
					<td>
						<select class="easyui-combobox" name="position" id="position" panelHeight="auto" editable="false" style="width: 130px; height: 23px;">   
							<option value=""> </option>
						    <option value="0">管理员</option>   
						    <option value="1">教员</option>   
						    <option value="2">学员</option>   
						</select>
					</td>
					<td>是否使用：</td>
					<td style="text-align: left;">
						<input type="checkbox" name="isshow" id="isshow" value="1" style="height: 15px; width: 15px;" />
					</td>
				</tr>
				<tr>
					<td>备注：</td>
					<td colspan="5">
						<textarea name="remark" id="remark"></textarea>
					</td>
				</tr>
			</table>
		</form> 	
		</div>  
		
		<br />
		
		<div class="easyui-panel" title="账号备忘录"     
        style="width:100%;height:300px;"   
        data-options="iconCls:'icon-edit',collapsible:true">  
        	
        	<div id="tbBar" style="padding: 2px 10px;">
				<a class="easyui-linkbutton" plain="true" iconCls="icon-add" id="newRemark">新增</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-remove" id="delRemark">删除</a>
				<a class="easyui-linkbutton" plain="true" iconCls="icon-save" id="saveRemark">保存</a>
			</div>
			
			<table id="remarkTable">   
			    <thead>   
			        <tr>   
			            <th data-options="field:'time',width:100,editor:{type:'datetimebox',options:{
			            	editable:false
			            }}">备忘时间</th>   
			            <th data-options="field:'type',width:100,editor:{
			            	type:'combobox',
			            	options:{
			            		valueField: 'value',
								textField: 'text',
								editable:false,
								panelHeight:'auto',
			            		data:[
			            			{value: '违规',text: '违规'},
			            			{value: '封禁',text: '封禁'},
			            			{value: '解禁',text: '解禁'},
			            			{value: '其他',text: '其他'}
			            		]
			            	}
			            }">备忘类型</th>   
			            <th data-options="field:'remark',width:400,editor:'text'">备忘内容</th>   
			        </tr>   
			    </thead>  
			</table>  
		</div> 
		
		<div style="text-align: center; margin-top: 15px;">
			<a class="easyui-linkbutton" iconCls="icon-save" id="save">保存</a>
			&nbsp;&nbsp;
			<a class="easyui-linkbutton" iconCls="icon-cancel" onclick="window.close()">关闭</a>
		</div>
		
		<script>

			
		</script>
		
	</body>
</html>
