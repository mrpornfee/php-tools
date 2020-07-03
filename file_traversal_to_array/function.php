<?php
/**文件夹遍历
* @param string $data 需要遍历的文件夹路径 以”/“结尾 长度需要大于root
* @param string $root 数组key的根目录 以”/“结尾 需要是data 的前缀子串
* @throws \Exception
*/
function file_traversal_to_array($data=__DIR__."/config/",$root=__DIR__."/config/",array $dataArray=[]){
$temp=scandir($data);
$root_length=strlen($root);
$dirname=$data;
$map_root=substr($dirname,0,$root_length);
if($map_root!==$root) {
throw new \Exception("参数前缀不匹配");
}

$data=substr($data,0,-1);
foreach ($temp as $v){
$a=$data.'/'.$v;
if(is_dir($a)){
if($v=="."||$v==".."){
continue;
}
//递归遍历文件夹
$dataArray=file_traversal_to_array($a."/",$root,$dataArray);
}
if(pathinfo($a)["extension"]!="php"){
continue;
}else{
//获取相对$root的文件路径
$map_branch=substr($a,$root_length);
$map_branch_arr=explode("/",strtoupper($map_branch));
$map_branch_arr_size=sizeof($map_branch_arr);
//从最深的路径开始赋值
$map_branch_arr[$map_branch_arr_size-1]=substr($map_branch_arr[$map_branch_arr_size-1],0,-4);
$i=$map_branch_arr_size-1;
if($i===0)
//0是最外层，直接赋值
$dataArray[$map_branch_arr[$i]]=require $a;
else {
//有子文件层,创建临时变量存储最里层数据
$dataArray_temp[$map_branch_arr[$i]] = require $a;
for (; $i > 0; $i--) {
//一层一层向外扩张，每次扩张数组深度+1
$dataArray_temp[$map_branch_arr[$i - 1]] = $dataArray_temp;
unset($dataArray_temp[$map_branch_arr[$i]]);
}
$dataArray[$map_branch_arr[0]]=$dataArray_temp[$map_branch_arr[0]];
}
}
}
return $dataArray;
}
