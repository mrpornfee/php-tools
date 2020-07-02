traversal .php files ，if the format like " return ["a"=>1,"b"=>2 ];",this function will read it from the input file path and transfer the information to one array. And it can also traversal directorys！

遍历 .php后缀的文件，如果格式像“return ["a"=>1,"b"=>2 ];”这样，此函数会读取从指定输入的文件路径这些信息并且把它们整合成一个数组，并且也能遍历文件夹哦。

举个例子!
要遍历的文件目录：
[要遍历的文件目录](https://github.com/mrpornfee/php-tools/raw/master/file_traversal_to_array/readme_img/pic_config.jpg)

$config=file_traversal_to_array(__DIR__."/config/",__DIR__."/config/");
debug打印：
[debug打印](https://github.com/mrpornfee/php-tools/raw/master/file_traversal_to_array/readme_img/pic_result.jpg)

$config=file_traversal_to_array(__DIR__."/config/more_config/",__DIR__."/config/");
debug打印：
[debug打印](https://github.com/mrpornfee/php-tools/raw/master/file_traversal_to_array/readme_img/pic_result2.jpg)
